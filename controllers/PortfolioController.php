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
		$this->view('portfolio/index', [
			'projects' => $this->model->all(),
		], SiteData::meta('portfolio'));
	}

	public function show(string $slug): void
	{
		$project = $this->model->find($slug);

		if ($project === null) {
			http_response_code(404);
			(new ErrorController())->index();
			return;
		}

		// CreativeWork — dane strukturalne projektu (AEO).
		$creativeWork = [
			'@context'    => 'https://schema.org',
			'@type'       => 'CreativeWork',
			'name'        => $project['title'],
			'description' => $project['description'] ?? ($project['lead'] ?? $project['title']),
			'url'         => Seo::absUrl('/portfolio/' . $slug),
			'author'      => ['@id' => SITE['url'] . '/#person'],
		];
		if (!empty($project['year'])) {
			$creativeWork['dateCreated'] = $project['year'];
		}
		if (!empty($project['tech'])) {
			$creativeWork['keywords'] = implode(', ', $project['tech']);
		}

		$this->view('portfolio/show', [
			'project' => $project,
		], [
			'title'       => $project['title'] . ' — Portfolio — Andrzej Mazur EZNAWCA',
			'description' => $project['lead'] ?? $project['title'],
			'canonical'   => '/portfolio/' . $slug,
			'ogType'      => 'article',
			'breadcrumb'  => SiteData::breadcrumb('portfolio', [
				['label' => $project['title'], 'url' => '/portfolio/' . $slug],
			]),
			'jsonld'      => [$creativeWork],
		]);
	}
}
