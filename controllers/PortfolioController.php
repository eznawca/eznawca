<?php
/**
 * Portfolio — lista projektów oraz strona pojedynczego projektu.
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

	public function show(string $slug): void
	{
		$project = $this->model->find($slug);
		$template = 'portfolio-' . $slug;

		if ($project === null || !is_file(VIEW_PATH . '/' . $template . '.phtml')) {
			http_response_code(404);
			(new ErrorController())->index();
			return;
		}

		// CreativeWork — minimalne dane strukturalne projektu (AEO); author → Person.
		$creativeWork = [
			'@context' => 'https://schema.org',
			'@type'    => 'CreativeWork',
			'name'     => $project['title'],
			'url'      => Seo::absUrl('/portfolio/' . $slug),
			'author'   => ['@id' => SITE['url'] . '/#person'],
		];

		$this->view($template, [], [
			'title'       => $project['title'] . ' — Portfolio — Andrzej Mazur EZNAWCA',
			'description' => $project['lead'],
			'canonical'   => '/portfolio/' . $slug,
			'ogType'      => 'article',
			'breadcrumb'  => SiteData::breadcrumb('portfolio', [
				['label' => $project['title'], 'url' => '/portfolio/' . $slug],
			]),
			'jsonld'      => [$creativeWork],
		]);
	}
}
