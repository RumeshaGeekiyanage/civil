<?php
class AutoFillPermit {
	public $DBOb;
	public $apID;
	public $gunP;

	function includeDB() {
		include_once("dbOperations.php");
		$DBObject = new DBOperations();

		$this->DBOb = $DBObject;
	}



	function getData() {
		if(isset($_POST['apID'])) {
			$apID = $_POST['apID'];
			$this->apID = $apID;
		}
	}



	function autoFill() {
		$DBOb = $this->DBOb;
		$apID = $this->apID;

		$table1 = "application";
		$fields1 = ["a_id"];
		$condition1 = "app_id = '". $apID. "'";

		$selectedData1 = $DBOb->select($table1, $fields1, $condition1);

		if(!empty($selectedData1)) {
			foreach ($selectedData1 as $row) {
				$aID = $row[0];
			}

			$table2 = "applicant";
			$fields2 = ["full_name", "dob", "nic", "address", "district", "occupation"];
			$condition2 = "a_id = '". $aID. "'";

			$selectedData2 = $DBOb->select($table2, $fields2, $condition2);

			if(!empty($selectedData2)) {
				foreach ($selectedData2 as $row) {
					$fullName = $row[0];
					$dob = $row[1];
					$nic = $row[2];
					$address = $row[3];
					$district = $row[4];
					$occupation = $row[5];
				}

				$list = ['fullName'=>$fullName, 'dob'=>$dob, 'nic'=>$nic, 'address'=>$address, 'district'=>$district, 'occupation'=>$occupation];
			}

			/* ****** Gun Details ****** */

			$table3 = "guns_posse";
			$fields3 = ["acq_date", "type_nbr", "licence_no"];
			$condition3 = "a_id = '". $aID. "'";

			$selectedData3 = $DBOb->select($table3, $fields3, $condition3);

			if(!empty($selectedData3)) {
				foreach ($selectedData3 as $row) {
					$acqDate = $row[0];
					$typeNbr = $row[1];
					$licenceNo = $row[2];

					$list2[] = ['acqDate'=>$acqDate, 'typeNbr'=>$typeNbr, 'licenceNo'=>$licenceNo];
				}

				$list['gunDetails'] = $list2;
			}

			$encodedList = json_encode($list);
			echo $encodedList;
		}
	}



	function __construct() {
		$this->includeDB();
		$this->getData();
		$this->autoFill();
	}
}

new AutoFillPermit();

?>