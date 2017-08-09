<?php
class showApplications {
	public $DBOb;

	function includeDB() {
		include_once("dbOperations.php");
		$DBObject = new DBOperations();

		$this->DBOb = $DBObject;
	}



	function newApplications($userLevel) {
		$DBOb = $this->DBOb;

		$table = "application";

		if($userLevel == 2) {
			$fields = ["app_id", "a_id", "category", "authentications", "ad_sec_ap_rej_date"];
			$condition = "sec_approval = '0' AND ad_sec_approval = '1'";
		} elseif ($userLevel == 3) {
			$fields = ["app_id", "a_id", "category", "authentications", "submission_date"];
			$condition = "ad_sec_approval = '0'";
		}
		

		$table2 = "applicant";
		$fields2 = ["full_name"];

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach($selectedData as $row) {
				$appID = $row[0];
				$aID = $row[1];
				$category = $row[2];
				$authentications = $row[3];
				$subApproveRejDate = $row[4];

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
				} elseif ($authentications == 0) {
					$authentications1 = "No";
				}

				$condition2 = "a_id = '". $aID. "'";
				$selectedData2 = $DBOb->select($table2, $fields2, $condition2);

				echo '<tr onclick = "window.location=\'applicationDetailsForm.php?id='. $appID. '\';">
						<td>'. $appID. '</td>
						<td>'. $selectedData2[0][0]. '</td>
						<td>'. $category1. '</td>
						<td>'. $authentications1. '</td>
						<td>'. $subApproveRejDate. '</td>
					</tr>';
			}
		}
	}



	function approvedApplications($userLevel) {
		$DBOb = $this->DBOb;

		$table = "application";

		if($userLevel == 2) {
			$fields = ["app_id", "a_id", "category", "authentications", "ad_sec_ap_rej_date", "sec_ap_rej_date"];
			$condition = "sec_approval = '1'";
		} elseif ($userLevel == 3) {
			$fields = ["app_id", "a_id", "category", "authentications", "submission_date", "ad_sec_ap_rej_date"];
			$condition = "ad_sec_approval = '1'";
		}
		

		$table2 = "applicant";
		$fields2 = ["full_name"];

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach($selectedData as $row) {
				$appID = $row[0];
				$aID = $row[1];
				$category = $row[2];
				$authentications = $row[3];
				$submissionDate = $row[4];
				$approveRejDate = $row[5];

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
				} elseif ($authentications == 0) {
					$authentications1 = "No";
				}

				$condition2 = "a_id = '". $aID. "'";
				$selectedData2 = $DBOb->select($table2, $fields2, $condition2);

				echo '<tr>
						<td>'. $appID. '</td>
						<td>'. $selectedData2[0][0]. '</td>
						<td>'. $category1. '</td>
						<td>'. $authentications1. '</td>
						<td>'. $submissionDate. '</td>
						<td>'. $approveRejDate. '</td>
					</tr>';
			}
		}
	}



	function rejectedApplications($userLevel) {
		$DBOb = $this->DBOb;

		$table = "application";

		if($userLevel == 2) {
			$fields = ["app_id", "a_id", "category", "authentications", "ad_sec_ap_rej_date", "sec_ap_rej_date"];
			$condition = "sec_approval = '2'";
		} elseif ($userLevel == 3) {
			$fields = ["app_id", "a_id", "category", "authentications", "submission_date", "ad_sec_ap_rej_date"];
			$condition = "ad_sec_approval = '2'";
		}
		

		$table2 = "applicant";
		$fields2 = ["full_name"];

		$selectedData = $DBOb->select($table, $fields, $condition);

		if(!empty($selectedData)) {
			foreach($selectedData as $row) {
				$appID = $row[0];
				$aID = $row[1];
				$category = $row[2];
				$authentications = $row[3];
				$submissionDate = $row[4];
				$approveRejDate = $row[5];

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
				} elseif ($authentications == 0) {
					$authentications1 = "No";
				}

				$condition2 = "a_id = '". $aID. "'";
				$selectedData2 = $DBOb->select($table2, $fields2, $condition2);

				echo '<tr>
						<td>'. $appID. '</td>
						<td>'. $selectedData2[0][0]. '</td>
						<td>'. $category1. '</td>
						<td>'. $authentications1. '</td>
						<td>'. $submissionDate. '</td>
						<td>'. $approveRejDate. '</td>
					</tr>';
			}
		}
	}



	function pendingApprovalList() {}



	function __construct() {
		$this->includeDB();
	}

}

?>