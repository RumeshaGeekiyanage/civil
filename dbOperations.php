<?php 

class DBOperations {
	public $con;

	function connect() {
		$hostname = "localhost";
		$username = "root";
		$dbPassword = "";
		$dbName = "civil";

		$conn = mysqli_connect($hostname, $username, $dbPassword, $dbName);

		if(!$conn) {
			die("Couldn't connect to mySQL server. ". mysqli_connect_error());
		} else {
			$this->con = $conn;
			// echo "connection Successfull";
		}
	}



	function dBClose() {
		$conn = $this->con;

		if($conn) {
			mysqli_close($conn);
		}
	}



	function insert($table, $fields, $values) { 	// Insert fields and values as arrays
		$conn = $this->con;
		$implodedFields = implode(",", $fields);
		$implodedValues = implode("','", $values);

		$query = "INSERT INTO $table (".$implodedFields.") VALUES ('".$implodedValues."')";

		if(mysqli_query($conn, $query)) {
			echo "Insert successfull";
		} else {
			echo mysqli_error($conn);
		}
	}



	function select($table, $fields, $condition = false) {
		$conn = $this->con;

		$implodedFields = implode(",", $fields);

		if($condition == false) {
			$query = "SELECT $implodedFields FROM $table";
		} else {
			$query = "SELECT $implodedFields FROM $table WHERE $condition";
			//echo $query;
		}


		$result = mysqli_query($conn, $query);
		//echo $result;

		if(mysqli_num_rows($result) > 0) {
			$a = 0;
			while($row = mysqli_fetch_array($result)) {
				for($i = 0; $i < count($fields); $i++) {	// SELECT ("*") doesn't work because, count of the $field is 1 when "*" is used.
					$arrData[$a][$i] = $row[$i];
				}

				$a++;
			}

			return $arrData;
		}
	}



	function update($table, $fields, $values, $condition = false) {
		$conn = $this->con;
		$fieldValueArray = array();

		for($i = 0; $i < count($fields); $i++) {
			$x = $fields[$i];
			$y = $values[$i];

			$z = $x. "='". $y. "'";
			$fieldValueArray[$i] = $z;
		}

		$implodedFieldsValues = implode(",", $fieldValueArray);

		if($condition == false) {
			$query = "UPDATE $table SET $implodedFieldsValues";
		} else {
			$query = "UPDATE $table SET $implodedFieldsValues WHERE $condition";
		}

		if(mysqli_query($conn, $query)) {
			// echo "Update successfull";
		} else {
			echo mysqli_error($conn);
		}
	}



	function delete($table, $condition = false) { // Not completed
		$conn = $this->con;

		if($condition == false) {
			$query = "DELETE FROM $table";
		} else {
			$query = "DELETE FROM $table WHERE $condition";
		}

		if(mysqli_query($conn, $query)) {
			echo "Delete successfull";
		} else {
			echo mysqli_error($conn);
		}
	}



	function truncate($table) {
		$conn = $this->con;

		$query = "TRUNCATE TABLE $table";

		if(mysqli_query($conn, $query)) {
			echo "Truncate successfull";
		} else {
			echo mysqli_error($conn);
		}
	}



	/* ****** Constructor ****** */

	function __construct() {
		$this->connect();
	}
}
	
?>