<?php

class Tools {

	static function addSubView($file) {
		ob_start();
		if (!file_exists(addslashes($file))) {
			$file = 'pages/error.html';
		}
		include $file;
		$obContent = ob_get_contents();
		ob_end_clean();
		ob_start();

		return $obContent;
	}

}