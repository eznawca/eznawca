<?php
/**
 * Prosty router z obsługą tras parametrycznych, np. /portfolio/{slug}.
 *
 * Trasy rejestrujemy metodami get()/post(), wskazując akcję jako
 * [KontrolerClass::class, 'metoda']. Parametry ze ścieżki trafiają
 * do akcji jako kolejne argumenty (w kolejności wystąpienia).
 *
 * @author Andrzej Mazur <eznawca@gmail.com>
 */
class Router
{
	/** @var array<int,array{method:string,regex:string,params:string[],action:array}> */
	private array $routes = [];

	public function get(string $path, array $action): void
	{
		$this->add('GET', $path, $action);
	}

	public function post(string $path, array $action): void
	{
		$this->add('POST', $path, $action);
	}

	private function add(string $method, string $path, array $action): void
	{
		// Wyłuskaj nazwy parametrów {slug} i zbuduj wyrażenie regularne.
		$params = [];
		$regex = preg_replace_callback('#\{(\w+)\}#', static function ($m) use (&$params) {
			$params[] = $m[1];
			return '([^/]+)';
		}, $path);

		$this->routes[] = [
			'method' => $method,
			'regex'  => '#^' . $regex . '$#',
			'params' => $params,
			'action' => $action,
		];
	}

	/**
	 * Dopasuj żądanie i wywołaj akcję. Brak dopasowania → ErrorController::index().
	 */
	public function dispatch(string $method, string $uri): void
	{
		$path = rtrim(parse_url($uri, PHP_URL_PATH), '/');
		if ($path === '') {
			$path = '/';
		}

		foreach ($this->routes as $route) {
			if ($route['method'] !== $method) {
				continue;
			}
			if (preg_match($route['regex'], $path, $matches)) {
				array_shift($matches); // usuń pełne dopasowanie
				$args = array_map('urldecode', $matches);
				[$class, $action] = $route['action'];
				(new $class())->{$action}(...$args);
				return;
			}
		}

		// 404
		http_response_code(404);
		(new ErrorController())->index();
	}
}
