<?php
	session_start();
    $userData = $_SESSION["userInfo"];

    $firstName = $userData[2];
    $lastName = $userData[3];
    $userLevel = $userData[5];
    $fullName = $firstName. " ". $lastName;
   
    $permissionToAccessLevel = 4;

    include_once("checkPermission.php");
    new CheckPermission($userLevel, $permissionToAccessLevel);
?>

<!DOCTYPE HTML>

<html>

<head>
	<title>Home</title>
	
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel = "stylesheet" type =" text/css" href = "css/customStyle.css">
	<link rel = "stylesheet" type =" text/css" href = "css/customStyle3.css">

	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	
	<script src = "js/jquery-3.1.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src = "js/app.js"></script>
    <style type="text/css">#container {
    padding: 50px 0 0px 0;
    margin: 0 auto;
    width: 100%;
    
}

#innerContainerDiv {
    border-radius: 5px;
    padding: 2px;
    width: 8.5%;
    
    float:center;
    margin-left:10%;
    margin-bottom: 10%;

    margin-right: 20%;
    box-shadow: -6px 0px 20px -2px #8c8b8b, 6px 0px 20px -2px #8c8b8b;
    transition: all .3s ease-in-out;
}

#innerContainerDiv:hover {
    transform: scale(1.1);
}

#innerContainerDiv img {
    width: 100%;
    border-radius: 5px;
}
#headerDiv {
    width: 100%;
    -moz-box-shadow: 0 4px 4px 0px #dadada;
    -webkit-box-shadow: 0 4px 4px 0px #dadada;
    box-shadow: 0 4px 4px 0px #dadada;
}

#innerHeader img {
    width: 100%;
    height: 50%;
}

#bannerSmall {
    max-width: 800px;
    text-align: center;
    margin: 0 auto;
}

#bannerSmall img{
    width: 50%;
}


</style>
    
</head>
<body>
	<div id = "main">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="sCHome.php"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $fullName; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        
		<header>
			<div id = "innerHeader">
				<img src = "img/banner.png">
			</div>
		</header>

<div class="container-fluid">
        <div class="row">
        
 <div class="col-3">
            
               
        
        <div id = "container">
            
            <div class="col-3">
            
               
		
		
			<a href = "#">	<!-- Personal -->
				<div id = "innerContainerDiv">
					<img src = "img/1.jpg">
				</div>
			</a>
            

        <div class="col-3">
        
                
			<a href = "#">	<!-- VIP -->
				<div id = "innerContainerDiv">
					<img src = "img/2.jpg">
				</div>
			</a>
            </div></div> </div>

        <!--<div class="row">-->
            <div class="col-3">
            
            <div id = "container">
			<a href = "sCAgri.php">	<!-- Agriculture -->
				<div id = "innerContainerDiv">
					<img src = "img/3.jpg">
				</div>
			</a>
            </div></div>
           <div class="col-3">
           
                 

			<a href = "#">	<!-- Sports -->
				<div id = "innerContainerDiv">
					<img src = "img/4.jpg">
				</div>
			</a>
            </div></div>
		</div>
	</div>

	<div id = "footerDiv">
		<p>&copy; 2016 Civil Security Department - Ministry of Defence. &nbsp;&nbsp; All Rights Reserved</p>
	</div>
	
</body>

</html>