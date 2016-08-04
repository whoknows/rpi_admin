<?php

include ('../conf/init.php');
session_start();

if (isset($_POST['user-login']) && isset($_POST['user-passwd'])) {
	$_POST['user-login'] = strtolower($_POST['user-login']);

	/*$req = BDD::getBDD()->prepare('SELECT * FROM user WHERE mail = :mail');
	$req->execute(array(':mail' => $_POST['user-login']));

	if (sizeof($req) > 0) {
		foreach ($req as $row) {
			if ($row['passwd'] == sha1(trim($_POST['user-passwd']))) {
				$user = new User();
				foreach ($row as $attr => $val) {
					if ($attr != "passwd") {
						$user->setAttribute($attr, $val);
					}
				}
				$user->setConnected(true);
			}
		}
	}*/
	if($_POST['user-login'] === 'guillaume' && $_POST['user-passwd'] === 'cj6limek30awl'){
		$user = new User();
		$user->setAttribute('login',$_POST['user-login']);
		$user->setConnected(true);
	}
}

if (isset($user) && $user->isConnected()) {
	header('Location:../index.php');
} else {
	header('Location:../login.php');
}
