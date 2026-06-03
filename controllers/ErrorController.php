<?php
// HomeController.php - Page Controller dla strony "Home"

// Kontrolery jako klasy
class ErrorController {
	public function index() {
		// Logika biznesowa dla strony "Home"
		$pageTitle = "Strona błędu 404";
		$content = "404 Not Found!";

		// Wyświetlanie widoku
		include('./views/_header.php');
		include('./views/error404.php');
		include('./views/_footer.php');
	}
}