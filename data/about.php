<?php

return [
	'id' => 'about',
	'type' => 'page',
	'route' => [
		'path' => '/o-mnie',
		'label' => 'O mnie',
		'parent' => 'home',
		'menu' => true,
	],
	'seo' => [
		'title' => 'O mnie — Andrzej Mazur EZNAWCA',
		'description' => 'Andrzej Mazur EZNAWCA — Senior Full Stack PHP Developer. Back-end, e-commerce, nowe media.',
		'canonical' => '/o-mnie',
		'ogType' => 'profile',
	],
	'sitemap' => [
		'changefreq' => 'monthly',
		'priority' => '0.8',
	],
];
