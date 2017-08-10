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



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src = "js/jquery-3.1.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src = "js/app.js"></script>
  <link rel="stylesheet" type="text/css" href="css/welcomepage.css">

  <style type="text/css">
     
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      
      <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $fullName; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
      </ul></ul>
    </div>
  </div>
</nav>

<div class="jumbotron">
  <div class="container text-center">
    <h2>ARMS & EXPLOSIVE MANAGEMENT SYSTEM</h2>      
   
  </div>
</div>
  
<div class="container-fluid bg-3 text-center">    
  
  <div class="row">
    <div class="col-sm-6">

      
      <div class="intro-left">
                    <a  href="sold.php" class="sold" style="text-decoration: none;">
                    
                    <br>
                        <span ><h4 style="color:white;">PERSONEL</h4></span>
                        
                    </a>
                 </div>
    </div>
    <div class="col-sm-6"> 
      
      <div class="intro-left">
                    <a  href="sold.php" class="sold" style="text-decoration: none;">
                    <br>
                    
                        <span><h4 style="color:white;">VIP<h4></span>
                        
                    </a>
                 </div>
    </div>
    
</div><br>

<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-6">
      
     <div class="intro-left">

                    <a  href="sCAgri.php" class="sold" style="text-decoration: none; ">
                    
                    <br>
                        <span><h4 style="color:white;">AGRICULTURE<h4></span>
                        
                    </a>
                 </div>
    </div>
    <div class="col-sm-6"> 
      
      <div class="intro-left">
                    <a  href="sold.php" class="sold" style="text-decoration: none;">
                    
                    <br>
                        <span><h4 style="color:white;">SPORTS</h4></span>
                        
                    </a>
                 </div>
    </div>
    
  </div>
</div><br><br>

<footer class="container-fluid text-center">
  <p>&copy; 2016 Civil Security Department - Ministry of Defence. &nbsp;&nbsp; All Rights Reserved</p>
</footer>

</body>
</html>
