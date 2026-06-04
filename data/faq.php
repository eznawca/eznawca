<?php

return [
	'schema' => 'page:1',
	'id' => 'faq',
	'type' => 'page',
	'route' => [
		'path' => '/faq',
		'label' => 'FAQ',
		'parent' => 'home',
		'menu' => true,
	],
	'seo' => [
		'title' => 'FAQ — Andrzej Mazur EZNAWCA',
		'description' => 'Najczęściej zadawane pytania o Andrzeju Mazurze (EZNAWCA), technologiach i projektach.',
		'canonical' => '/faq',
	],
	'sitemap' => [
		'changefreq' => 'monthly',
		'priority' => '0.7',
	],
	'blocks' => [
		[
			'id' => 'main-faq',
			'type' => 'faq',
			'title' => 'FAQ — najczęściej zadawane pytania',
			'items' => [
				[
					'title' => 'Kim jest Andrzej Mazur EZNAWCA?',
					'text' => 'Andrzej Mazur (pseudonim EZNAWCA) to Senior Full Stack PHP Developer specjalizujący się w back-endzie i rozwiązaniach dla branży e-commerce.',
				],
				[
					'title' => 'W jakich technologiach pracujesz?',
					'text' => 'Przede wszystkim PHP po stronie back-end oraz technologie pokrewne: MySQL, HTML, CSS, JavaScript i Bootstrap. Tworzę i optymalizuję rozwiązania e-commerce.',
				],
				[
					'title' => 'Czym się zajmujesz zawodowo?',
					'text' => 'Programuję dla branży e-commerce — optymalizuję procesy e-marketingu i e-sprzedaży, budując przewagę konkurencyjną za pomocą nowych technologii.',
				],
				[
					'title' => 'Co to jest program Matematyk?',
					'text' => 'Matematyk to mój autorski program edukacyjny do nauki matematyki — kompletny materiał szkolny wraz ze zbiorem zadań. Dostępny jest pod adresem /mat/.',
				],
				[
					'title' => 'Czym jest LekcjePHP.pl?',
					'text' => 'LekcjePHP.pl to mój darmowy kurs WebDev z back-endem w PHP, skierowany do osób uczących się programowania po stronie serwera.',
				],
				[
					'title' => 'Jak się ze mną skontaktować?',
					'text' => 'Najszybciej mailowo: eznawca@gmail.com. Zawodowe CV i kontakt biznesowy znajdziesz także na moim profilu LinkedIn.',
				],
			],
		],
	],
];
