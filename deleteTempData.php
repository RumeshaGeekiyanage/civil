<?php

class DeleteTempData { // Not completed
	public $DBOb;
	public $STDOb;
	public $o_id;
	public $g_id;

	function includeDB() {
		include_once("dbOperations.php");
		$DBObject = new DBOperations();

		$this->DBOb = $DBObject;
	}



	function includeTempData() {
		include_once("showTempData.php");
		$STDObject = new ShowTempData();

		$this->STDOb = $STDObject;
	}



	function getData() {
		if(isset($_POST['o'])) {
			$o_id = $_POST['o'];

			if($o_id !== "" || $o_id !== null) {
				$this->o_id = $o_id;
			}
		} else {
			$o_id = null;
		}

		if(isset($_POST['g'])) {
			$g_id = $_POST['g'];

			if($g_id !== "" || $g_id !== null) {
				$this->g_id = $g_id;
			}
		} else {
			$g_id = null;
		}

	}



	function deleteOffence() {
		$DBOb = $this->DBOb;
		$o_id = $this->o_id;

		$table = "temp_offence";
		$condition = "id = '$o_id'";

		$DBOb->delete($table, $condition);
	}



	function deleteGunsInPossession() {
		$DBOb = $this->DBOb;
		$g_id = $this->g_id;

		$table = "temp_guns_posse";
		$condition = "id = '$g_id'";

		$DBOb->delete($table, $condition);
	}



	function deleteTempData() {
		$STDOb = $this->STDOb;
		$o_id = $this->o_id;
		$g_id = $this->g_id;

		if(!empty($o_id)) {
			$this->deleteOffence();
			$STDOb-> showTempOffences();
		}

		if(!empty($g_id)) {
			$this->deleteGunsInPossession();
			$STDOb-> showTempGunsPoss();
		}
	}



	/* ****** Constructor ****** */

	function __construct() {
		$this->includeDB();
		$this->includeTempData();
		$this->getData();
		$this->deleteTempData();
	}

}

new DeleteTempData();

?>