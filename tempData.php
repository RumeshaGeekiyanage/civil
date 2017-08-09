<?php

class TempData {
	public $DBOb;
	public $STDOb;
	public $tempDataArray;

	function includeDB() {
		include_once("dbOperations.php");
		$DBObject = new DBOperations();

		$this->DBOb = $DBObject;
	}



	function includeShowTempData() {
		include_once("showTempData.php");
		$STDObject = new ShowTempData();

		$this->STDOb = $STDObject;
	}



	function getData() {
		if(isset($_POST['nic'])) {
			$nic = $_POST['nic'];
		}

		/* Offence Details*/
		if(isset($_POST['y']) && isset($_POST['c']) && isset($_POST['o']) && isset($_POST['j'])) {
			$year = $_POST['y'];
			$court = $_POST['c'];
			$offence = $_POST['o'];
			$judgment = $_POST['j'];

			if($year == "" && $court == "" && $offence == "" && $judgment == "") {
				$offenceArray = [];
			} else {
				$offenceArray = [$year, $court, $offence, $judgment];
			}
		} else {
			$offenceArray = [];
		}

		/* Guns in Possession */
		if(isset($_POST['a']) && isset($_POST['t']) && isset($_POST['l'])) {
			$acqDate = $_POST['a'];
			$typeNo = $_POST['t'];
			$licenceNo = $_POST['l'];

			if($acqDate == "" && $typeNo == "" && $licenceNo == "" ) {
				$gunsArray = [];
			} else {
				$gunsArray = [$acqDate, $typeNo, $licenceNo];
			}
		} else {
			$gunsArray = [];
		}

		$tempDataArray = [$offenceArray, $gunsArray, $nic];
		$this->tempDataArray = $tempDataArray;
	}



	function offence() {
		$tempDataArray = $this->tempDataArray;
		$DBOb = $this->DBOb;

		$offenceArray = $tempDataArray[0];
		$nic = $tempDataArray[2];

		$table = "temp_offence";
		$fields = ["nic", "year", "court_name", "offence", "judgement"];
		$values = [$nic, $offenceArray[0], $offenceArray[1], $offenceArray[2], $offenceArray[3]];

		$DBOb->insert($table, $fields, $values);

	}



	function gunsInPossession() {
		$tempDataArray = $this->tempDataArray;
		$DBOb = $this->DBOb;

		$gunsArray = $tempDataArray[1];
		$nic = $tempDataArray[2];

		$table = "temp_guns_posse";
		$fields = ["nic", "acq_date", "type_nbr", "licence_no"];
		$values = [$nic, $gunsArray[0], $gunsArray[1], $gunsArray[2]];

		$DBOb->insert($table, $fields, $values);
	}



	function insertTempData() {
		$tempDataArray = $this->tempDataArray;
		$STDOb = $this->STDOb;

		$offenceArray = $tempDataArray[0];
		$gunsArray = $tempDataArray[1];

		if(!empty($offenceArray)) {
			$this-> offence();
			$STDOb-> showTempOffences();
		}

		if(!empty($gunsArray)) {
			$this-> gunsInPossession();
			$STDOb-> showTempGunsPoss();
		}
	}



	/* ****** Constructor ****** */

	function __construct() {
		$this-> includeDB();
		$this-> includeShowTempData();
		$this-> getData();
		$this-> insertTempData();
	}
}


new TempData();

?>