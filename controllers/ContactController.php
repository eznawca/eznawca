<?php
/**
 * Kontakt.
 */
class ContactController extends Controller
{
	public function index(): void
	{
		$this->startSession();
		$sent = !empty($_SESSION['contact_sent']);
		unset($_SESSION['contact_sent']);

		$this->view('contact', [
			'sent' => $sent,
			'errors' => [],
			'form' => $this->emptyForm(),
			'token' => $this->formToken(),
		], SiteData::meta('contact'));
	}

	public function send(): void
	{
		$this->startSession();

		$form = [
			'name' => trim((string)($_POST['name'] ?? '')),
			'email' => trim((string)($_POST['email'] ?? '')),
			'subject' => trim((string)($_POST['subject'] ?? '')),
			'message' => trim((string)($_POST['message'] ?? '')),
		];

		$errors = $this->validate($form);
		if ($errors === [] && !$this->deliver($form)) {
			$errors['form'] = 'Nie udało się wysłać wiadomości. Spróbuj ponownie albo napisz bezpośrednio na e-mail.';
		}

		if ($errors === []) {
			$_SESSION['contact_sent'] = true;
			$_SESSION['contact_last_sent_at'] = time();
			unset($_SESSION['contact_token'], $_SESSION['contact_started_at']);
			header('Location: /kontakt', true, 303);
			return;
		}

		$_SESSION['contact_started_at'] = time();
		$this->view('contact', [
			'sent' => false,
			'errors' => $errors,
			'form' => $form,
			'token' => $this->formToken(),
		], SiteData::meta('contact'));
	}

	private function startSession(): void
	{
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}
	}

	/** @return array{name:string,email:string,subject:string,message:string} */
	private function emptyForm(): array
	{
		return [
			'name' => '',
			'email' => '',
			'subject' => '',
			'message' => '',
		];
	}

	private function formToken(): string
	{
		if (empty($_SESSION['contact_token'])) {
			$_SESSION['contact_token'] = bin2hex(random_bytes(32));
		}
		if (empty($_SESSION['contact_started_at'])) {
			$_SESSION['contact_started_at'] = time();
		}

		return (string)$_SESSION['contact_token'];
	}

	/**
	 * @param array{name:string,email:string,subject:string,message:string} $form
	 * @return array<string,string>
	 */
	private function validate(array $form): array
	{
		$errors = [];
		$postedToken = (string)($_POST['token'] ?? '');
		$sessionToken = (string)($_SESSION['contact_token'] ?? '');

		if ($postedToken === '' || $sessionToken === '' || !hash_equals($sessionToken, $postedToken)) {
			$errors['form'] = 'Sesja formularza wygasła. Odśwież stronę i spróbuj ponownie.';
		}

		if (trim((string)($_POST['website'] ?? '')) !== '') {
			$errors['form'] = 'Nie udało się wysłać wiadomości. Spróbuj ponownie.';
		}

		$startedAt = (int)($_SESSION['contact_started_at'] ?? 0);
		$elapsed = time() - $startedAt;
		if ($startedAt <= 0 || $elapsed < 4 || $elapsed > 43200) {
			$errors['form'] = 'Nie udało się wysłać wiadomości. Odśwież stronę i spróbuj ponownie.';
		}

		$lastSentAt = (int)($_SESSION['contact_last_sent_at'] ?? 0);
		if ($lastSentAt > 0 && time() - $lastSentAt < 90) {
			$errors['form'] = 'Wiadomość została wysłana niedawno. Odczekaj chwilę przed kolejną próbą.';
		}

		if (mb_strlen($form['name']) < 2 || mb_strlen($form['name']) > 80) {
			$errors['name'] = 'Podaj imię i nazwisko.';
		}
		if (!filter_var($form['email'], FILTER_VALIDATE_EMAIL) || mb_strlen($form['email']) > 160) {
			$errors['email'] = 'Podaj poprawny adres e-mail.';
		}
		if (mb_strlen($form['subject']) < 3 || mb_strlen($form['subject']) > 120) {
			$errors['subject'] = 'Podaj temat wiadomości.';
		}
		if (mb_strlen($form['message']) < 10 || mb_strlen($form['message']) > 4000) {
			$errors['message'] = 'Wiadomość powinna mieć od 10 do 4000 znaków.';
		}

		return $errors;
	}

	/** @param array{name:string,email:string,subject:string,message:string} $form */
	private function deliver(array $form): bool
	{
		$to = SITE['email'];
		$subject = 'Kontakt ze strony: ' . $this->singleLine($form['subject']);
		$body = implode("\n", [
			'Nowa wiadomość z formularza kontaktowego.',
			'',
			'Imię i nazwisko: ' . $form['name'],
			'E-mail: ' . $form['email'],
			'Temat: ' . $form['subject'],
			'',
			'Wiadomość:',
			$form['message'],
			'',
			'IP: ' . ($_SERVER['REMOTE_ADDR'] ?? ''),
			'User-Agent: ' . ($_SERVER['HTTP_USER_AGENT'] ?? ''),
		]);
		$headers = implode("\r\n", [
			'MIME-Version: 1.0',
			'Content-Type: text/plain; charset=UTF-8',
			'From: ' . SITE['short'] . ' <' . SITE['email'] . '>',
			'Reply-To: ' . $this->singleLine($form['email']),
			'X-Mailer: PHP/' . PHP_VERSION,
		]);

		return mail($to, mb_encode_mimeheader($subject, 'UTF-8'), $body, $headers);
	}

	private function singleLine(string $value): string
	{
		return str_replace(["\r", "\n"], '', $value);
	}
}
