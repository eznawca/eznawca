<?php
/**
 * Polityka prywatności.
 */
class PrivacyController extends Controller
{
	public function index(): void
	{
		$this->view('privacy', [], [
			'title'       => 'Polityka prywatności — Andrzej Mazur EZNAWCA',
			'description' => 'Polityka prywatności serwisu eznawca.pl — dane osobowe, cookies, Google Analytics.',
			'canonical'   => '/polityka-prywatnosci',
			'breadcrumb'  => [
				['label' => 'Główna', 'url' => '/'],
				['label' => 'Polityka prywatności', 'url' => '/polityka-prywatnosci'],
			],
		]);
	}
}
