<?php
/**
 * Strona główna.
 */
class HomeController extends Controller
{
	public function index(): void
	{
		$content = SiteData::content('home');

		$this->view('home', [
			'lead' => $content['lead'] ?? '',
		], SiteData::meta('home'));
	}
}
