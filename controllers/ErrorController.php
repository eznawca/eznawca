<?php
/**
 * Strona błędu 404.
 */
class ErrorController extends Controller
{
	public function index(): void
	{
		$this->view('error404', [], [
			'title'       => 'Nie znaleziono strony (404) — Andrzej Mazur EZNAWCA',
			'description' => 'Strona o podanym adresie nie istnieje.',
		]);
	}
}
