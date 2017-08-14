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
	
	//include_once("dbOperations.php");
	//$DBObject = new DBOperations();
	
	function includeDB() {
		include_once("dbOperations.php");
		$DBObject = new DBOperations();

		$this->DBOb = $DBObject;
		
	}

	
	//include_once("insertAgriculture.php");
	//$agri = new InsertAgriFormData();
   
?>

<!DOCTYPE HTML>

<html>
<head>
    <title>Agriculture</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/customStyle.css" type="text/css">
    <link rel="stylesheet" href="css/customStyle2.css" type="text/css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css" type="text/css">

    <script src = "js/jquery-3.1.0.min.js"></script>
    <script src = "js/app.js"></script>
    <script src = "js/custom.js"></script>
    <script >
        
    /*$(document).ready(function() {

        $("#marryDiv").hide();
        $("#single").click(function(){ 
            $("#marryDiv").hide();
        });
        $("#married").click(function(){ 
            $("#marryDiv").show();
        });

    });*/

    </script>

</head>

<body>

    <!-- Header and Search bar -->
    <div id = "navBar">
        <div id = "backBtn">
            <a href = "sCAgri.php"><i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i></a>
            <h2>AGRICULTURE</h2>
        </div>
        <div id = "searchs">
            <input type = "text" name = "id_number" placeholder = "Search by ID">
            <input type = "text" name = "weapon_number" placeholder = "Search by Weapon">
            <button type = "submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
    </div>

    <!-- Agriculture Form -->
    <div class="form-style-10">
    <h1> Details of the Applicant <span> </span></h1>

    <form action="insertAgriculture.php" method="POST">
        <!-- Section 1 Applicant Details -->
        <div class="section"><span>1</span>Applicant Details</div>
        <div class="inner-wrap">
            <label>Applicant's full name <input type="text" name="1name" /></label>
            <label>Address <textarea name="1address"  ></textarea></label>
            <label>Telephone number <input type = "text" name = "1telephoneNo"></label>
            <label>Date of Birth <input type="date" name="1dob" /></label>
    		<label>Gender
            <input type="radio" name="1gender" id = "1genderM" value="1"  checked> Male
            <input type="radio" name="1gender" id = "1genderF" value="0"  > Female<br></label>
     		<br/>
            <label> <h3> Civil Status</h3><br/>
                <input type="radio" name="1civilStatus" value="1" id="married"> Married
                <input type="radio" name="1civilStatus" value="0" id="single" checked> Single
            </label><br/>
            <div id="marryDiv">
            <label>Number of Children<input type="text" name="1numchildren" placeholder="Number of Children" ></label>
            </div>
            <br/>
            <label> <h3> Whether the applicant is a citizen of Sri Lanka ?</h3><br>
                <input type="radio" name="1citizen" value="1" id = "citizenY"> Yes
                <input type="radio" name="1citizen" value="0" id = "citizenN" checked> No
            </label><br/>
            <div id = "nicDiv">
                <label>National Identity Card No <input type="text" name="1nic" /></label>
                <label>NIC Date of issue<input type="date" name="1nicIssueDate"/></label>
            </div>
        </div>


        <!-- Section 2 Living -->
        <div class="section"><span>2</span>Living</div>
        <div class="inner-wrap">
            <label>District <input type="text" name="2district" /></label>
            <label>Grama Niladhari Division <input type="text" name="2gSDivision" /></label>
            <label>Police Area <input type="text" name="2policeArea"  /></label>
        </div>


        <!-- Section 3 Working -->
        <div class="section"><span>3</span>Working</div>
        <div class="inner-wrap">
            <label>Occupation <input type="text" name="3occupation"  /></label>
            <label>Average annual income <input type="text" name="3avgIncome"   /></label>
            <label><h3>Is applicant a tax payer?</h3><br>
            <input type="radio" name="3taxPay" value="1" id="show_tax">Yes
            <input type="radio" name="3taxPay" value="0" id="hide_tax" checked>No<br></label>
            <div id="tax"><br>
                <input type="text"  name="3taxNumber" id="" placeholder = "Tax number">
            </div>
        </div>


        <!-- Section 4 Offense Details -->
        <div class="section"><span>4</span>Has applicant been charged or convicted for any offense by a Court of Law?</div>
        <div class="inner-wrap">
            <label>
                <input type="radio" name="4chargedOffence" id="offenceY" value="1">Yes
                <input type="radio" name="4chargedOffence" id="offenceN" value="0" checked> No 
            </label>
            <div id = "offenceDetailsDiv">
                <label>Year <input type="text" name="4offenceYear" id = "s4year"/></label>
                <label>Name of the Court <input type="text" name="4court" id = "s4Court"/></label>
                <label>Offense <input type="text" name="4offence" id = "s4Offence"/></label>
                <label>Judgment <input type="text" name="4judgement" id = "s4judgement"/></label>
                <button type = "button" onclick = "insertOffenceData()"><i class="fa fa-plus-square" aria-hidden="true"></i></button>
                <br/>
                <table id = "offenceTable">
                    <tr><th>Year</th>
                        <th>Court</th>
                        <th>Offense</th>
                        <th>Judgment</th>
                        <th></th></tr>
                </table>
            </div>
        </div>


        <!-- Section 5 Reason for requisition of a gun -->
        <div class="section"><span>5</span> The reason for requisition of a gun </div>
        <div class="inner-wrap">
            <!-- Cultivation -->
            <label><h3>If it is for protection of any cultivation</h3><br/>
        	    <input type="radio" name="5cultivation" id="cultivationY" value="1">Yes
                <input type="radio" name="5cultivation" id="cultivationN" value="0" checked>No
        	</label> <br/>
            <div id="cultivationDiv">
                <label>Name of the Land <input type="text" name="5landName" /></label>
                <label>District in which the land is situated
                    <input type="text" name="5district"/></label>
                <label>Extent of the land in Acres <input type="text" name="5acres"/></label>
                <label>Type of the crop <input type="text" name="5crop"/></label>
                <label>Acreage of the cultivated land <input type="text" name="5cultivatedAcres"/></label>
                <label>Animals who cause the Damage <input type="text" name="5animal" /></label>
                <label>Loss incurred during this year (Amount) <input type="text" name="5cultivationLoss" /></label>
            </div>
            <br/>

            <!-- LiveStock -->
            <label><h3>If it is for Livestock Rearing</h3><br/>
                <input type="radio" name="5livestock" id="livestockY" value="1">Yes
                <input type="radio" name="5livestock" id="livestockN" value="0" checked>No
            </label> <br/>
            <div id="livestockDiv">
                <label>Name of the Farm <input type="text" name="5farmName" /></label>
                <label>District, Divisional Secretary Area, and Grama Sevaka Area where the land is situated
                    <input type="text" name="5dDsGsArea"/></label>
                <label>Type of Livestock <input type="text" name="5livestocktype"/></label>
                <label>Gross value of the Farm <input type="text" name="5farmValue"/></label>
                <label>Loss incurred during this year by wild animals (Amount) <input type="text" name="5livestockLoss" /></label>
            </div>
            <br/>

        </div>


        <!-- Section 6 Particulars of the guns hand over to the crown, stolen-->
        <div class="section"><span>6</span> Particulars of the guns which were in your/ your organization's possession or transferred or stolen by somebody  </div>
        <div class="inner-wrap">
            <label><h3>If any gun was stolen or transferred from your possession</h3><br/>
                <input type="radio" name="6stolentransf" id="stolenTransY" value="1"> Yes
                <input type="radio" name="6stolentransf" id="stolenTransN" value="0" checked> No
            </label> <br/>
            <div id = "stolenTransDiv">
                <label>The date on which the gun was handed over or transferred or stolen
                <input type="date" name="6date" /></label>
                <label>Particulars of the gun <input type="text" name="6gunType"  /></label>
                <label>License No <input type="text" name="6licence" /></label>
                <label>To whom it was handed over or transferred <input type="text" name="6toWhomTransf" /></label>
                <label>Details of the receipts. if any <input type="text" name="6receipts" /></label>
                <label>Whether a proper entry was made if the Gun was stolen<br/><br/>
                    <input type="radio" name="6properEntry" id="stolenPropEntryY" value="1"> Yes
                    <input type="radio" name="6properEntry" id="stolenPropEntryN" value="0" checked> No
                </label> <br/>
            </div>
            <br/>
        </div>


        <!-- Section 7 Particulars of guns already in possession-->
        <div class="section"><span>7</span> Particulars of the Guns which are possessed by you/ your family/ your organization at present </div>
        <div class="inner-wrap">
            <label><h3>Whether guns are in possession</h3><br/>
                <input type="radio" name="7gunPossess" id="gunsY" value="1"> Yes
                <input type="radio" name="7gunPossess" id="gunsN" value="0" checked> No
            </label> <br/>
            <div id="gunsPossDiv">
                <label>Date of acquisition <input type="date" name="7acqDate" id = "s7acqDate"/></label>
                <label>Type & number of the Gun<input type="text" name="7gunType" id = "s7gunType"/></label>
                <label>License no <input type="text" name="7licence" id = "s7licence"/></label>
                <button type = "button" onclick = "insertGunsData()"><i class="fa fa-plus-square" aria-hidden="true"></i></button>
                <br/>
                <table id = "gunsPossTable">
                    <tr><th>Date</th>
                        <th>Type & No</th>
                        <th>License No</th>
                        <th></th></tr>
                </table>
            </div>
            <br/>
        </div>



        <!-- Section 8 Service Weapon -->
        <div class="section"><span>8</span> Whether the applicant possesses a weapon issued for official duties?  </div>
        <div class="inner-wrap">
        	<label>
                <input type="radio" name="8serviceWeapon" id="serviceWeaponY" value="1">Yes
                <input type="radio" name="8serviceWeapon" id="serviceWeaponN" value="0" checked>No 
            </label>
            <div id="serviceWeaponDiv">   
                <label>Type & Number of the Gun <input type="text" name="8gunType" /></label>
                <label>License no <input type="text" name="8licence"/></label>
                <br/>
            </div>
        </div>


        <!-- Section 9 Authentications -->
        <div class="section"><span>9</span>Authentications</div>
        <div class="inner-wrap">
            <div id="authenticationsDiv">   
                <input type="checkbox" name="s9authGS" id = "s9authGS" value="1">Grama Niladhari/ Agricultural Officer<br/>
                <input type="checkbox" name="s9authSP" id = "s9authSP" value="1">Superintendent of Police of the Area concerned<br/>
                <input type="checkbox" name="s9authDS" id = "s9authDS" value="1">Divisional Secretary<br/>
                <input type="checkbox" name="s9authGA" id = "s9authGA" value="1">District Secretary/ Government Agent<br/>
                <input type="checkbox" name="s9authAS" id = "s9authAS" value="1">Additional Secretary of Ministry of Public Security Law and Order<br/>
                <input type="checkbox" name="s9authSe" id = "s9authSe" value="1">Secretary of Ministry of Public Security Law and Order<br/>
                <br/>
            </div>
        </div>      
        
        <div class="button-section">
            <input type="button" name="submit" value="Save Details" onclick = "insertData()"/>
        </div>
    </form>
    </div>

</body>
</html>
