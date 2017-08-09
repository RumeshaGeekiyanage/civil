<?php
class ApplicationDetails { // Not completed.. echo HTML lines
	public $DBOb;
	public $applicationID;
	public $aID;
	public $applicationArr = array();
	public $applicantArr = array();

	function includeDB() {
		include_once("dbOperations.php");
		$DBObject = new DBOperations();

		$this->DBOb = $DBObject;
	}



	function getData() {
		if(isset($_GET['apID'])) {
			$applicationID = $_GET['apID'];
			$this->applicationID = $applicationID;
		}
	}



	function applicationDetails() {
		$DBOb = $this->DBOb;
		$applicationID = $this->applicationID;

		$table = "application";
		$fields = ["a_id", "category", "authentications", "submission_date"];
		$condition = "app_id = '$applicationID'";

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$aID = $row[0];
				$category = $row[1];
				$authentications = $row[2];
				$subDate = $row[3];
			}

			$applicationArr = [$category, $authentications, $subDate];
			$this->applicationArr = $applicationArr;
			$this->aID = $aID;
		}
	}
	


	function applicantDetails() {
		$DBOb = $this->DBOb;
		$aID = $this->aID;

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

			$applicantArr = [$offence, $stolenTrans, $gunsInPoss, $officialWeapon];
			$this->applicantArr = $applicantArr;
		}
	}



	function offenceDetails() {
		$DBOb = $this->DBOb;
		$aID = $this->aID;

		$table3 = "offence";
		$fields3 = ["o_id", "year", "court_name", "offence", "judgement"];
		$condition3 = "a_id = '$aID'";

		$selectedData3 = $DBOb->select($table3, $fields3, $condition3);

		if(!empty($selectedData3)) {
			foreach ($selectedData3 as $row3) {
				$offenceID = $row3[0];
				$offenceYear = $row3[1];
				$courtName = $row3[2];
				$offence = $row3[3];
				$judgement = $row3[4];
			}
		}
	}



	function stolenTransf() {
		$DBOb = $this->DBOb;
		$aID = $this->aID;

		$table4 = "stolen_transferred";
		$fields4 = ["t_id", "transfer_date", "gun_parti", "licence_no", "transf_to", "receipts", "entry_made"];
		$condition4 = "a_id = '$aID'";

		$selectedData4 = $DBOb->select($table4, $fields4, $condition4);

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
		}
	}



	function gunsPoss() {
		$DBOb = $this->DBOb;
		$aID = $this->aID;

		$table5 = "guns_posse";
		$fields5 = ["p_id", "acq_date", "type_nbr", "licence_no"];
		$condition5 = "a_id = '$aID'";

		$selectedData5 = $DBOb->select($table5, $fields5, $condition5);

		if(!empty($selectedData5)) {
			foreach ($selectedData5 as $row5) {
				$pID = $row5[0];
				$acqDate = $row5[1];
				$typeNo = $row5[2];
				$gunsPossLicenceNo = $row5[3];
			}
		}
	}



	function offWeapon() {
		$DBOb = $this->DBOb;
		$aID = $this->aID;

		$table6 = "official_weapon";
		$fields6 = ["ow_id", "type_nbr", "licence_no"];
		$condition6 = "a_id = '$aID'";

		$selectedData6 = $DBOb->select($table6, $fields6, $condition6);

		if(!empty($selectedData6)) {
			foreach ($selectedData6 as $row6) {
				$owID = $row6[0];
				$typeNo = $row6[1];
				$licenceNo = $row6[2];
			}
		}
	}



	/* ****** Category Details ****** */

	function cultivation() {
		$DBOb = $this->DBOb;
		$aID = $this->aID;
		$applicationID = $this->applicationID;

		$table7 = "cutivation";
		$fields7 = ["c_id", "land_name", "district", "acres", "crop", "acres_culti_land", "animals", "loss"];
		$condition = "app_id = '$applicationID'";

		$selectedData7 = $DBOb->select($table7, $fields7, $condition7);

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
		}
	}



	function livestock() {
		$DBOb = $this->DBOb;
		$aID = $this->aID;
		$applicationID = $this->applicationID;

		$table8 = "livestock";
		$fields8 = ["l_id", "farm_name", "district_ds_gs", "livestock_type", "farm_value", "loss"];
		$condition = "app_id = '$applicationID'";

		$selectedData8 = $DBOb->select($table8, $fields8, $condition8);

		if(!empty($selectedData8)) {
			foreach ($selectedData8 as $row8) {
				$lID = $row8[0];
				$farmName = $row8[1];
				$districtDSGS = $row8[2];
				$livestockType = $row8[3];
				$farmValue = $row8[4];
				$livestockLoss = $row8[5];
			}
		}
	}



	function __construct() {
		$this->includeDB();

		$this->getData();
		$applicationID = $this->applicationID;

		$this->applicationDetails();
		$applicationArr = $this->applicationArr;

		if(!empty($applicationArr)) {
			$this->applicantDetails();
			$applicantArr = $this->applicantArr;

			/* ** Offense ** */
			if($applicantArr[0] == 1) {
				$this->offenceDetails();
			}

			/* ** Cultivation ** */
			if($applicationArr[0] == 1) {
				$this->cultivation();
			}

			/* ** Livestock ** */
			if($applicationArr[0] == 2) {
				$this->livestock();
			}

			/* ** Stolen or Transferred ** */
			if($applicantArr[1] == 1) {
				$this->stolenTransf();
			}

			/* ** Guns in Possession ** */
			if($applicantArr[2] == 1) {
				$this->gunsPoss();
			}

			/* ** Official Weapon ** */
			if($applicantArr[3] == 1) {
				$this->offWeapon();
			}
		}
	}
}

new ApplicationDetails();
?>