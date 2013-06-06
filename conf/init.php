<?php
	error_reporting(E_ALL ^ E_STRICT);
	ini_set('display_errors', '1');

	if(is_dir('/var/www/rpi_admin')){
		define('FULL_PATH', '/var/www/rpi_admin');
	} else {
		define('FULL_PATH', 'F:\Program Files (x86)\wamp\www\metro');
	}

	if( getcwd() != FULL_PATH ){
		define('PATH_CLASS'  , getcwd().'/../class/');
	} else {
		define('PATH_CLASS'  , getcwd().'/class/');
	}

	spl_autoload_register (function ($class){
		require PATH_CLASS.$class.'.class.php';
	});
?>
