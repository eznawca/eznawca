<?php
/**
 * Portfolio — oś czasu kariery i projektów (strona /portfolio).
 */
class PortfolioController extends Controller
{
	private PortfolioModel $model;

	public function __construct()
	{
		$this->model = new PortfolioModel();
	}

	public function index(): void
	{
		$this->view('portfolio', [
			'projects' => $this->model->all(),
		], SiteData::meta('portfolio'));
	}
}
