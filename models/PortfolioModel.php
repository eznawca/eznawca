<?php
/**
 * Model portfolio — projekty autora. Dane jako tablica PHP (szybki dostęp).
 * Interfejs: all(), find($slug) — niezależny od źródła danych.
 */
class PortfolioModel
{
	/** @return array<string,array<string,mixed>> slug => projekt */
	private function projects(): array
	{
		return [
			'matematyk' => [
				'slug'     => 'matematyk',
				'title'    => 'Matematyk',
				'subtitle' => 'edukacyjny program desktop',
				'lead'     => 'Kompleksowy program edukacyjny do matematyki — geometria, arytmetyka, równania, wzory.',
				'description' => 'Autorski program do nauki matematyki przez samodzielne rozwiązywanie zadań. Zawiera kompletny program szkolny od klasy IV do VIII wraz ze zbiorem zadań egzaminacyjnych do szkół średnich. To nie kolejna multimedialna zabawka — głównym celem jest realna nauka matematyki.',
				'year'     => '2008',
				'tech'     => ['Aplikacja desktop', 'Edukacja'],
				'url'      => '/mat/',          // samodzielny pod-serwis
				'external' => false,
			],
			'proline' => [
				'slug'     => 'proline',
				'title'    => 'Proline',
				'subtitle' => 'e-commerce',
				'lead'     => 'Projekt z obszaru e-commerce — sklep internetowy i procesy e-sprzedaży.',
				'description' => 'Rozwiązanie e-commerce, przy którym odpowiadałem za warstwę back-end w PHP oraz optymalizację procesów e-marketingu i e-sprzedaży.',
				'year'     => '',
				'tech'     => ['PHP', 'e-commerce', 'Back-end'],
				'url'      => '',
				'external' => false,
			],
		];
	}

	/** @return array<int,array<string,mixed>> lista projektów */
	public function all(): array
	{
		return array_values($this->projects());
	}

	/** @return array<string,mixed>|null pojedynczy projekt po slug */
	public function find(string $slug): ?array
	{
		return $this->projects()[$slug] ?? null;
	}
}
