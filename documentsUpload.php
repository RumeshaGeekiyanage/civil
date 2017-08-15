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
    <title> Documents Upload </title>
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
</head>

<body>

    <!-- Header and Search bar -->
    <div id = "navBar">
        <div id = "backBtn">
            <a href = "sCAgri.php"><i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i></a>
            <h2>AGRICULTURE</h2>
        </div>
    </div>

    <!-- Agriculture Form -->
    <div class="form-style-10">
    <h1> Documents Upload </h1>

    <form action  = "" method = "POST">
        <!-- Section 1 Documents -->
        <div class="inner-wrap">
            <div id="documentDiv">
                <table id = "documentTable">
                    <tr>
                        <td>Original Application</td>
                        <td>
                            <button type = "button" id = "dUOriAppBtn"><i class="fa fa-paperclip fa-lg"></i></button><span class="name" id = "dUOriAppSpan">No file selected</span>
                            <input type="file" name="" id="dUOriApp">
							
                        </td>
                    </tr>
                    <tr>
                        <td>Certified copy of NIC</td>
                        <td>
                            <button type = "button" id = "dUNICBtn"><i class="fa fa-paperclip fa-lg"></i></button><span class="name" id = "dUNICSpan">No file selected</span>
                            <input type="file" name="" id="dUNIC">
                        </td>
                    </tr>
                    <tr>
                        <td>Original of the Revenue License issued by DS</td>
                        <td>
                            <button type = "button" id = "dURevLicBtn"><i class="fa fa-paperclip fa-lg"></i></button><span class="name" id = "dURevLicSpan">No file selected</span>
                            <input type="file" name="" id="dURevLic">
                        </td>
                    </tr>
                    <tr>
                        <td>Assistant Commissioner's Report</td>
                        <td>
                            <button type = "button" id = "dUAsComRepBtn"><i class="fa fa-paperclip fa-lg"></i></button><span class="name" id = "dUAsComRepSpan">No file selected</span>
                            <input type="file" name="" id="dUAsComRep">
                        </td>
                    </tr>
                    <tr>
                        <td>Veterinary Surgeon's Report</td>
                        <td>
                            <button type = "button" id = "dUVetSurRepBtn"><i class="fa fa-paperclip fa-lg"></i></button><span class="name" id = "dUVetSurRepSpan">No file selected</span>
                            <input type="file" name="" id="dUVetSurRep">
                        </td>
                    </tr>
                    <tr>
                        <td>Certified copies of land deeds</td>
                        <td>
                            <button type = "button" id = "dULandDeedBtn"><i class="fa fa-paperclip fa-lg"></i></button><span class="name" id = "dULandDeedSpan">No file selected</span>
                            <input type="file" name="" id="dULandDeed">
                        </td>
                    </tr>
                    <tr>
                        <td>Original of land owner's consent</td>
                        <td>
                            <button type = "button" id = "dULandOConsentBtn"><i class="fa fa-paperclip fa-lg"></i></button><span class="name" id = "dULandOConsentSpan">No file selected</span>
                            <input type="file" name="" id="dULandOConsent">
                        </td>
                    </tr>
                    <tr>
                        <td>If the land is in other district, recommendation of respective DS</td>
                        <td>
                            <button type = "button" id = "dURecDSBtn"><i class="fa fa-paperclip fa-lg"></i></button><span class="name" id = "dURecDSSpan">No file selected</span>
                            <input type="file" name="" id="dURecDS">
                        </td>
                    </tr>
                    <tr>
                        <td>Marriage certificate, if land belongs to spouse</td>
                        <td>
                            <button type = "button" id = "dUMarriageCBtn"><i class="fa fa-paperclip fa-lg"></i></button><span class="name" id = "dUMarriageCSpan">No file selected</span>
                            <input type="file" name="" id="dUMarriageC">
                        </td>
                    </tr>
                    <tr>
                        <td>Recommendation from Divisional Agriculture Development Committee</td>
                        <td>
                            <button type = "button" id = "dUDivAgDevComBtn"><i class="fa fa-paperclip fa-lg"></i></button><span class="name" id = "dUDivAgDevComSpan">No file selected</span>
                            <input type="file" name="" id="dUDivAgDevCom">
                        </td>
                    </tr>
                    <tr>
                        <td>Recommendation from District Agriculture Development Committee</td>
                        <td>
                            <button type = "button" id = "dUDisAgDevComBtn"><i class="fa fa-paperclip fa-lg"></i></button><span class="name" id = "dUDisAgDevComSpan">No file selected</span>
                            <input type="file" name="" id="dUDisAgDevCom">
                        </td>
                    </tr>
                </table>
            </div>
        </div>

       
        
        <div class="button-section">
            <input type="submit" name="submit" value="Save Details" onclick = ""/>
        </div>
    </form>
    </div>

</body>
</html>