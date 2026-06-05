<?php
/**
 * "O mnie" — biogram autora.
 */
class AboutController extends Controller
{
	public function index(): void
	{
		$this->view('about', [], SiteData::meta('about'));
	}
}
