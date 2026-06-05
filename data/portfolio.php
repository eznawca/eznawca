<?php

return [
	'id' => 'portfolio',
	'type' => 'page',
	'route' => [
		'path' => '/portfolio',
		'label' => 'Portfolio',
		'parent' => 'home',
		'menu' => true,
	],
	'seo' => [
		'title' => 'Portfolio — Andrzej Mazur EZNAWCA',
		'description' => 'Wybrane projekty Andrzeja Mazura: aplikacje, e-commerce, program edukacyjny Matematyk.',
		'canonical' => '/portfolio',
	],
	'sitemap' => [
		'changefreq' => 'monthly',
		'priority' => '0.9',
	],
	// Cienki indeks pod listę, SEO i CreativeWork. Pełna treść projektu jest w
	// views/portfolio-{slug}.phtml — przy zmianie title/lead aktualizuj oba miejsca.
	'items' => [
		'projects' => [
			'matematyk' => [
				'slug' => 'matematyk',
				'title' => 'Matematyk',
				'subtitle' => 'edukacyjny program desktop',
				'lead' => 'Kompleksowy program edukacyjny do matematyki — geometria, arytmetyka, równania, wzory.',
			],
			'proline' => [
				'slug' => 'proline',
				'title' => 'Proline',
				'subtitle' => 'e-commerce',
				'lead' => 'Projekt z obszaru e-commerce — sklep internetowy i procesy e-sprzedaży.',
			],
		],
	],
];
