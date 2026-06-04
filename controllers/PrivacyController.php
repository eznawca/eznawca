<?php
/**
 * Polityka prywatności.
 */
class PrivacyController extends Controller
{
	public function index(): void
	{
		$this->view('privacy', [], SiteData::meta('privacy'));
	}
}
