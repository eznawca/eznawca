<?php

class AuthorController {
	public function index() {
		// Logika biznesowa dla strony "About"
		$pageTitle = "Autor";
		$content = "Jestem";

		// Wyświetlanie widoku
		include('./views/_header.php');
		include('./views/about.php');
		include('./views/_footer.php');
	}
}