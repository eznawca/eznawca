<?php
/**
 * Bootstrap aplikacji EZNAWCA — konfiguracja środowiska, autoloader, helpery.
 *
 * @author Andrzej Mazur <eznawca@gmail.com>
 */

// --- Wykrycie środowiska -----------------------------------------------------
// Lokalnie host nie zawiera kropki (np. "localhost", "eznawca-prj").
define('LOCAL_HOST', strpos(@$_SERVER['HTTP_HOST'], '.') === false);

if (LOCAL_HOST) {
	// Developerka
	ini_set('display_errors', '1');
	ini_set('display_startup_errors', 'On');
	error_reporting(E_ALL);
	set_time_limit(360);
} else {
	// Produkcja
	ini_set('display_errors', '0');
	ini_set('display_startup_errors', 'Off');
	error_reporting(0);
	set_time_limit(180);
}

date_default_timezone_set('Europe/Warsaw');
setlocale(LC_CTYPE, 'pl_PL.utf-8');
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

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
