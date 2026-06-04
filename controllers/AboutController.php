<?php
/**
 * "O mnie" — biogram autora.
 */
class AboutController extends Controller
{
	public function index(): void
	{
		$model = new AboutModel();
		$page = $model->page();

		$this->view('page', [
			'page' => $page,
		], SiteData::meta('about'));
	}
}
