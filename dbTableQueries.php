<?php

include_once("dbOperations.php");
$DBOb = new dbOperations();

$conn = $DBOb->con;

class dbTableQueries {	
	function fKApplication($conn) {
		$query = "ALTER TABLE application ADD FOREIGN KEY (a_id) REFERENCES applicant (a_id)";
		if(mysqli_query($conn, $query)) {
			echo "Foreign Key Application table successful";
		} else {
			echo mysqli_error($conn);
		}
	}

	function fKOffence($conn) {
		$query = "ALTER TABLE offence ADD FOREIGN KEY (a_id) REFERENCES applicant (a_id)";
		if(mysqli_query($conn, $query)) {
			echo "Foreign Key Offence table successful";
		} else {
			echo mysqli_error($conn);
		}
	}

	function fKStolenTransf($conn) {
		$query = "ALTER TABLE stolen_transferred ADD FOREIGN KEY (a_id) REFERENCES applicant (a_id)";
		if(mysqli_query($conn, $query)) {
			echo "Foreign Key Stolen/ Transfered table successful";
		} else {
			echo mysqli_error($conn);
		}
	}

	function fKGunsPossession($conn) {
		$query = "ALTER TABLE guns_posse ADD FOREIGN KEY (a_id) REFERENCES applicant (a_id)";
		if(mysqli_query($conn, $query)) {
			echo "Foreign Key Guns in possession table successful";
		} else {
			echo mysqli_error($conn);
		}
	}

	function fKOfficialWeapon($conn) {
		$query = "ALTER TABLE official_weapon ADD FOREIGN KEY (a_id) REFERENCES applicant (a_id)";
		if(mysqli_query($conn, $query)) {
			echo "Foreign Key Official Weapon table successful";
		} else {
			echo mysqli_error($conn);
		}
	}

	function fKCultivation($conn) {
		$query = "ALTER TABLE cutivation ADD FOREIGN KEY (a_id) REFERENCES applicant (a_id)";
		if(mysqli_query($conn, $query)) {
			echo "Foreign Key Cultivation table successful";
		} else {
			echo mysqli_error($conn);
		}
	}

	function fKLivestock($conn) {
		$query = "ALTER TABLE livestock ADD FOREIGN KEY (a_id) REFERENCES applicant (a_id)";
		if(mysqli_query($conn, $query)) {
			echo "Foreign Key Livestock table successful";
		} else {
			echo mysqli_error($conn);
		}
	}
	
}

$dbTblQ = new dbTableQueries;

$dbTblQ-> fKApplication($conn);
$dbTblQ-> fKOffence($conn);
$dbTblQ-> fKStolenTransf($conn);
$dbTblQ-> fKGunsPossession($conn);
$dbTblQ-> fKOfficialWeapon($conn);
$dbTblQ-> fKCultivation($conn);
$dbTblQ-> fKLivestock($conn);

?>