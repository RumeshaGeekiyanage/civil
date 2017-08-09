<?php

class InsertAgriFormData {
	public $dataArray;
	public $DBOb;
	public $aID;
	public $appID;

	function includeDB() {
		include_once("dbOperations.php");
		$DBObject = new DBOperations();

		$this->DBOb = $DBObject;
	}



	function getFormData() {
		/*	Section 1 	*/
		$s1name = $_POST['s1name'];
		$s1address = $_POST['s1address'];
		$s1telephoneNo = $_POST['s1telephoneNo'];
		$s1dob = $_POST['s1dob'];
		$s1gender = $_POST['s1gender'];
		$s1civilStatus = $_POST['s1civilStatus'];
		$s1numchildren = $_POST['s1numchildren'];
		$s1citizen = $_POST['s1citizen'];			

		if($s1citizen == 0) {
			$s1nic = null;
			$s1nicIssueDate = null;	
		} else {
			$s1nic = $_POST['s1nic'];
			$s1nicIssueDate = $_POST['s1nicIssueDate'];
		}

		/*	Section 2	*/
		$s2district = $_POST['s2district'];
		$s2gSDivision = $_POST['s2gSDivision'];
		$s2policeArea = $_POST['s2policeArea'];

		/*	Section 3	*/
		$s3occupation = $_POST['s3occupation'];
		$s3avgIncome = $_POST['s3avgIncome'];
		$s3taxPay = $_POST['s3taxPay'];

		if($s3taxPay == 0) {
			$s3taxNumber = null;
		} else {
			$s3taxNumber = $_POST['s3taxNumber'];
		}

		/*	Section 4	*/
		$s4chargedOffence = $_POST['s4chargedOffence'];

		/*	Section 5 Agiculture	*/
		$s5category = $_POST['s5category'];

		if($s5category == 1) {
			$s5landName = $_POST['s5landName'];
			$s5district = $_POST['s5district'];
			$s5acres = $_POST['s5acres'];
			$s5crop = $_POST['s5crop'];
			$s5cultivatedAcres = $_POST['s5cultivatedAcres'];
			$s5animal = $_POST['s5animal'];
			$s5cultivationLoss = $_POST['s5cultivationLoss'];

			$cultivationArray = [$s5landName, $s5district, $s5acres, $s5crop, $s5cultivatedAcres, $s5animal, $s5cultivationLoss];
		} else {
			$cultivationArray = [];
		}

		/*	Section 5 Livestock		*/
		if($s5category == 2) {
			$s5farmName = $_POST['s5farmName'];
			$s5dDsGsArea = $_POST['s5dDsGsArea'];
			$s5livestocktype = $_POST['s5livestocktype'];
			$s5farmValue = $_POST['s5farmValue'];
			$s5livestockLoss = $_POST['s5livestockLoss'];

			$LivestockArray = [$s5farmName, $s5dDsGsArea, $s5livestocktype, $s5farmValue, $s5livestockLoss];
		} else {
			$LivestockArray = [];
		}

		/*	Section 6	*/
		$s6stolentransf = $_POST['s6stolentransf'];

		if($s6stolentransf == 1) {
			$s6date = $_POST['s6date'];
			$s6gunType = $_POST['s6gunType'];
			$s6licence = $_POST['s6licence'];
			$s6toWhomTransf = $_POST['s6toWhomTransf'];
			$s6receipts = $_POST['s6receipts'];
			$s6properEntry = $_POST['s6properEntry'];

			$stolenTransArray = [$s6date, $s6gunType, $s6licence, $s6toWhomTransf, $s6receipts, $s6properEntry];
		} else {
			$stolenTransArray = [];
		}

		/*	Section 7	*/
		$s7gunPossess = $_POST['s7gunPossess'];

		/*	Section 8	*/
		$s8serviceWeapon = $_POST['s8serviceWeapon'];

		if($s8serviceWeapon == 1) {
			$s8gunType = $_POST['s8gunType'];
			$s8licence = $_POST['s8licence'];

			$officialWeaponArray = [$s8gunType, $s8licence];
		} else {
			$officialWeaponArray = [];
		}

		/*	Section 9	*/
		$s9authentications = $_POST['s9authentications'];

		$submissionDate = date("Y-m-d");



		$applicantArray = [$s1name, $s1address, $s1telephoneNo, $s1dob, $s1gender, $s1civilStatus, $s1numchildren, $s1citizen, $s1nic, $s1nicIssueDate, $s2district, $s2gSDivision, $s2policeArea, $s3occupation, $s3avgIncome, $s3taxPay, $s3taxNumber, $s4chargedOffence, $s6stolentransf, $s7gunPossess, $s8serviceWeapon];
		$applicationArray = [$s5category, $s9authentications, $submissionDate];

		$agriDataArray = [$applicantArray, $applicationArray, $stolenTransArray, $officialWeaponArray, $cultivationArray, $LivestockArray];

		$this->dataArray = $agriDataArray;

		// echo $s1name;

	}



