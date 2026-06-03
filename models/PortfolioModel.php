<?php

class PortfolioModel {
	public function getContent() {
		// Tutaj możesz umieścić logikę do pobierania projektów portfolio autora z bazy danych lub innych źródeł danych.
		// Na potrzeby przykładu, zwracamy statyczną listę projektów.
		return [
			'success' => true,
			'data' => [
				['title' => 'Projekt 1', 'description' => 'Opis projektu 1'],
				['title' => 'Projekt 2', 'description' => 'Opis projektu 2'],
				// Dodaj więcej projektów według potrzeb.
			]
		];
	}
}
