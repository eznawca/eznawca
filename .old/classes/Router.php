<?php

	class Router {
	protected $routes = [];

	public function add($route, $action) {
		$this->routes[$route] = $action;
	}

	public function dispatch($request) {
		$requestPath = $request->getPath();
		if (array_key_exists($requestPath, $this->routes)) {
			$action = $this->routes[$requestPath];
			$this->executeAction($action);
		} else {
			header("HTTP/1.0 404 Not Found");
			echo "404 Not Found";
		}
	}

	protected function executeAction($action) {
		//print('<pre>'.print_r($action,1));

		if (is_string($action)) {
			list($class, $method) = explode('@', $action);
			//exit('<pre>'.print_r($class,1));
			$instance = new $class();
			call_user_func_array([$instance, $method], []);
		} else {
			call_user_func($action);
		}
	}
}
