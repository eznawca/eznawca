<?php
/**
 * Strona główna.
 */
class HomeController extends Controller
{
	public function index(): void
	{
		$this->view('home', [], SiteData::meta('home'));
	}
}
