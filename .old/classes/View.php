<?php

class View {
	public static function render($viewFile, $data = []) {
		extract($data);
		include $viewFile;
	}
}
