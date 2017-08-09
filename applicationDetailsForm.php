<?php
	session_start();
    $userData = $_SESSION["userInfo"];

    $firstName = $userData[2];
    $lastName = $userData[3];
    $userLevel = $userData[5];
    $fullName = $firstName. " ". $lastName;
   
    $permissionToAccessLevel = $userLevel; 

    include_once("checkPermission.php");
    include_once("showApplications.php");

    new CheckPermission($userLevel, $permissionToAccessLevel);
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                                        <tbody>
                                            <!-- Applicant Details -->
                                            <tr>
                                                <td>Applicant's full name</td>
                                                <td><?php echo "A. W. Wickramarathne"; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td><?php echo "150/B, Kusum Niwasa, 6th Lane, Nawala, Nugegoda, Sri Lanka"; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Telephone number</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Date of Birth</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Gender </td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Civil Status</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Number of Children</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Applicant is a citizen of Sri Lanka?</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>National Identity Card No</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>NIC Date of issue</td>
                                                <td><?php ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="panel panel-success">
                                <div class="panel-heading"><span class="badge">2</span> Living</div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <!-- Living -->
                                            <tr>
                                                <td>District</td>
                                                <td>Colombo</td>
                                            </tr>
                                            <tr>
                                                <td>Grama Niladhari Division</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Police Area</td>
                                                <td><?php ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>  

                            <div class="panel panel-success">
                                <div class="panel-heading"><span class="badge">3</span> Working</div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <!-- Working -->
                                            <tr>
                                                <td>Occupation</td>
                                                <td>Teaching</td>
                                            </tr> 
                                            <tr>
                                                <td>Average annual income</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Applicant is a tax payer?</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tax number</td>
                                                <td><?php ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="panel panel-danger">
                                <div class="panel-heading"><span class="badge">4</span> Charged or convicted for any offence by a Court of Law?&nbsp;<strong>Yes</strong></div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <!-- Offence -->
                                            <tr>
                                                <th>Year</th>
                                                <th>Court</th>
                                                <th>Offence</th>
                                                <th>Judgement</th>
                                            </tr>
                                            <tr>
                                                <td>2001</td>
                                                <td>Magistrate</td>
                                                <td>Assault</td>
                                                <td>6 months</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="panel panel-success">
                                <div class="panel-heading"><span class="badge">5</span> Reason for requisition of a gun?&nbsp;<strong>Cultivation</strong></div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <!-- Reason -->
                                            <tr>
                                                <td>Name of the land</td>
                                                <td>Millagahawatte</td>
                                            </tr>
                                            <tr>
                                                <td>District</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Extent of the land in Acres</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Crop</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Acreage of the cultivated land</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Animals who cause the Damage</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Loss incurred during this year</td>
                                                <td><?php ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="panel panel-success">
                                <div class="panel-heading"><span class="badge">5</span> Reason for requisition of a gun?&nbsp;<strong>Livestock</strong></div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <!-- Reason -->
                                            <tr>
                                                <td>Name of the farm</td>
                                                <td>Hatton Milk Farm</td>
                                            </tr>
                                            <tr>
                                                <td>District, Divisional Secretary Area, and Grama Sevaka Area where the land is situated</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Type of Livestock</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Gross value of the Farm</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Loss incurred during this year by animals</td>
                                                <td><?php ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>       
    					  	
                                    
                            <div class="panel panel-success">
                                <div class="panel-heading"><span class="badge">6</span> Whether Guns are transferred or stolen by somebody?&nbsp;<strong>No</strong></div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <!-- Stolen Transferred-->
                                            <tr>
                                                <td>Stolen or Transferred date</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Particulars of the gun</td>
                                                <td>32 Calliber</td>
                                            </tr>
                                            <tr>
                                                <td>Licence No</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>To whom it was handed over or transferred</td>
                                                <td>A. B. Ranjith Perera</td>
                                            </tr>
                                            <tr>
                                                <td>Details of the receipts. if any</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Particulars of the guns transferred or stolen by somebody</td>
                                                <td><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Whether a proper entry was made if the Gun was stolen</td>
                                                <td><?php ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>        
                                    
                            <div class="panel panel-warning">
                                <div class="panel-heading"><span class="badge">7</span> Whether Guns are already in Possession?&nbsp;<strong>Yes</strong></div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <!-- Guns in possession -->
                                            <tr>
                                                <th>Date of acquisition</th>
                                                <th>Type & number of the Gun</th>
                                                <th>Licence no</th>
                                            </tr>
                                            <tr>
                                                <td>2000-05-10</td>
                                                <td>32 Calliber</td>
                                                <td>124534Z</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="panel panel-success">
                                <div class="panel-heading"><span class="badge">8</span> Applicant possesses a weapon issued for official duties?&nbsp;<strong>No</strong></div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <!-- Official Weapon -->
                                            <tr>
                                                <td>Type & Number of the Gun</td>
                                                <td>32 Calliber</td>
                                            </tr>
                                            <tr>
                                                <td>Licence no</td>
                                                <td><?php ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>  

                            <div class="panel panel-warning">
                                <div class="panel-heading"><span class="badge">9</span> Authentications?&nbsp;<strong>Not completed</strong></div>
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
