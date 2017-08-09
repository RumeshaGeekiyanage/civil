<?php
class ApplicationDetails {
	public $DBOb;
	public $apID;

	function includeDB() {
		include_once("dbOperations.php");
		$DBObject = new DBOperations();

		$this->DBOb = $DBObject;
	}



	function getData() {
		if(isset($_POST['apID'])) {
			$apID = $_POST['apID'];
			$this->apID = $apID;
		}
	}



	function applicantDetails() {
		$DBOb = $this->DBOb;
		$apID = $this->apID;

		/* ****** Application Details ****** */
		$table = "application";
		$fields = ["a_id", "category", "authentications", "submission_date"];
		$condition = "app_id = '$apID'";

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$aID = $row[0];
				$category = $row[1];
				$authentications = $row[2];
				$subDate = $row[3];
			}

			$applicationArray = ['aID'=>$aID, 'category'=>$category, 'authentications'=>$authentications, 'subDate'=>$subDate];
			$list['application'] = $applicationArray;


			/* ****** Applicant, Living and Working Details ****** */
			$table2 = "applicant";
			$fields2 = ["full_name", "address", "telephone", "dob", "gender", "civil_status", "no_of_children", "citizenship", "nic", "nic_issue_date", "district", "grama_n", "police_area", "occupation", "avg_income", "tax_payer", "tax_no", "offence", "stolen_trans", "guns_in_poss", "official_weapon"];
			$condition2 = "a_id = '$aID'";

			$selectedData2 = $DBOb->select($table2, $fields2, $condition2);

			if(!empty($selectedData2)) {
				foreach ($selectedData2 as $row2) {
					$fullName = $row2[0];
					$address = $row2[1];
					$telephone = $row2[2];
					$dob = $row2[3];
					$gender = $row2[4];
					$civilStatus = $row2[5];
					$noOfChildren = $row2[6];
					$citizenship = $row2[7];
					$nic = $row2[8];
					$nicIssueDate = $row2[9];
					$district = $row2[10];
					$gSDevision = $row2[11];
					$policeArea = $row2[12];
					$occupation = $row2[13];
					$avgIncome = $row2[14];
					$taxPayer = $row2[15];
					$taxNo = $row2[16];
					$offence = $row2[17];
					$stolenTrans = $row2[18];
					$gunsInPoss = $row2[19];
					$officialWeapon = $row2[20];
				}

				$applicantArray = ['fullName'=>$fullName, 'address'=>$address, 'telephone'=>$telephone, 'dob'=>$dob, 'gender'=>$gender, 'civilStatus'=>$civilStatus, 'noOfChildren'=>$noOfChildren, 'citizenship'=>$citizenship, 'nic'=>$nic, 'nicIssueDate'=>$nicIssueDate, 'district'=>$district, 'gSDevision'=>$gSDevision, 'policeArea'=>$policeArea, 'occupation'=>$occupation, 'avgIncome'=>$avgIncome, 'taxPayer'=>$taxPayer, 'taxNo'=>$taxNo, 'offence'=>$offence, 'stolenTrans'=>$stolenTrans, 'gunsInPoss'=>$gunsInPoss, 'officialWeapon'=>$officialWeapon];
				$list['applicant'] = $applicantArray;

				echo 'iv class="panel panel-success">
                                <div class="panel-heading"><span class="badge">1</span> Applicant Details</div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <!-- Applicant Details -->
                                            <tr>
                                                <td>Applicant\'s full name</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Telephone number</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Date of Birth</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Gender </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Civil Status</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Number of Children</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Applicant is a citizen of Sri Lanka?</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>National Identity Card No</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>NIC Date of issue</td>
                                                <td></td>
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
                            </div>';


				/* ****** Offence Details ****** */
				if($offence == 1) {
					$table3 = "offence";
					$fields3 = ["o_id", "year", "court_name", "offence", "judgement"];

					$selectedData3 = $DBOb->select($table3, $fields3, $condition2);

					echo '<div class="panel panel-danger">
                                <div class="panel-heading"><span class="badge">4</span> Charged or convicted for any offence by a Court of Law?&nbsp;<strong>Yes</strong></div>';

					if(!empty($selectedData3)) {
						echo '<div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <!-- Offence -->
                                            <tr>
                                                <th>Year</th>
                                                <th>Court</th>
                                                <th>Offence</th>
                                                <th>Judgement</th>
                                            </tr>';

						foreach ($selectedData3 as $row3) {
							$offenceID = $row3[0];
							$offenceYear = $row3[1];
							$courtName = $row3[2];
							$offence = $row3[3];
							$judgement = $row3[4];

							$offenceArray[] = ['offenceID'=>$offenceID, 'offenceYear'=>$offenceYear, 'courtName'=>$courtName, 'offence'=>$offence, 'judgement'=>$judgement];

							echo '<tr>
                                    <td>2001</td>
                                    <td>Magistrate</td>
                                    <td>Assault</td>
                                    <td>6 months</td>
                                </tr>';
						}

						$list['offence'] = $offenceArray;

						echo '</tbody>
                                    </table>
                                </div>';
					}

					echo '</div>';
				}


				/* ****** Stolen or Transferred Guns Details ****** */
				if($stolenTrans == 1) {
					$table4 = "stolen_transferred";
					$fields4 = ["t_id", "transfer_date", "gun_parti", "licence_no", "transf_to", "receipts", "entry_made"];

					$selectedData4 = $DBOb->select($table4, $fields4, $condition2);

					echo '<div class="panel panel-success">
                                <div class="panel-heading"><span class="badge">6</span> Whether Guns are transferred or stolen by somebody?&nbsp;<strong>No</strong></div>';

					if(!empty($selectedData4)) {
						foreach ($selectedData4 as $row4) {
							$tID = $row4[0];
							$transferDate = $row4[1];
							$gunParti = $row4[2];
							$stolenlicenceNo = $row4[3];
							$transfTo = $row4[4];
							$receipts = $row4[5];
							$entryMade = $row4[6];
						}

						$stolenTransArray = ['tID'=>$tID, 'transferDate'=>$transferDate, 'gunParti'=>$gunParti, 'stolenlicenceNo'=>$stolenlicenceNo, 'transfTo'=>$transfTo, 'receipts'=>$receipts, 'entryMade'=>$entryMade];
						$list['stolenTransf'] = $stolenTransArray;

						echo '<div class="panel-body">
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
                                </div>';
					}

					echo '</div>';
				}


				/* ****** Guns in Possession Details ****** */
				if($gunsInPoss == 1) {
					$table5 = "guns_posse";
					$fields5 = ["p_id", "acq_date", "type_nbr", "licence_no"];

					$selectedData5 = $DBOb->select($table5, $fields5, $condition2);

					echo '<div class="panel panel-warning">
                                <div class="panel-heading"><span class="badge">7</span> Whether Guns are already in Possession?&nbsp;<strong>Yes</strong></div>';

					if(!empty($selectedData5)) {
						echo '<div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <!-- Guns in possession -->
                                            <tr>
                                                <th>Date of acquisition</th>
                                                <th>Type & number of the Gun</th>
                                                <th>Licence no</th>
                                            </tr>';

						foreach ($selectedData5 as $row5) {
							$pID = $row5[0];
							$acqDate = $row5[1];
							$typeNo = $row5[2];
							$gunsPossLicenceNo = $row5[3];

							$gunsPossArray[] = ['pID'=>$pID, 'acqDate'=>$acqDate, 'typeNo'=>$typeNo, 'gunsPossLicenceNo'=>$gunsPossLicenceNo];

							echo '<tr>
                                    <td>2000-05-10</td>
                                    <td>32 Calliber</td>
                                    <td>124534Z</td>
                                </tr>';
						}

						$list['gunsPoss'] = $gunsPossArray;
						echo '</tbody>
                                    </table>
                                </div>';
					}

					echo '</div>';
				}


				/* ****** Official Weapon Details ****** */
				if($gunsInPoss == 1) {
					$table6 = "official_weapon";
					$fields6 = ["ow_id", "type_nbr", "licence_no"];

					$selectedData6 = $DBOb->select($table6, $fields6, $condition2);

					if(!empty($selectedData6)) {
						foreach ($selectedData6 as $row6) {
							$owID = $row6[0];
							$typeNo = $row6[1];
							$licenceNo = $row6[2];
						}

						$offWeaponArray = ['owID'=>$owID, 'typeNo'=>$typeNo, 'licenceNo'=>$licenceNo];
						$list['offWeapon'] = $offWeaponArray;

						echo '<div class="panel panel-success">
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
                            </div>';
					}
				}
			}


