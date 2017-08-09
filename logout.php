<?php
class Logout {
	function logout() {
		session_start();

		session_unset();
		session_destroy();
		header('Location: index.php');
	}

	function __construct() {
		$this->logout();
	}
}

new Logout;
?>