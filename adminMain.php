<?php
	session_start();
	$userData = $_SESSION["userInfo"];

	echo $userData[0];
	echo '<br/>';
	echo $userData[1];
	echo '<br/>';
	echo $userData[2];
	echo '<br/>';
	echo $userData[3];

?>

<!DOCTYPE HTML>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>ADMINISTRATOR</h1>

</body>
</html>