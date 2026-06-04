<?php
/**
 * Konfiguracja witryny EZNAWCA — pojedyncza stała SITE (tablica, szybki dostęp).
 * Wartości SEO przeniesione 1:1 z żywej wersji eznawca.pl.
 */
define('SITE', [
	'name'        => 'Andrzej Mazur EZNAWCA',
	'short'       => 'EZNAWCA.pl',
	'url'         => 'https://eznawca.pl',          // bez końcowego slasha
	'locale'      => 'pl_PL',
	'lang'        => 'pl',
	'author'      => 'Andrzej Mazur',
	'email'       => 'eznawca@gmail.com',
	'jobTitle'    => 'Full Stack PHP Developer',
	'description' => 'Andrzej Mazur EZNAWCA — programista PHP i Web Developer. Tworzę rozwiązania back-end dla branży e-commerce.',

	// Domyślne obrazy
	'ogImage'     => '/img/andrzej-mazur-eznawca.jpg',
	'logo'        => '/img/eznawca-logo.svg',
	'icon'        => '/img/eznawca-icon-270.png',

	// Weryfikacja Google (z eznawca.pl)
	'googleVerification' => '7x3mCzu4bQhzFGoPfjzGDSn22kfaGLE5MPLjFJAuzxw',

	// Profile społecznościowe (sameAs w JSON-LD + stopka)
	'social' => [
		'LinkedIn' => 'https://www.linkedin.com/in/andrzej-mazur/',
		'YouTube'  => 'https://www.youtube.com/user/eznawca/',
		'Facebook' => 'https://www.facebook.com/eznawca',
	],

	// Domeny do preconnect (szybsze ładowanie zasobów zewnętrznych)
	'preconnect' => [
		'https://cdn.jsdelivr.net',
	],
]);
