<?php

//namespace lib;

class Rbpi {

	public function __construct() {}

	public static function distribution() {
		$distroTypeRaw = exec("cat /etc/*-release | grep PRETTY_NAME=", $out);
		$distroTypeRawEnd = str_ireplace('PRETTY_NAME="', '', $distroTypeRaw);
		$distroTypeRawEnd = str_ireplace('"', '', $distroTypeRawEnd);

		return $distroTypeRawEnd;
	}

	public static function kernel() {
		return exec("uname -mrs");
	}

	public static function firmware() {
		return exec("uname -v");
	}

	public static function hostname($full = false) {
		return $full ? exec("hostname -f") : gethostname();
	}

	public static function ip() {
		return $_SERVER['SERVER_ADDR'];
	}

	public static function webServer() {
		return $_SERVER['SERVER_SOFTWARE'];
	}

	public static function authenticationFailure(){
        $return = [];
        exec('cat /var/log/auth.log | grep -c "authentication failure"', $return);
        if(count($return)) {
            return $return[count($return) - 1];
        }
        return 0;
	}

}

?>
