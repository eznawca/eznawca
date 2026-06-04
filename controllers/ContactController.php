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
		], SiteData::meta('contact'));
	}
}
