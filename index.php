<?php
require_once __DIR__ . '/vendor/autoload.php';

define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
function r($s) {
	if ($s === false) $s = '[FALSE]';
	if ($s === null) $s = '[NULL]';
	if ($s === 0) $s = '[ZERO]';
	print('<pre>'.print_r($s, 1));
}
function rb($s) {
	r($s);
	exit();
}

// _index.php - Front Controller
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Mapowanie ścieżek URL na akcje

$routes = [
	'GET:/' => [HomeController::class, 'index', HomeModel::class],
	'POST:/' => [HomeController::class, 'handlePost'],
	'GET:/about' => [AboutController::class, 'index'],
	'POST:/about' => [AboutController::class, 'handlePost'],
	'GET:/portfolio' => [PortfolioController::class, 'index'],
	'GET:/author' => [AuthorController::class, 'index'],
];
// Rozdziel ścieżkę i metodę
$routeKey = $requestMethod . ':' . $requestUri;

// Sprawdź, czy istnieje odpowiednia ścieżka w mapowaniu
if (array_key_exists($routeKey, $routes)) {
	list($controllerName, $action, $modelName) = $routes[$routeKey];

	r($modelName);

	// Wywołaj akcję
	if (!empty($modelName)) {
		$obj_model = new $modelName();
		$controllerClass = new $controllerName($obj_model);
	} else {
		$controllerClass = new $controllerName();
	}
	$controllerClass->$action();
} else {
	//echo "404 Not Found";
	$controllerClass = new ErrorController();
	$controllerClass->index();
}