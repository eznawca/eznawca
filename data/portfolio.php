<?php

return [
	'schema' => 'page:1',
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
	'blocks' => [
		[
			'id' => 'projects',
			'type' => 'project_grid',
			'title' => 'Portfolio',
		],
	],
	'items' => [
		'projects' => [
			'matematyk' => [
				'slug' => 'matematyk',
				'title' => 'Matematyk',
				'subtitle' => 'edukacyjny program desktop',
				'lead' => 'Kompleksowy program edukacyjny do matematyki — geometria, arytmetyka, równania, wzory.',
				'description' => 'Autorski program do nauki matematyki przez samodzielne rozwiązywanie zadań. Zawiera kompletny program szkolny od klasy IV do VIII wraz ze zbiorem zadań egzaminacyjnych do szkół średnich. To nie kolejna multimedialna zabawka — głównym celem jest realna nauka matematyki.',
				'year' => '2008',
				'tech' => ['Aplikacja desktop', 'Edukacja'],
				'url' => '/mat/',
				'external' => false,
			],
			'proline' => [
				'slug' => 'proline',
				'title' => 'Proline',
				'subtitle' => 'e-commerce',
				'lead' => 'Projekt z obszaru e-commerce — sklep internetowy i procesy e-sprzedaży.',
				'description' => 'Rozwiązanie e-commerce, przy którym odpowiadałem za warstwę back-end w PHP oraz optymalizację procesów e-marketingu i e-sprzedaży.',
				'year' => '',
				'tech' => ['PHP', 'e-commerce', 'Back-end'],
				'url' => '',
				'external' => false,
			],
		],
	],
];
