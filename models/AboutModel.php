<?php
/**
 * Model strony "O mnie" — biogram i aktywność w sieci.
 * Dane jako tablice PHP (szybki dostęp, bez I/O).
 */
class AboutModel
{
	/** @return string[] akapity biogramu (HTML dozwolony w treści) */
	public function bio(): array
	{
		return [
			'Pracuję jako Senior Developer programując jako Full Stack PHP Developer dla branży e-commerce. Jestem pasjonatem nowych mediów, reklamy online i wszystkiego, co związane z budowaniem przewagi konkurencyjnej za pomocą nowych technologii.',
			'Najlepiej odnajduję się po stronie <strong>back-end</strong>, tworząc rozwiązania w PHP i technologiach pokrewnych. Przez cały okres swojej kariery tworzę rozwiązania dla branży e-commerce, optymalizując procesy e-marketingu i e-sprzedaży.',
			'Prywatnie uwielbiam sporty wodne, w szczególności nurkowanie. Regularnie wracam też na siłownię — kiedyś biłem rekordy w powerliftingu, ostatnio odnajduję się w treningu funkcjonalnym CrossFit. O czym zdarza mi się nakręcić film i opublikować go na YouTube.',
			'Prywatne statusy znajdziesz na moim publicznym Facebooku, a aktualne zawodowe CV w serwisie LinkedIn.',
		];
	}

	/** @return array<int,array<string,string>> karty aktywności w sieci */
	public function activities(): array
	{
		return [
			[
				'title'    => 'LinkedIn',
				'subtitle' => 'Aktualne doświadczenie zawodowe',
				'text'     => 'Moje aktualne doświadczenie zawodowo-biznesowe i CV znajdziesz na LinkedIn.',
				'link'     => 'https://www.linkedin.com/in/andrzej-mazur/',
			],
			[
				'title'    => 'YouTube — Andrzej Mazur',
				'subtitle' => 'Sporty, nurkowanie, siłownia',
				'text'     => 'Filmy z moich pasji: nurkowanie i sporty siłowe.',
				'link'     => 'https://www.youtube.com/user/eznawca/',
			],
			[
				'title'    => 'Facebook',
				'subtitle' => 'Prywatne statusy',
				'text'     => 'Jako pasjonata nowych mediów znajdziesz mnie na Facebooku.',
				'link'     => 'https://www.facebook.com/eznawca/',
			],
			[
				'title'    => 'Instagram',
				'subtitle' => 'Sporty siłowe i nurkowanie',
				'text'     => 'Kolekcja zdjęć z treningów i wypraw.',
				'link'     => 'https://www.instagram.com/eznawca/',
			],
			[
				'title'    => 'LekcjePHP.pl',
				'subtitle' => 'Darmowy kurs WebDev z back-endem PHP',
				'text'     => 'Mój autorski kurs programowania dla developerów PHP (HTML, CSS, JS, Bootstrap).',
				'link'     => 'https://lekcjephp.pl',
			],
			[
				'title'    => 'Program Matematyk',
				'subtitle' => 'Edukacyjny program do matematyki',
				'text'     => 'Autorski program do nauki matematyki — kompletny materiał szkolny i zbiór zadań.',
				'link'     => '/mat/',
			],
		];
	}
}
