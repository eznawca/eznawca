<?php

class HomeController {
	public function index() {
		// Logika dla strony głównej
		View::render('views/home.php');
	}

	public function show() {
		self::index();
	}
}

