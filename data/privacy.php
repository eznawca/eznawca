<?php

return [
	'id' => 'privacy',
	'type' => 'page',
	'route' => [
		'path' => '/polityka-prywatnosci',
		'label' => 'Polityka prywatności',
		'parent' => 'home',
		'menu' => false,
	],
	'seo' => [
		'title' => 'Polityka prywatności — Andrzej Mazur EZNAWCA',
		'description' => 'Polityka prywatności serwisu eznawca.pl — dane osobowe, cookies, Google Analytics.',
		'canonical' => '/polityka-prywatnosci',
	],
	'sitemap' => [
		'changefreq' => 'yearly',
		'priority' => '0.2',
	],
];
