<?php
	class CheckPermission {
		function checkPermission($userLevel, $permissionLevel) {
			if($userLevel != $permissionLevel) {
				header("location: unauthorizedAccess.php");
			}
		}


		
		function __construct($userLevel, $permissionLevel) {
			$this->checkPermission($userLevel, $permissionLevel);
		}
	}

?>