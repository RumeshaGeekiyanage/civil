<?php

class UpdatePostedReturnedList {
	public $DBOb;

	function includeDB() {
		include_once("dbOperations.php");
		$DBObject = new DBOperations();

		$this->DBOb = $DBObject;
	}



	function getData() {
		if(isset($_POST['l']) && isset($_POST['apID'])) {
			$listType = $_POST['l'];
			$appID = $_POST['apID'];
			$date = date("Y-m-d");

			$dataArray = [$listType, $appID, $date];
			return $dataArray;
		}
	}



	function updatePostedList() {
		$dataArray = $this->getData();
		$DBOb = $this->DBOb;

		if(!empty($dataArray)) {
			$listType = $dataArray[0];
			$appID = $dataArray[1];
			$date = $dataArray[2];

			$table = "application";

			if($listType == "p") {
				$fields = ['posted', 'posted_date'];
				$values = ['1', $date];
			} elseif($listType == "r") {
				$fields = ['returned', 'returned_date'];
				$values = ['1', $date];
			}
			
			$condition = "app_id = '$appID'";

			$DBOb->update($table, $fields, $values, $condition);
		}
	}



	function __construct() {
		$this->includeDB();
		$this->updatePostedList();
	}
}

new UpdatePostedReturnedList();

?>