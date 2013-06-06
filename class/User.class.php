<?php

if (!isset($_SESSION)) {
	session_start();
}

class User {

	public function __construct() {
		/*if (!$this->isConnected()) {
			$sql = "SELECT * FROM user WHERE id = " . $this->getAttribute('id');
			$req = BDD::getBDD()->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);

			foreach ($res as $attr => $val) {
				if ($attr != "passwd") {
					$this->setAttribute($attr, $val);
				}
			}
			$this->setConnected(true);
		}*/
	}

	public function getAttribute($attr) {
		return isset($_SESSION['user'][$attr]) ? utf8_encode($_SESSION['user'][$attr]) : null;
	}

	public function setAttribute($attr, $value) {
		$_SESSION['user'][$attr] = $value;
	}

	public function isConnected() {
		return isset($_SESSION['user']['auth']) && $_SESSION['user']['auth'] === true;
	}

	public function setConnected($authenticated = true) {
		if (!is_bool($authenticated)) {
			throw new \InvalidArgumentException('La valeur spécifiée à la méthode User::setAuthenticated() doit être un boolean');
		}

		$_SESSION['user']['auth'] = $authenticated;
	}

	public function isAdmin() {
		return isset($_SESSION['user']['rank']) && ($_SESSION['user']['rank'] == '1' || $_SESSION['user']['rank'] == '2');
	}

}

?>