			/* ****** Category Details ****** */
			if($category == 1) {
				/* ** Agriculture ** */
				$table7 = "cutivation";
				$fields7 = ["c_id", "land_name", "district", "acres", "crop", "acres_culti_land", "animals", "loss"];

				$selectedData7 = $DBOb->select($table7, $fields7, $condition2);

				if(!empty($selectedData7)) {
					foreach ($selectedData7 as $row7) {
						$cID = $row7[0];
						$landName = $row7[1];
						$cultivationDistrict = $row7[2];
						$acres = $row7[3];
						$crop = $row7[4];
						$acresCultiLand = $row7[5];
						$animals = $row7[6];
						$cutltiLoss = $row7[7];
					}

					$cultivationArray = ['cID'=>$cID, 'landName'=>$landName, 'cultivationDistrict'=>$cultivationDistrict, 'acres'=>$acres, 'crop'=>$crop, 'acresCultiLand'=>$acresCultiLand, 'animals'=>$animals, 'cutltiLoss'=>$cutltiLoss];
					$list['cultivation'] = $cultivationArray;
				}

			} elseif($category == 2) {
				/* ** Livestock ** */
				$table8 = "livestock";
				$fields8 = ["l_id", "farm_name", "district_ds_gs", "livestock_type", "farm_value", "loss"];

				$selectedData8 = $DBOb->select($table8, $fields8, $condition2);

				if(!empty($selectedData8)) {
					foreach ($selectedData8 as $row8) {
						$lID = $row8[0];
						$farmName = $row8[1];
						$districtDSGS = $row8[2];
						$livestockType = $row8[3];
						$farmValue = $row8[4];
						$livestockLoss = $row8[5];
					}

					$livestockArray = ['lID'=>$lID, 'farmName'=>$farmName, 'districtDSGS'=>$districtDSGS, 'livestockType'=>$livestockType, 'farmValue'=>$farmValue, 'livestockLoss'=>$livestockLoss];
					$list['livestock'] = $livestockArray;
				}
			}

		}

		if(!empty($list)) {
			$encodedList = json_encode($list);
			echo $encodedList;
		}
		
	}



	function __construct() {
		$this->includeDB();
		$this->getData();
		$this->applicantDetails();
	}
}

new ApplicationDetails();

?>



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
                <a class="navbar-brand" href="#"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a>
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