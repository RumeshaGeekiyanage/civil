<?php include_once("getPara.php"); ?>

<!DOCTYPE HTML>

<html>
<head>
    <title>Permit to Purchase</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/customStyle.css" type="text/css">
    <link rel="stylesheet" href="css/customStyle2.css" type="text/css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css" type="text/css">


    <script src="js/jquery-3.1.0.min.js"></script>
    <script src = "js/custom.js"></script>
    <script src = "js/app.js"></script>

</head>

<body onload = "autoFillPermit('<?php new GetParameters(); ?>', event);">
    <!--
    <div align="center">
    <table width="600" border="0"><tr><td> <img src="Images/logo.jpg"></td></tr></table>
    <table width="600" border="0"><tr><td> <img  src="Images/logo2.jpg"></td></tr></table>
    </div>

    -->
    
    <div id = "navBar">
        <div id = "backBtn">
            <a href = "sCAgri.php"><i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i></a>
            <h2>AGRICULTURE</h2>
        </div>
        <div id = "searchs">
            <input type = "text" name = "id_number" placeholder = "Search by ID">
            <input type = "text" name = "weapon_number" placeholder = "Search by Weapon">
            <button type = "button" onclick = ""><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
    </div>

    <div class="form-style-10">
    <h1> Permit to Purchase a Firearm <span> </span></h1>

    <form>

        <!-- Section 1 Applicant Details -->
        <div class="section"><span>1</span>Applicant Details</div>
        <div class="inner-wrap">
            <label>Applicant's full name <input type="text" name="applicantName" id = "aName" disabled/></label>
            <label>Date of Birth <input type="date" name="dOB"  min = "1998-10-10" id = "aDOB" disabled/></label>
            <label>National Identity Card No <input type="text" name="NIC" maxlength = "12" id = "aNIC" disabled/></label>
            <label>Address <textarea name="postalAddress" id = "aAddress" disabled></textarea></label>
            <label>Relevant District <input type="text" name="district" id = "aDistrict" disabled/></label>
            <label>Divisional Secretary Division <input type="text" name="dSDivision" id = "aDSD"/></label>
            <label>Profession or Occupation <input type="text" name="occupation" id = "aOccupation" disabled/></label>
            <label>Description of the Firearm <input type="text" name="firearmDesc" id = "aGunDetails"/></label>
            <label>Purpose for which the firearm is required <input type="text" name="firearmPur" id = "aPurpose"/></label>
            <label>Number of the firearms already in possession (with the type & No.) 
                <br/>
                <table id = "permitGunsPossTable">
                    <tr><th>Date</th>
                        <th>Type & No</th>
                        <th>Licence No</th>
                    </tr>
                </table>
                <br/>
            </label>
        </div>


        <!-- Section 2 Living -->
        <div class="section"><span>2</span>Dealer Details</div>
        <div class="inner-wrap">
            <label>Dealer's name <input type="text" name="dealerName" id = "dName"></label>
            <label>Date of Sale <input type="date" name="dateOfSale" id = "dDateOfSales"></label>
        </div>
       
        
        <div class="button-section">
            <input type="button" name="Save" value="Save Details"/>
        </div>
    </form>
    </div>

</body>
</html>
