<?php
/**
 * Bazowy kontroler — wspólne renderowanie widoków .phtml w layoucie.
 *
 * Wzorzec: kontroler przygotowuje dane i meta, a view() składa stronę z
 * _header.phtml + widok + _footer.phtml.
 *
 * @author Andrzej Mazur <eznawca@gmail.com>
 */
abstract class Controller
{
	/**
	 * Wyrenderuj widok w layoucie.
	 *
	 * @param string               $view  nazwa pliku widoku bez rozszerzenia (np. 'home')
	 * @param array<string,mixed>  $data  zmienne dostępne w widoku
	 * @param array<string,mixed>  $meta  dane SEO/AEO dla nagłówka (title, description, ...)
	 */
	protected function view(string $view, array $data = [], array $meta = []): void
	{
		$meta = $this->meta($meta);
		extract($data, EXTR_SKIP);

		require VIEW_PATH . '/_header.phtml';
		require VIEW_PATH . '/' . $view . '.phtml';
		require VIEW_PATH . '/_footer.phtml';
	}

	/**
	 * Uzupełnij meta o wartości domyślne marki.
	 *
	 * @param array<string,mixed> $meta
	 * @return array<string,mixed>
	 */
	protected function meta(array $meta): array
	{
		return $meta + [
			'title' => SITE['name'],
			'description' => SITE['description'],
			'keywords' => '',
			'canonical' => '',
			'breadcrumb' => [],
			'jsonld' => [],
		];
	}
}