	function selectApplicantID() {
		$dataArray = $this->dataArray;
		$DBOb = $this->DBOb;

		$table = "applicant";
		$fields = ["a_id"];
		$condition = "temp_value = '0'";

		$selectedData = $DBOb->select($table, $fields, $condition);
		$applicantID = $selectedData[0][0];

		$this->aID = $applicantID;
	}



	function applicant() {
		$dataArray = $this->dataArray;
		$DBOb = $this->DBOb;

		$apArray = $dataArray[0];

		$table = "applicant";
		$fields = ["full_name", "address", "telephone", "dob", "gender", "civil_status", "no_of_children", "citizenship", "nic", "nic_issue_date", "district", "grama_n", "police_area", "occupation", "avg_income", "tax_payer", "tax_no", "offence", "stolen_trans", "guns_in_poss", "official_weapon", "temp_value"];
		$values = [$apArray[0], $apArray[1], $apArray[2], $apArray[3], $apArray[4], $apArray[5], $apArray[6], $apArray[7], $apArray[8], $apArray[9], $apArray[10], $apArray[11], $apArray[12], $apArray[13], $apArray[14], $apArray[15], $apArray[16], $apArray[17], $apArray[18], $apArray[19], $apArray[20], "0"];

		$DBOb->insert($table, $fields, $values);
		$this->selectApplicantID();

		$fields2 = ["temp_value"];
		$values2 = ["1"];
		$condition2 = "temp_value = '0'";
		$DBOb->update($table, $fields2, $values2, $condition2);

	} 



	function selectApplicationID() {
		$dataArray = $this->dataArray;
		$DBOb = $this->DBOb;

		$table = "application";
		$fields = ["app_id"];
		$condition = "temp_value = '0'";

		$selectedData = $DBOb->select($table, $fields, $condition);
		$applicationID = $selectedData[0][0];

		$this->appID = $applicationID;
	}



	function application() {
		$dataArray = $this->dataArray;
		$DBOb = $this->DBOb;
		$aID = $this->aID;

		$apArray = $dataArray[1];

		$table = "application";
		$fields = ["a_id", "category", "authentications", "submission_date", "temp_value"];
		$values = [$aID, $apArray[0], $apArray[1], $apArray[2], "0"];

		$DBOb->insert($table, $fields, $values);
		$this->selectApplicationID();

		$fields2 = ["temp_value"];
		$values2 = ["1"];
		$condition2 = "temp_value = '0'";
		$DBOb->update($table, $fields2, $values2, $condition2);
	}



	function stolenTransferred() {
		$dataArray = $this->dataArray;
		$DBOb = $this->DBOb;
		$aID = $this->aID;

		$apArray = $dataArray[2];

		$table = "stolen_transferred";
		$fields = ["a_id", "transfer_date", "gun_parti", "licence_no", "transf_to", "receipts", "entry_made"];
		$values = [$aID, $apArray[0], $apArray[1], $apArray[2], $apArray[3], $apArray[4], $apArray[5]];

		$DBOb->insert($table, $fields, $values);
	}



