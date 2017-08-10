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
	
	function __construct(){
		$this->includeDB();
	}
}

//$a = new newApplicantDetails();
//$a->applicantDetails();
?>