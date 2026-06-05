<?php

return [
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
	'items' => [
		'questions' => [
			['q' => 'Kim jest Andrzej Mazur EZNAWCA?', 'a' => 'Andrzej Mazur (pseudonim EZNAWCA) to Senior Full Stack PHP Developer specjalizujący się w back-endzie i rozwiązaniach dla branży e-commerce.'],
			['q' => 'W jakich technologiach pracujesz?', 'a' => 'Przede wszystkim PHP po stronie back-end oraz technologie pokrewne: MySQL, HTML, CSS, JavaScript i Bootstrap. Tworzę i optymalizuję rozwiązania e-commerce.'],
			['q' => 'Czym się zajmujesz zawodowo?', 'a' => 'Programuję dla branży e-commerce — optymalizuję procesy e-marketingu i e-sprzedaży, budując przewagę konkurencyjną za pomocą nowych technologii.'],
			['q' => 'Co to jest program Matematyk?', 'a' => 'Matematyk to mój autorski program edukacyjny do nauki matematyki — kompletny materiał szkolny wraz ze zbiorem zadań. Dostępny jest pod adresem /mat/.'],
			['q' => 'Czym jest LekcjePHP.pl?', 'a' => 'LekcjePHP.pl to mój darmowy kurs WebDev z back-endem w PHP, skierowany do osób uczących się programowania po stronie serwera.'],
			['q' => 'Jak się ze mną skontaktować?', 'a' => 'Najszybciej mailowo: eznawca@gmail.com. Zawodowe CV i kontakt biznesowy znajdziesz także na moim profilu LinkedIn.'],
		],
	],
];