	function officialWeapon() {
		$dataArray = $this->dataArray;
		$DBOb = $this->DBOb;
		$aID = $this->aID;

		$apArray = $dataArray[3];

		$table = "official_weapon";
		$fields = ["a_id", "type_nbr", "licence_no"];
		$values = [$aID, $apArray[0], $apArray[1]];

		$DBOb->insert($table, $fields, $values);
	}



	function cultivation() {
		$dataArray = $this->dataArray;
		$DBOb = $this->DBOb;
		$aID = $this->aID;
		$appID = $this->appID;

		$apArray = $dataArray[4];

		$table = "cutivation";
		$fields = ["app_id", "a_id", "land_name", "district", "acres", "crop", "acres_culti_land", "animals", "loss"];
		$values = [$appID, $aID, $apArray[0], $apArray[1], $apArray[2], $apArray[3], $apArray[4], $apArray[5], $apArray[6]];

		$DBOb->insert($table, $fields, $values);
	}



	function livestock() {
		$dataArray = $this->dataArray;
		$DBOb = $this->DBOb;
		$aID = $this->aID;
		$appID = $this->appID;

		$apArray = $dataArray[5];

		$table = "livestock";
		$fields = ["app_id", "a_id", "farm_name", "district_ds_gs", "livestock_type", "farm_value", "loss"];
		$values = [$appID, $aID, $apArray[0], $apArray[1], $apArray[2], $apArray[3], $apArray[4]];

		$DBOb->insert($table, $fields, $values);
	}



	function offence() {
		$dataArray = $this->dataArray;
		$DBOb = $this->DBOb;
		$aID = $this->aID;

		$table = "temp_offence";
		$fields = ["year", "court_name", "offence", "judgement"];
		$condition = "nic = '". $dataArray[0][8]. "'";

		$selectedData = $DBOb->select($table, $fields, $condition);

		$table2 = "offence";
		$fields2 = ["a_id", "year", "court_name", "offence", "judgement"];

		foreach ($selectedData as $row) {
			$year = $row[0];
			$court = $row[1];
			$offence = $row[2];
			$judgement = $row[3];

			$values2 = [$aID, $year, $court, $offence, $judgement];

			$DBOb->insert($table2, $fields2, $values2);
		}

		$DBOb->truncate($table);
	}



	function gunsInPossession() { // Not completed
		$dataArray = $this->dataArray;
		$DBOb = $this->DBOb;
		$aID = $this->aID;

		$table = "temp_guns_posse";
		$fields = ["acq_date", "type_nbr", "licence_no"];
		$condition = "nic = '". $dataArray[0][8]. "'";

		$selectedData = $DBOb->select($table, $fields, $condition);

		$table2 = "guns_posse";
		$fields2 = ["a_id", "acq_date", "type_nbr", "licence_no"];

		foreach ($selectedData as $row) {
			$acqDate = $row[0];
			$typeNo = $row[1];
			$licenceNo = $row[2];

			$values2 = [$aID, $acqDate, $typeNo, $licenceNo];

			$DBOb->insert($table2, $fields2, $values2);
		}

		$DBOb->truncate($table);
	}



	function insertData() {
		$dataArray = $this->dataArray;

		$offence = $dataArray[0][17];
		$stolenTrans = $dataArray[0][18];
		$gunsInPoss = $dataArray[0][19];
		$offWeapon = $dataArray[0][20];
		$category = $dataArray[1][0];

		$this->applicant();
		$this->application();

		if($offence == 1) {
			$this->offence();
		}

		if($gunsInPoss == 1) {
			$this->gunsInPossession();
		}

		if($stolenTrans == 1) {
			$this->stolenTransferred();
		}

		if($offWeapon == 1) {
			$this->officialWeapon();
		}

		if($category == 1) {
			$this->cultivation();
		} elseif($category == 2) {
			$this->livestock();
		}	
	}



	/* ****** Constructor ****** */
	
	function __construct() {
		$this->includeDB();
		$this->getFormData();
		$this->insertData();
	}
}

new InsertAgriFormData;

?>