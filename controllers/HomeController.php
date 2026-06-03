<?php
// HomeController.php - Page Controller dla strony "Home"

// Kontrolery jako klasy
class HomeController {
	private $objmodel;

	public function __construct($obj_model = null)
	{
		$this->objmodel = $obj_model;
	}

	public function index() {
		if ($this->objmodel !== null) $data = $this->objmodel->getContent();
		$pageTitle = $data['title'];
		$content = $data['data'];

		// Wyświetlanie widoku
		include('./views/_header.php');
		include('./views/home.php');
		include('./views/_footer.php');
	}

	public function handlePost() {
		// Obsługa żądania POST dla strony "Home"
		// ...
	}
}