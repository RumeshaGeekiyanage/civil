<?php
	class CheckPermission {
		function checkPermission($userLevel, $permissionLevel) {
			if($userLevel != $permissionLevel) {
				header("location: unauthorizedAccess.php");
			}
		}


		
		function __rconstruct($userLevel, $permissionLevel) {
			$this->checkPermission($userLevel, $permissionLevel);
		}
	}

?>