<?php
// AboutController.php - Page Controller dla strony "About"

class AboutController {
	public function index() {
		// Logika biznesowa dla strony "About"
		$pageTitle = "O nas";
		$content = "Jesteśmy firmą zajmującą się...";

		// Wyświetlanie widoku
		include('./views/_header.php');
		include('./views/about.php');
		include('./views/_footer.php');
	}

	public function handlePost() {
		// Obsługa żądania POST dla strony "About"
		// ...
	}
}