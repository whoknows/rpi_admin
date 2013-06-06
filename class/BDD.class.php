<?php

class BDD {

	private $PDOInstance = null;
	private static $bdd = null;

	public function __construct() {
		$this->PDOInstance = new pdo('mysql:host=192.168.1.21;dbname=rpi_admin', 'root', 'secret');
	}

	static function getBDD() {
		if (is_null(self::$bdd)) {
			self::$bdd = new BDD();
		}
		return self::$bdd->PDOInstance;
	}

}

?>
