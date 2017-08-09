<?php

class ShowTempData {
	public $DBOb;

	function includeDB() {
		include_once("dbOperations.php");
		$DBObject = new DBOperations();

		$this->DBOb = $DBObject;
	}



	function showTempOffences() {
		$DBOb = $this->DBOb;

		$table = "temp_offence";
		$fields = ["id", "year", "court_name", "offence", "judgement"];

		$tempOffArr = $DBOb->select($table, $fields);

		if(!empty($tempOffArr)) {
			echo '<tr><th>Year</th>
			          <th>Court</th>
			          <th>Offence</th>
			          <th>Judgement</th>
			          <th></th></tr>';

			foreach($tempOffArr as $row) {
				$id = $row[0];
				$year = $row[1];
				$court = $row[2];
				$offence = $row[3];
				$judgement = $row[4];

				echo '<tr><td>'. $year. '</td>
	                        <td>'. $court. '</td>
	                        <td>'. $offence. '</td>
	                        <td>'. $judgement. '</td>
	                        <td><button value = "'. $id. '" onclick = "deleteOffence(\''. $id. '\', event)"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
			}
		}
	}



	function showTempGunsPoss() {
		$DBOb = $this->DBOb;

		$table = "temp_guns_posse";
		$fields = ["id", "acq_date", "type_nbr", "licence_no"];

		$tempGunsArr = $DBOb->select($table, $fields);

		if(!empty($tempGunsArr)) {
			echo '<tr><th>Date</th>
	                  <th>Type & No</th>
	                  <th>Licence No</th>
	                  <th></th></tr>';

			foreach($tempGunsArr as $row) {
				$id = $row[0];
				$acqDate = $row[1];
				$typeNo = $row[2];
				$licenceNo = $row[3];

				echo '<tr><td>'. $acqDate. '</td>
	                        <td>'. $typeNo. '</td>
	                        <td>'. $licenceNo. '</td>
	                        <td><button value = "'. $id. '" onclick = "deleteGunsPoss(\''. $id. '\', event)"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
			}
		}
	}



	/* ****** Constructor ****** */

	function __construct() {
		$this->includeDB();
	}
}

?>