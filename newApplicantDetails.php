

<!--html>

<head>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css" />
	<link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.css" />
	<link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.min.css" />
	<script src="bootstrap/css/bootstrap.js"></script>
	<script src="bootstrap/css/bootstrap.min.js"></script>
</head>

</html-->

<?php
class newApplicantDetails {
	public $DBOb;

	function includeDB() {
		include_once("dbOperations.php");
		$DBObject = new DBOperations();

		$this->DBOb = $DBObject;
	}
	
	function applicantDetails() {
		$DBOb = $this->DBOb;

		$table = "applicant";
		$fields = ["a_id", "full_name", "address", "telephone", "dob", "gender", "civil_status", "no_of_children", "citizenship", "nic", "nic_issue_date"];
		$condition = false;

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$aID = $row[0];
				$name = $row[1];
				$address = $row[2];
				$telephone = $row[3];
				$dob = $row[4];
				$gender = $row[5];
				$civilstatus = $row[6];
				$children = $row[7];
				$citizenship = $row[8];
				$nic = $row[9];
				$issuedate = $row[10];
				
				if($gender == 1){
					$gender = "Male";
				}
				else{
					$gender = "Female";
				}
				
				if($civilstatus == 1){
					$civilstatus = "Married";
				}
				else{
					$civilstatus = "Single";
				}
				
				if($citizenship == 1){
					$citizenship = "Yes";
				}
				else{
					$citizenship = "No";
				}

				echo '<tr>
						<td>'. $aID .'</td>
						<td>'. $name .'</td>
						<td>'. $address. '</td>
						<td>'. $telephone. '</td>
						<td>'. $dob .'</td>
						<td>'. $gender .'</td>
						<td>'. $civilstatus .'</td>
						<td>'. $children .'</td>
						<td>'. $citizenship .'</td>
						<td>'. $nic .'</td>
						<td>'. $issuedate .'</td>
					</tr>';
			}
		}
	}
	
	function livingDetails() {
		$DBOb = $this->DBOb;

		$table = "applicant";
		$fields = ["a_id", "district", "grama_n", "police_area"];
		$condition = false;

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$aID = $row[0];
				$district = $row[1];
				$gramaDiv = $row[2];
				$policeArea = $row[3];

				echo '<tr>
						<td>'. $aID .'</td>
						<td>'. $district .'</td>
						<td>'. $gramaDiv. '</td>
						<td>'. $policeArea. '</td>						
					</tr>';
			}
		}
	}
	
	function workingDetails() {
		$DBOb = $this->DBOb;

		$table = "applicant";
		$fields = ["a_id", "occupation", "avg_income", "tax_payer", "tax_no"];
		$condition = false;

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$aID = $row[0];
				$occupation = $row[1];
				$avgincome = $row[2];
				$taxpayer = $row[3];
				$taxno = $row[4];
				
				if($taxpayer == 1){
					$taxpayer = "Yes";
				}
				else{
					$taxpayer = "No";
				}

				echo '<tr>
						<td>'. $aID .'</td>
						<td>'. $occupation .'</td>
						<td>'. $avgincome. '</td>
						<td>'. $taxpayer. '</td>
						<td>'. $taxno. '</td>
					</tr>';
			}
		}
	}
	
	function courtDetails() {
		$DBOb = $this->DBOb;

		$table = "offence";
		$fields = ["o_id", "a_id", "year", "court_name", "offence", "judgement"];
		$condition = false;

		$table2 = "applicant";
		$fields2 = ["offence"];

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$offenceID = $row[0];
				$applicantID = $row[1];
				$year = $row[2];
				$courtname = $row[3];
				$offence = $row[4];
				$judgement = $row[5];

				$condition2 = "a_id = '". $offenceID. "'";
				$selectedData = $DBOb->select($table2, $fields2, $condition2);

				$applicantoffence = $selectedData[0][0];

				echo '<tr>
						<td>'. $offenceID. '</td>
						<td>'. $year. '</td>
						<td>'. $courtname. '</td>
						<td>'. $offence. '</td>
						<td>'. $judgement. '</td>
					</tr>';
			}
		}
	}
	
	function cultivationDetails() {
		$DBOb = $this->DBOb;

		$table = "cultivation";
		$fields = ["c_id", "a_id", "land_name", "district", "acres", "crop", "acres_culti_land", "animals", "loss"];
		$condition = false;

		$table2 = "applicant";
		$fields2 = ["a_id"];

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$cID = $row[0];
				$aID = $row[1];
				$landname = $row[2];
				$district = $row[3];
				$acres = $row[4];
				$crop = $row[5];
				$acresCultiLand = $row[6];
				$animals = $row[7];
				$loss = $row[8];
				
				$condition2 = "a_id = '". $cID. "'";
				$selectedData = $DBOb->select($table2, $fields2, $condition2);

				$applicantID = $selectedData[0][0];

				

				echo '<tr>
						<td>'. $applicantID. '</td>
						<td>'. $landname. '</td>
						<td>'. $district. '</td>
						<td>'. $acres. '</td>
						<td>'. $crop. '</td>
						<td>'. $acresCultiLand. '</td>
						<td>'. $animals. '</td>
						<td>'. $loss. '</td>
					</tr>';
			}
		}
	}
	
	function livestockdetails() {
		$DBOb = $this->DBOb;

		$table = "livestock";
		$fields = ["l_id", "a_id", "farm_name", "district_ds_gs", "livestock_type", "farm_value", "loss"];
		$condition = false;

		$table2 = "applicant";
		$fields2 = ["a_id"];

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$livestockID = $row[0];
				$aID = $row[1];
				$farmname = $row[2];
				$district = $row[3];
				$livestocktype = $row[4];
				$farmvalue = $row[5];
				$loss = $row[6];

				$condition2 = "a_id = '". $livestockID. "'";
				$selectedData = $DBOb->select($table2, $fields2, $condition2);

				$applicantID = $selectedData[0][0];

				echo '<tr>
						<td>'. $applicantID. '</td>
						<td>'. $farmname. '</td>
						<td>'. $district. '</td>
						<td>'. $livestocktype. '</td>
						<td>'. $farmvalue. '</td>
						<td>'. $loss. '</td>
					</tr>';
			}
		}
	}
	
	function transferStolenGunDetails() {
		$DBOb = $this->DBOb;

		$table = "stolen_transferred";
		$fields = ["t_id", "a_id", "transfer_date", "gun_parti", "licence_no", "transf_to", "receipts", "entry_made"];
		$condition = false;

		$table2 = "applicant";
		$fields2 = ["stolen_trans"];

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$transferID = $row[0];
				$aID = $row[1];
				$transferdate = $row[2];
				$gunparti = $row[3];
				$licenceno = $row[4];
				$transferto = $row[5];
				$receipts = $row[6];
				$entrymade = $row[7];

				$condition2 = "a_id = '". $transferID. "'";
				$selectedData = $DBOb->select($table2, $fields2, $condition2);

				$stolentrans = $selectedData[0][0];
				
				if($stolentrans == 0){
					$stolentrans  = "Stolen";
				}
				else{
					$stolentrans  = "Transferred";
				}
				if($entrymade == 1){
					$entrymade = "Yes";
				}
				else{
					$entrymade = "No";
				}

				echo '<tr>
						<td>'. $transferID. '</td>
						<td>'. $transferdate. '</td>
						<td>'. $gunparti. '</td>
						<td>'. $licenceno. '</td>
						<td>'. $transferto. '</td>
						<td>'. $receipts. '</td>
						<td>'. $stolentrans. '</td>
						<td>'. $entrymade. '</td>
					</tr>';
			}
		}
	}
	
	function acquisitionDetails() {
		$DBOb = $this->DBOb;

		$table = "temp_guns_posse";
		$fields = ["pos_id", "acq_date", "type_nbr", "licence_no"];
		$condition = false;

		$table2 = "applicant";
		$fields2 = ["guns_in_poss"];

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$possessionID = $row[0];
				$acqDate = $row[1];
				$typeNBR = $row[2];
				$licenceno = $row[3];

				$condition2 = "a_id = '". $possessionID. "'";
				$selectedData = $DBOb->select($table2, $fields2, $condition2);

				$gunsPossession = $selectedData[0][0];			

				echo '<tr>
						<td>'. $possessionID. '</td>
						<td>'. $acqDate. '</td>
						<td>'. $typeNBR. '</td>
						<td>'. $licenceno. '</td>
					</tr>';
			}
		}
	}
	
	function officialDutiesDetails() {
		$DBOb = $this->DBOb;

		$table = "official_weapon";
		$fields = ["ow_id", "a_id", "type_nbr", "licence_no"];
		$condition = false;

		$table2 = "applicant";
		$fields2 = ["official_weapon"];

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$WeaponID = $row[0];
				$typeNBR = $row[2];
				$licenceno = $row[3];

				$condition2 = "a_id = '". $WeaponID. "'";
				$selectedData = $DBOb->select($table2, $fields2, $condition2);

				$officialWeapon = $selectedData[0][0];			

				echo '<tr>
						<td>'. $WeaponID. '</td>
						<td>'. $typeNBR. '</td>
						<td>'. $licenceno. '</td>
					</tr>';
			}
		}
	}
	
	function authenticationDetails() {
		$DBOb = $this->DBOb;

		$table = "authentication";
		$fields = ["au_id", "gn_certificate", "police_certificate", "dv_secretary_certificate", "dis_secretary_certificate", "ad_md_secretary_certificate", "md_secretary_certificate"];
		$condition = false;

		$table2 = "application";
		$fields2 = ["authentications"];

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$authenticationID = $row[0];
				$GNcertificate = $row[1];
				$policeCertificate = $row[2];
				$dvSecretaryCertificate = $row[3];
				$disSecretaryCertificate = $row[4];
				$adMdSecreteryCertificate = $row[5];
				$mdSecreteryCertificate = $row[6];

				$condition2 = "a_id = '". $authenticationID. "'";
				$selectedData = $DBOb->select($table2, $fields2, $condition2);

				$authentication = $selectedData[0][0];		

				if($authentication == 1){
					$authentication = "Yes";
				}
				else{
					$authentication = "No";
				}
				if($GNcertificate == 1){
					$GNcertificate =  "Yes";
				}
				else{
					$GNcertificate =  "No";
				}
				if($policeCertificate == 1){
					$policeCertificate = "Yes";
				}
				else{
					$policeCertificate = "No";
				}
				if($dvSecretaryCertificate == 1){
					$dvSecretaryCertificate = "Yes";
				}
				else{
					$dvSecretaryCertificate = "No";
				}
				if($disSecretaryCertificate == 1){
					$disSecretaryCertificate = "Yes";
				}
				else{
					$disSecretaryCertificate = "No";
				}
				if($adMdSecreteryCertificate == 1){
					$adMdSecreteryCertificate = "Yes";
				}
				else{
					$adMdSecreteryCertificate = "No";
				}
				if($mdSecreteryCertificate == 1){
					$mdSecreteryCertificate = "Yes";
				}
				else{
					$mdSecreteryCertificate = "No";
				}

				echo '<tr>
						<td>'. $authenticationID. '</td>
						<td>'. $authentication. '</td>
						<td>'. $GNcertificate. '</td>
						<td>'. $policeCertificate. '</td>
						<td>'. $dvSecretaryCertificate. '</td>
						<td>'. $disSecretaryCertificate. '</td>
						<td>' .$adMdSecreteryCertificate. '</td>
						<td>'. $mdSecreteryCertificate. '</td>
					</tr>';
			}
		}
	}
	
	function __construct(){
		$this->includeDB();
	}
}

//$a = new newApplicantDetails();
//$a->applicantDetails();
?>