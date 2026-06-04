<?php
/**
 * Strona główna.
 */
class HomeController extends Controller
{
	public function index(): void
	{
		$this->view('home', [
			'lead' => 'Full Stack PHP Developer dla branży e-commerce.',
		], [
			'title'       => 'Andrzej Mazur EZNAWCA — Full Stack PHP Developer',
			'description' => 'Andrzej Mazur EZNAWCA — programista PHP i Web Developer. Tworzę rozwiązania back-end dla e-commerce.',
			'canonical'   => '/',
		]);
	}
}
