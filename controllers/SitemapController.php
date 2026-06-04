<?php
/**
 * Dynamiczny sitemap.xml generowany z warstwy danych (jedno źródło prawdy).
 * Strony z data/*.php (pole route.path + sitemap) + projekty portfolio + /mat/.
 */
class SitemapController
{
	public function index(): void
	{
		$base = rtrim(SITE['url'], '/');
		$urls = [];

		foreach (SiteData::allPages() as $page) {
			$path = (string)($page['route']['path'] ?? '');
			if ($path === '') {
				continue;
			}
			$sm = (array)($page['sitemap'] ?? []);
			$urls[] = [
				'loc' => $base . $path,
				'changefreq' => $sm['changefreq'] ?? null,
				'priority' => $sm['priority'] ?? null,
			];
		}

		foreach ((new PortfolioModel())->all() as $project) {
			if (empty($project['slug'])) {
				continue;
			}
			$urls[] = [
				'loc' => $base . '/portfolio/' . $project['slug'],
				'changefreq' => 'yearly',
				'priority' => '0.6',
			];
		}

		$urls[] = [
			'loc' => $base . '/mat/',
			'changefreq' => 'yearly',
			'priority' => '0.4',
		];

		header('Content-Type: application/xml; charset=UTF-8');
		echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
		echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
		foreach ($urls as $url) {
			echo "\t<url>\n";
			echo "\t\t<loc>" . htmlspecialchars($url['loc'], ENT_XML1, 'UTF-8') . "</loc>\n";
			if (!empty($url['changefreq'])) {
				echo "\t\t<changefreq>" . $url['changefreq'] . "</changefreq>\n";
			}
			if (!empty($url['priority'])) {
				echo "\t\t<priority>" . $url['priority'] . "</priority>\n";
			}
			echo "\t</url>\n";
		}
		echo '</urlset>' . "\n";
	}
}
