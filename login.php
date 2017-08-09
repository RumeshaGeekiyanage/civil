<?php
	class Login {
		function loginData($conn) {
			if(isset($_POST['submit'])) {
				$usernamePost = $_POST['username'];
				$passwordPost = $_POST['password'];

				$username = mysqli_real_escape_string($conn, $usernamePost);
				$password = md5($passwordPost);

				$userLoginData = [$username, $password];
				return $userLoginData;
			}
		}

		function login() {
			include_once("dbOperations.php");
			$DBOb = new DBOperations();

			$conn = $DBOb->con;

			$userLoginData = $this->loginData($conn);

			$username = $userLoginData[0];
			$password = $userLoginData[1];

			$table = "users";
			$field = ["user_id", "username", "first_name", "last_name","password", "user_level"]; // select all
			$condition = "username = '$username'";

			$selectData = $DBOb->select($table, $field, $condition);

			if(!empty($selectData)) {
				$userID = $selectData[0][0];
				$firstName = $selectData[0][2];
				$lastName = $selectData[0][3];
				$passwordDB = $selectData[0][4];
				$userLevel = $selectData[0][5];

				$userData = [$userID, $username, $firstName, $lastName, $passwordDB, $userLevel];

				if($passwordDB == $password) {
					session_start();
					$_SESSION["userInfo"] = $userData;

					if($userLevel == 1) {
						header('Location: adminMain.php');
					} elseif ($userLevel == 2) {
						header('Location: secretaryMain.php');
					} elseif ($userLevel == 3) {
						header('Location: AdSecretaryMain.php');
					} else {
						header('Location: sCHome.php');
					}

				} else {
					echo "Password is incorrect!";
				}
			} else {
				echo "Username does not exist in the database!";
			}
		}
	}

	$logOb = new Login;
	$logOb->login();
?>