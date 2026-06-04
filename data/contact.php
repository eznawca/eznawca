<?php

return [
	'id' => 'contact',
	'type' => 'page',
	'route' => [
		'path' => '/kontakt',
		'label' => 'Kontakt',
		'parent' => 'home',
		'menu' => true,
	],
	'seo' => [
		'title' => 'Kontakt — Andrzej Mazur EZNAWCA',
		'description' => 'Skontaktuj się z Andrzejem Mazurem (EZNAWCA) — e-mail i profile zawodowe.',
		'canonical' => '/kontakt',
	],
	'sitemap' => [
		'changefreq' => 'yearly',
		'priority' => '0.5',
	],
	'blocks' => [],
];
