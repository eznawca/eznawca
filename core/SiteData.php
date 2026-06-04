<?php
/**
 * Warstwa dostępu do statycznych danych projektu.
 *
 * Pliki `data/*.php` pełnią rolę szybkiej, wersjonowanej bazy danych.
 * Dane są ładowane leniwie i cache'owane w obrębie requestu.
 */
class SiteData
{
	/** @var array<string,array> */
	private static array $cache = [];

	/** @return array<string,mixed> */
	public static function get(string $name): array
	{
		if (!isset(self::$cache[$name])) {
			$file = BASE_PATH . '/data/' . $name . '.php';
			self::$cache[$name] = is_file($file) ? require $file : [];
		}

		return self::$cache[$name];
	}

	/** @return array<int,string> */
	public static function pageIds(): array
	{
		return self::get('pages');
	}

	/** @return array<string,mixed>|null */
	public static function page(string $id): ?array
	{
		$page = self::get($id);
		if (empty($page) || ($page['type'] ?? '') !== 'page') {
			return null;
		}

		return $page;
	}

	/** @return array<int,array<string,mixed>> */
	public static function allPages(): array
	{
		$pages = [];
		foreach (self::pageIds() as $id) {
			$page = self::page($id);
			if ($page !== null) {
				$pages[] = $page;
			}
		}

		return $pages;
	}

	/** @return array<string,string> path => label */
	public static function menu(): array
	{
		$items = [];
		foreach (self::allPages() as $page) {
			$route = $page['route'] ?? [];
			if (!empty($route['menu']) && !empty($route['path']) && !empty($route['label'])) {
				$items[$route['path']] = $route['label'];
			}
		}

		return $items;
	}

	/** @return array<string,mixed> */
	public static function meta(string $id): array
	{
		$page = self::page($id);
		if ($page === null) {
			return [];
		}

		return ($page['seo'] ?? []) + [
			'breadcrumb' => self::breadcrumb($id),
		];
	}

	/**
	 * @param array<int,array{label:string,url:string}> $extra
	 * @return array<int,array{label:string,url:string}>
	 */
	public static function breadcrumb(string $id, array $extra = []): array
	{
		$items = [];
		$current = $id;
		$guard = 0;

		while ($current !== '' && $guard < 20) {
			$page = self::page($current);
			if ($page === null) {
				break;
			}

			$route = $page['route'] ?? [];
			$items[] = [
				'label' => (string)($route['label'] ?? $current),
				'url' => (string)($route['path'] ?? ''),
			];

			$current = (string)($route['parent'] ?? '');
			$guard++;
		}

		$items = array_reverse($items);
		if ($id === 'home') {
			$items = [];
		}

		return array_merge($items, $extra);
	}

	/** @return array<int,array<string,mixed>> */
	public static function blocks(string $id): array
	{
		$page = self::page($id);
		if ($page === null) {
			return [];
		}

		return (array)($page['blocks'] ?? []);
	}

	/** @return array<int|string,mixed> */
	public static function items(string $id, string $key): array
	{
		$page = self::page($id);
		if ($page === null) {
			return [];
		}

		return (array)($page['items'][$key] ?? []);
	}

	/** @return array<string,mixed> */
	public static function content(string $id): array
	{
		$page = self::page($id);
		if ($page === null) {
			return [];
		}

		return (array)($page['content'] ?? []);
	}
}
