<?php
	session_start();
    $userData = $_SESSION["userInfo"];

    $firstName = $userData[2];
    $lastName = $userData[3];
    $userLevel = $userData[5];
    $fullName = $firstName. " ". $lastName;
   
    $permissionToAccessLevel = $userLevel; 

    include_once("checkPermission.php");
    //include_once("showApplications.php");

    new CheckPermission($userLevel, $permissionToAccessLevel);
	
	include_once("newApplicantDetails.php");
	$newA = new newApplicantDetails();
?>

<!DOCTYPE HTML>

<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Additional Secretary | Dashboard</title>

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel = "stylesheet" type =" text/css" href = "css/customStyle3.css">

</head>

<body>

    <div id="">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="secretaryMain.php"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $fullName; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="page-wrapper">
        	<div id = "templateMainRow">
	            <div class="container">
	                <div class="panel panel-default">
                        <div class="panel-heading"><h3>Application Details</h3></div>
                        <div class="panel-body">
                            <div class="panel panel-success">
                                <div class="panel-heading"><span class="badge">1</span> Applicant Details</div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <!-- Applicant Details -->
                                            <tr>
												<th>Applicant Id</th>
                                                <th>Applicant's full name</td>
                                                <th>Address</th>
                                                <th>Telephone number</th>
                                                <th>Date of Birth</th>
                                                <th>Gender </th>
                                                <th>Civil Status</th>
                                                <th>Number of Children</th>
                                                <th>Applicant is a citizen of Sri Lanka?</th>
                                                <th>National Identity Card No</th>
                                                <th>NIC Date of issue</th>  
                                            </tr>
                                        </thead>
										<tbody>
											<?php $newA->applicantDetails(); ?>
										<tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="panel panel-success">
                                <div class="panel-heading"><span class="badge">2</span> Living</div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <!-- Living -->
                                            <tr>
												<th>Applicant ID</th>
                                                <th>District</th>  
                                                <th>Grama Niladhari Division</th>
                                                <th>Police Area</th>
                                            </tr>
                                        </thead>
										<tbody>
											<?php $newA->livingDetails(); ?>
										</tbody>
                                    </table>
                                </div>
                            </div>  

                            <div class="panel panel-success">
                                <div class="panel-heading"><span class="badge">3</span> Working</div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <!-- Working -->
                                            <tr>
												<th>Applicant ID </th>
                                                <th>Occupation</th>
                                                <th>Average annual income</th>
                                                <th>Applicant is a tax payer?</th>
                                                <th>Tax number</th>
                                            </tr>
                                        </thead>
										<tbody>
											<?php $newA->workingDetails(); ?>
										</tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="panel panel-danger">
                                <div class="panel-heading"><span class="badge">4</span> Charged or convicted for any offence by a Court of Law?&nbsp;<strong>Yes</strong></div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <!-- Offence -->
                                            <tr>
												<th>Applicant ID</th>
                                                <th>Year</th>
                                                <th>Court</th>
                                                <th>Offence</th>
                                                <th>Judgement</th>
                                            </tr>
                                        </thead>
										<tbody>
											<?php $newA->courtDetails(); ?>
										</tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="panel panel-success">
                                <div class="panel-heading"><span class="badge">5</span> Reason for requisition of a gun?&nbsp;<strong>Cultivation</strong></div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <!-- cultivation -->
                                            <tr>
												<th>Applicant ID</th>
                                                <th>Name of the land</th>
                                                <th>District</th>
                                                <th>Extent of the land in Acres</th>
												<th>Acreage of the cultivated land</th>
                                                <th>Crop</th>
                                                <th>Animals who cause the Damage</th>
                                                <th>Loss incurred during this year</th>
                                            </tr>
                                        </thead>
										<tbody>
											<?php $newA->cultivationDetails(); ?>
										</tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="panel panel-success">
                                <div class="panel-heading"><span class="badge">5</span> Reason for requisition of a gun?&nbsp;<strong>Livestock</strong></div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <!-- Requisition -->
                                            <tr>
												<th>Applicant ID </th>
                                                <th>Name of the farm</th>
                                                <th>District, Divisional Secretary Area, and Grama Sevaka Area where the land is situated</td>
                                                <th>Type of Livestock</th>
                                                <th>Gross value of the Farm</th>
                                                <th>Loss incurred during this year by animals</th>
                                            </tr>
                                        </thead>
										<tbody>
											<?php $newA->livestockdetails(); ?>
										</tbody>
                                    </table>
                                </div>
                            </div>       
    					  	
                                    
                            <div class="panel panel-success">
                                <div class="panel-heading"><span class="badge">6</span> Whether Guns are transferred or stolen by somebody?&nbsp;<strong>No</strong></div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <!-- Stolen Transferred-->
                                            <tr>
												<th>Applicant ID </th>
                                                <th>Stolen or Transferred date</th>
                                                <th>Particulars of the gun</th>
                                                <th>Licence No</th>
                                                <th>To whom it was handed over or transferred</th>
                                                <th>Details of the receipts. if any</th>
                                                <th>Particulars of the guns transferred or stolen by somebody</th>
                                                <th>Whether a proper entry was made if the Gun was stolen</th>
                                            </tr>
                                        </thead>
										<tbody>
											<?php $newA->transferStolenGunDetails(); ?>
										</tbody>
                                    </table>
                                </div>
                            </div>        
                                    
                            <div class="panel panel-warning">
                                <div class="panel-heading"><span class="badge">7</span> Whether Guns are already in Possession?&nbsp;<strong>Yes</strong></div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <!-- Guns in possession -->
                                            <tr>
												<th>Applicant ID</th>
                                                <th>Date of acquisition</th>
                                                <th>Type & number of the Gun</th>
                                                <th>Licence no</th>
                                            </tr>
                                        </thead>
										<tbody>
											<?php $newA->acquisitionDetails(); ?>
										</tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="panel panel-success">
                                <div class="panel-heading"><span class="badge">8</span> Applicant possesses a weapon issued for official duties?&nbsp;<strong>No</strong></div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <!-- Official Weapon -->
                                            <tr>
												<th>Applicant ID</th>
                                                <th>Type & Number of the Gun</th>
                                                <th>Licence no</th>
											</tr>
                                        </thead>
										<tbody>
											<?php $newA->officialDutiesDetails(); ?>
										</tbody>
                                    </table>
                                </div>
                            </div>  

                            <div class="panel panel-warning">
                                <div class="panel-heading"><span class="badge">9</span> Authentications?&nbsp;<strong>Not completed</strong></div>
								<div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <!-- Authentication -->
                                            <tr>
												<th>Applicant ID</th>
												<th>Authentication Completed</th>
                                                <th>Grama Niladhari Certificate</th>
												<th>Police Certificate</th>
                                                <th>Divisional Secretary Certificate</th>
												<th>District Secretary Certificate</th>
												<th>Ministry of Defence Additional Secretary Certificate</th>
												<th>Ministry of Defence  Secretary Certificate</th>
											</tr>
                                        </thead>
										<tbody>
											<?php $newA->authenticationDetails(); ?>
										</tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#confirmApprovalModal" id = "aprRejBtns">
                                        <i class="fa fa-fw fa-check" aria-hidden="true"></i>Approve
                                    </button>
                                    <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#confirmRejectModal" id = "aprRejBtns">
                                        <i class="fa fa-fw fa-trash" aria-hidden="true"></i>Reject
                                    </button>
                                </div>
                            </div>
                        </div>
					</div>

	            </div>
	            <!-- /.container-fluid -->
	        </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Approval Modal -->
    <div class="modal fade" id="confirmApprovalModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirm Approval</h4>
                </div>
                <div class="modal-body">
                    <input type = "password" name = "" class="form-control" placeholder = "Password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default">Approve</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Rejection Modal -->
    <div class="modal fade" id="confirmRejectModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirm Rejection</h4>
                </div>
                <div class="modal-body">
                    <input type = "password" name = "" class="form-control" placeholder = "Password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default">Reject</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
