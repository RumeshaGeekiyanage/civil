<?php

class GetParameters {
	function getURLPara() {
		if(isset($_GET['apID'])) {
			$apID = $_GET['apID'];
			echo $apID;
		}
	}



	function __construct() {
		$this->getURLPara();
	}
}

?>