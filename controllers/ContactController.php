<?php
/**
 * Kontakt.
 */
class ContactController extends Controller
{
	public function index(): void
	{
		$this->view('contact', [
			'sent' => false,
		], [
			'title'       => 'Kontakt — Andrzej Mazur EZNAWCA',
			'description' => 'Skontaktuj się z Andrzejem Mazurem (EZNAWCA) — e-mail i profile zawodowe.',
			'canonical'   => '/kontakt',
			'breadcrumb'  => [
				['label' => 'Główna', 'url' => '/'],
				['label' => 'Kontakt', 'url' => '/kontakt'],
			],
		]);
	}
}
