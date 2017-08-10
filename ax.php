<?php
class ShowApplications1 {
	public $DBOb;

	function includeDB() {
		include_once("dbOperations.php");
		$DBObject = new DBOperations();

		$this->DBOb = $DBObject;
	}
	
	function pendingApprovals() {
		$DBOb = $this->DBOb;

		$table = "application";
		$fields = ["app_id", "a_id", "category", "authentications", "ad_sec_approval", "sec_approval"];
		$condition = false;

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$appID = $row[0];
				$aID = $row[1];
				$category = $row[2];
				$authentications = $row[3];
				$adSecAproval = $row[4];
				$secApproval = $row[5];

				/*if($category == 1) {
					$category1 = "Agriculture";
				} elseif($category == 2) {
					$category1 = "Livestock";
				} elseif($category == 3) {
					$category1 = "Personal";
				} elseif($category == 4) {
					$category1 = "VIP";
				} elseif($category == 5) {
					$category1 = "Sport";
				}

				if($authentications == 1) {
					$authentications1 = "Yes";
				} elseif($authentications == 0) {
					$authentications1 = "No";
				}


				if($adSecAproval == 0) {
					$possession = "Additional Secretary";
				}

				if($adSecAproval == 1 && $secApproval == 0) {
					$possession = "Secretary";
				}*/

				echo '<tr>
						<td>'. $appID. '</td>
						<td>'. $applicantName. '</td>
						<td>'. $category1. '</td>
						<td>'. $authentications1. '</td>
						<td>'. $possession. '</td>
					</tr>';
			}
		}
	}
}

$a = ShowApplications1;
$a->pendingApprovals();
?>