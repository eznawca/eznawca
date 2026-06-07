<?php
/**
 * Bootstrap aplikacji EZNAWCA — konfiguracja środowiska, autoloader, helpery.
 *
 * @author Andrzej Mazur <eznawca@gmail.com>
 */

use Eznawca\Comm\Comm;

// --- Polyfille PHP 8.x dla starszych wersji (np. 7.4) ------------------------
// Funkcji NIE da się autoloadować (autoloader działa tylko dla klas),
// dlatego wczytujemy je natychmiastowo, jako pierwsze — będą dostępne wszędzie.
require __DIR__ . '/upgrade_to_php8.lib.php';

// --- Wykrycie środowiska -----------------------------------------------------
// Lokalnie host nie zawiera kropki (np. "localhost", "eznawca-prj").
define('LOCAL_HOST', strpos(@$_SERVER['HTTP_HOST'], '.') === false);

// --- Stałe ścieżek -----------------------------------------------------------
define('BASE_PATH', realpath(__DIR__ . '/..'));   // katalog główny aplikacji
define('VIEW_PATH', BASE_PATH . '/views');         // widoki .phtml

// --- Konfiguracja witryny ----------------------------------------------------
require BASE_PATH . '/config/site.php';

// --- Autoloader aplikacji ----------------------------------------------------
// Lekki, konwencjonalny autoloader: {ClassName}.php w core/, controllers/, models/.
// Niezależny od `composer dump-autoload` — nowe klasy działają bez przebudowy.
spl_autoload_register(static function (string $class): void {
	// Pomijamy klasy z przestrzeniami nazw (te obsługuje composer, np. Eznawca\Comm).
	if (strpos($class, '\\') !== false) {
		return;
	}
	foreach (['core', 'controllers', 'models'] as $dir) {
		$file = BASE_PATH . '/' . $dir . '/' . $class . '.php';
		if (is_file($file)) {
			require $file;
			return;
		}
	}
});


// --- Zależności composera (pakiet eznawca/comm) ------------------------------
$autoload = BASE_PATH . '/vendor/autoload.php';
if (is_file($autoload)) {
	require $autoload;
}

Comm::toggleErrorDisplay();

// @TODO Zaktualizuj bibliotekę Comm
// Comm::initMemoryTimezoneEncoding();
date_default_timezone_set('Europe/Warsaw');
setlocale(LC_CTYPE, 'pl_PL.utf-8');
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

// --- Helpery debugowania -----------------------------------------------------
if (!function_exists('r')) {
	/** Wypisz zmienną w czytelnej formie (tylko diagnostyka). */
	function r($s): void {
		if ($s === false) $s = '[FALSE]';
		if ($s === null)  $s = '[NULL]';
		if ($s === 0)     $s = '[ZERO]';
		echo '<pre>' . htmlspecialchars(print_r($s, true)) . '</pre>';
	}
}
if (!function_exists('rb')) {
	/** Wypisz zmienną i zatrzymaj wykonanie. */
	function rb($s): void {
		r($s);
		exit;
	}
}

// --- Helper widoku -----------------------------------------------------------
if (!function_exists('h')) {
	/** Escape do kontekstu HTML (przede wszystkim atrybuty). */
	function h($s): string {
		return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
	}
}
