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
		'description' => 'Skontaktuj się z Andrzejem Mazurem (EZNAWCA) — formularz kontaktowy, e-mail i konsultacje projektów PHP oraz e-commerce.',
		'canonical' => '/kontakt',
	],
	'sitemap' => [
		'changefreq' => 'yearly',
		'priority' => '0.5',
	],
];
