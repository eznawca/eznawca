<?php
/**
 * "O mnie" — biogram autora.
 */
class AboutController extends Controller
{
	public function index(): void
	{
		$model = new AboutModel();

		$this->view('about', [
			'bio'        => $model->bio(),
			'activities' => $model->activities(),
		], [
			'title'       => 'O mnie — Andrzej Mazur EZNAWCA',
			'description' => 'Andrzej Mazur EZNAWCA — Senior Full Stack PHP Developer. Back-end, e-commerce, nowe media.',
			'canonical'   => '/o-mnie',
			'ogType'      => 'profile',
			'breadcrumb'  => [
				['label' => 'Główna', 'url' => '/'],
				['label' => 'O mnie', 'url' => '/o-mnie'],
			],
		]);
	}
}
