<?php
class AboutModel {
	public function getContent() {
		// Tutaj możesz umieścić logikę do pobierania zawartości strony "About" z bazy danych lub innych źródeł danych.
		// Na potrzeby przykładu, zwracamy statyczną treść.
		return [
			'success' => true,
			'data' => "Jesteśmy firmą zajmującą się..."
		];
	}
}
