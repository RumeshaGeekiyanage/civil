<?php

class ShowApplicationsClerk {
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
		$condition = "ad_sec_approval <> '2' AND sec_approval = '0'";

		$table2 = "applicant";
		$fields2 = ["full_name"];

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$appID = $row[0];
				$aID = $row[1];
				$category = $row[2];
				$authentications = $row[3];
				$adSecAproval = $row[4];
				$secApproval = $row[5];

				$condition2 = "a_id = '". $aID. "'";
				$selectedData = $DBOb->select($table2, $fields2, $condition2);

				$applicantName = $selectedData[0][0];

				if($category == 1) {
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
				}

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


	function pendingDocuments() {
		$DBOb = $this->DBOb;

		$table = "application";
		$fields = ["app_id", "a_id", "category","sec_ap_rej_date", "authentications", "ad_sec_approval", "sec_approval"];
		$condition = "ad_sec_approval = '2' AND sec_approval = '2'";

		$table2 = "applicant";
		$fields2 = ["full_name"];

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$appID = $row[0];
				$aID = $row[1];
				$category = $row[2];
				$date = $row[3];
				$authentications = $row[4];
				//$adSecAproval = $row[5];
				//$secApproval = $row[6];

				$condition2 = "a_id = '". $aID. "'";
				$selectedData = $DBOb->select($table2, $fields2, $condition2);

				$applicantName = $selectedData[0][0];

				if($category == 1) {
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


				/*if($adSecAproval == 0) {
					$possession = "Additional Secretary";
				}

				if($adSecAproval == 1 && $secApproval == 0) {
					$possession = "Secretary";
				}*/

				echo '<tr>
						<td>'. $appID. '</td>
						<td>'. $applicantName. '</td>
						<td>'. $category1. '</td>
						<td>'. $date. '</td>
						<td>'. $authentications1. '</td>
					</tr>';
			}
		}
	}






	function approvedList() {
		$DBOb = $this->DBOb;

		$table = "application";
		$fields = ["app_id", "a_id", "category", "ad_sec_ap_rej_date"];
		$condition = "sec_approval = '1'";

		$table2 = "applicant";
		$fields2 = ["full_name"];

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$appID = $row[0];
				$aID = $row[1];
				$category = $row[2];
				$secApproveDate = $row[3];

				$condition2 = "a_id = '". $aID. "'";
				$selectedData = $DBOb->select($table2, $fields2, $condition2);

				$applicantName = $selectedData[0][0];

				if($category == 1) {
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

				echo '<tr>
						<td>'. $appID. '</td>
						<td>'. $applicantName. '</td>
						<td>'. $category1. '</td>
						<td>'. $secApproveDate. '</td>
						<td><button type="button" class="btn btn-default btn-sm" onclick = "postedReturned(\'p\', '. $appID. ');">Posted</button></td>
					</tr>';
			}
		}
	}



	function rejectedList() {
		$DBOb = $this->DBOb;

		$table = "application";
		$fields = ["app_id", "a_id", "category", "sec_ap_rej_date"];
		$condition = "sec_approval = '2'";

		$table2 = "applicant";
		$fields2 = ["full_name"];

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$appID = $row[0];
				$aID = $row[1];
				$category = $row[2];
				$rejectedDate = $row[3];

				$condition2 = "a_id = '". $aID. "'";
				$selectedData = $DBOb->select($table2, $fields2, $condition2);

				$applicantName = $selectedData[0][0];

				if($category == 1) {
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

				echo '<tr>
						<td>'. $appID. '</td>
						<td>'. $applicantName. '</td>
						<td>'. $category1. '</td>
						<td>'. $rejectedDate. '</td>
					</tr>';
			}
		}
	}



	function postedList() {
		$DBOb = $this->DBOb;

		$table = "application";
		$fields = ["app_id", "a_id", "category", "sec_ap_rej_date", "posted_date"];
		$condition = "posted = '1' AND returned = '0'";

		$table2 = "applicant";
		$fields2 = ["full_name"];

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$appID = $row[0];
				$aID = $row[1];
				$category = $row[2];
				$approvedDate = $row[3];
				$postedDate = $row[4];

				$condition2 = "a_id = '". $aID. "'";
				$selectedData = $DBOb->select($table2, $fields2, $condition2);

				$applicantName = $selectedData[0][0];

				if($category == 1) {
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

				echo '<tr>
						<td>'. $appID. '</td>
						<td>'. $applicantName. '</td>
						<td>'. $category1. '</td>
						<td>'. $approvedDate. '</td>
						<td>'. $postedDate. '</td>
						<td><button type="button" class="btn btn-default btn-sm" onclick = "postedReturned(\'r\', '. $appID. ');">Returned</button></td>
					</tr>';
			}
		}
	}



	function returnedList() {
		$DBOb = $this->DBOb;

		$table = "application";
		$fields = ["app_id", "a_id", "category", "posted_date", "returned_date"];
		$condition = "returned = '1'";

		$table2 = "applicant";
		$fields2 = ["full_name"];

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach ($selectedData as $row) {
				$appID = $row[0];
				$aID = $row[1];
				$category = $row[2];
				$postedDate = $row[3];
				$returnedDate = $row[4];

				$condition2 = "a_id = '". $aID. "'";
				$selectedData = $DBOb->select($table2, $fields2, $condition2);

				$applicantName = $selectedData[0][0];

				if($category == 1) {
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

				echo '<tr onclick = "window.location=\'permitToPurchaseForm.php?apID='. $appID. '\';">
						<td>'. $appID. '</td>
						<td>'. $applicantName. '</td>
						<td>'. $category1. '</td>
						<td>'. $postedDate. '</td>
						<td>'. $returnedDate. '</td>
					</tr>';
			}
		}
	}



	function __construct() {
		$this->includeDB();
	}
}

?>