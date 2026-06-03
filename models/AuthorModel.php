<?php

class AuthorModel {
	public function getContent() {
		// Tutaj możesz umieścić logikę do pobierania informacji o autorze z bazy danych lub innych źródeł danych.
		// Na potrzeby przykładu, zwracamy statyczne dane autora.
		return [
			'success' => true,
			'data' => [
				'name' => 'Jan Kowalski',
				'email' => 'jan@example.com',
				'bio' => 'Jestem web developerem specjalizującym się w...',
			]
		];
	}
}
