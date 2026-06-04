<?php
/**
 * SEO + AEO — generowanie znaczników meta (1:1 z eznawca.pl) oraz danych
 * strukturalnych JSON-LD (Person, WebSite, BreadcrumbList + bloki stron).
 *
 * Korzysta ze stałej SITE (config/site.php).
 *
 * @author Andrzej Mazur <eznawca@gmail.com>
 */
class Seo
{
	/** Skrót na htmlspecialchars. */
	private static function e(string $s): string
	{
		return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
	}

	/** Adres bezwzględny z podanej ścieżki. */
	public static function absUrl(string $path): string
	{
		if ($path === '' ) {
			return SITE['url'];
		}
		if (strpos($path, 'http') === 0) {
			return $path;
		}
		return SITE['url'] . '/' . ltrim($path, '/');
	}

	/** Wygeneruj listę słów kluczowych z tekstu (słowa >= 3 znaki, unikalne). */
	public static function keywords(string $text): string
	{
		$words = preg_split('/\s+/', mb_strtolower($text, 'UTF-8'), -1, PREG_SPLIT_NO_EMPTY);
		$out = [];
		foreach ($words as $w) {
			$w = trim($w, " \t\n\r\0\x0B,.;:!?\"'()-");
			if (mb_strlen($w, 'UTF-8') >= 3) {
				$out[$w] = true;
			}
		}
		return implode(', ', array_keys($out));
	}

	/**
	 * Wypisz znaczniki meta w <head> (po charset/viewport/title).
	 * @param array<string,mixed> $meta
	 */
	public static function meta(array $meta): void
	{
		$desc     = (string)($meta['description'] ?? SITE['description']);
		$keywords = $meta['keywords'] ?? '';
		if ($keywords === '') {
			$keywords = self::keywords(($meta['title'] ?? SITE['name']) . ' ' . SITE['author'] . ' EZNAWCA');
		}
		$canonical = !empty($meta['canonical']) ? self::absUrl($meta['canonical']) : '';
		$ogType    = (string)($meta['ogType'] ?? 'website');
		$ogImage   = self::absUrl((string)($meta['ogImage'] ?? SITE['ogImage']));
		$title     = (string)($meta['title'] ?? SITE['name']);

		echo '<meta name="description" content="' . self::e($desc) . '">' . PHP_EOL;
		echo '<meta name="keywords" content="' . self::e($keywords) . '">' . PHP_EOL;
		echo '<meta name="robots" content="index, follow">' . PHP_EOL;
		echo '<meta name="author" content="' . self::e(SITE['author']) . '">' . PHP_EOL;
		echo '<meta name="copyright" content="Copyright &copy; ' . date('Y') . ' ' . self::e(SITE['name']) . '">' . PHP_EOL;
		if ($canonical !== '') {
			echo '<link rel="canonical" href="' . self::e($canonical) . '">' . PHP_EOL;
		}

		// Open Graph
		echo '<meta property="og:locale" content="' . self::e(SITE['locale']) . '">' . PHP_EOL;
		echo '<meta property="og:type" content="' . self::e($ogType) . '">' . PHP_EOL;
		echo '<meta property="og:title" content="' . self::e($title) . '">' . PHP_EOL;
		echo '<meta property="og:description" content="' . self::e($desc) . '">' . PHP_EOL;
		echo '<meta property="og:url" content="' . self::e($canonical !== '' ? $canonical : SITE['url']) . '">' . PHP_EOL;
		echo '<meta property="og:site_name" content="' . self::e(SITE['name']) . '">' . PHP_EOL;
		echo '<meta property="og:image" content="' . self::e($ogImage) . '">' . PHP_EOL;
		echo '<meta name="twitter:card" content="summary_large_image">' . PHP_EOL;

		// Ikony
		echo '<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">' . PHP_EOL;
		echo '<link rel="apple-touch-icon" sizes="72x72" href="/img/eznawca-icon-72.png">' . PHP_EOL;
		echo '<link rel="apple-touch-icon" sizes="114x114" href="/img/eznawca-icon-114.png">' . PHP_EOL;
		echo '<link rel="apple-touch-icon" sizes="144x144" href="/img/eznawca-icon-144.png">' . PHP_EOL;

		// Weryfikacja Google
		if (!empty(SITE['googleVerification'])) {
			echo '<meta name="google-site-verification" content="' . self::e(SITE['googleVerification']) . '">' . PHP_EOL;
		}

		// Preconnect (szybsze ładowanie zasobów zewnętrznych)
		foreach ((array)(SITE['preconnect'] ?? []) as $host) {
			echo '<link rel="preconnect" href="' . self::e($host) . '" crossorigin>' . PHP_EOL;
		}
	}

	/**
	 * Wypisz bloki JSON-LD: Person + WebSite (na każdej stronie) +
	 * BreadcrumbList (jeśli jest breadcrumb) + bloki page-specific ($meta['jsonld']).
	 * @param array<string,mixed> $meta
	 */
	public static function jsonLd(array $meta): void
	{
		$blocks = [];

		// Person — tożsamość marki osobistej (kluczowe dla AEO)
		$blocks[] = [
			'@context'      => 'https://schema.org',
			'@type'         => 'Person',
			'@id'           => SITE['url'] . '/#person',
			'name'          => SITE['author'],
			'alternateName' => 'EZNAWCA',
			'url'           => SITE['url'],
			'image'         => self::absUrl(SITE['ogImage']),
			'jobTitle'      => SITE['jobTitle'],
			'email'         => 'mailto:' . SITE['email'],
			'sameAs'        => array_values(SITE['social']),
		];

		// WebSite
		$blocks[] = [
			'@context'   => 'https://schema.org',
			'@type'      => 'WebSite',
			'@id'        => SITE['url'] . '/#website',
			'name'       => SITE['name'],
			'url'        => SITE['url'],
			'inLanguage' => SITE['lang'],
			'author'     => ['@id' => SITE['url'] . '/#person'],
		];

		// BreadcrumbList
		if (!empty($meta['breadcrumb'])) {
			$items = [];
			foreach ($meta['breadcrumb'] as $i => $crumb) {
				$items[] = [
					'@type'    => 'ListItem',
					'position' => $i + 1,
					'name'     => $crumb['label'],
					'item'     => self::absUrl($crumb['url']),
				];
			}
			$blocks[] = [
				'@context'        => 'https://schema.org',
				'@type'           => 'BreadcrumbList',
				'itemListElement' => $items,
			];
		}

		// Bloki specyficzne dla strony (np. FAQPage, CreativeWork)
		foreach ((array)($meta['jsonld'] ?? []) as $block) {
			$blocks[] = $block;
		}

		foreach ($blocks as $block) {
			echo '<script type="application/ld+json">'
				. json_encode($block, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
				. '</script>' . PHP_EOL;
		}
	}
}
