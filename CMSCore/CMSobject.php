<?php
namespace CMSCore;
use mysqli;
include_once 'DatabaseHandler.php';
class CMSObject implements DatabaseHandler{
	public $conn;
	public function establishConnection(){
		// configuration of the database
		include 'config.php';
		// Create connection
		$this->conn = new mysqli($servername, $username, $password,$dbname);

		// Check connection
		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->$conn->connect_error);
			throw new Exception('SQL Connection Error'.$sql.$this->$conn->error);
		}
	}
	public function executeQuerry($sql){
	    $result = $this->conn->query($sql);
	    if ($result == TRUE){
			//$result = $this->conn->query($sql);
			echo "Success!";
			$response = 'OK';
			$this->conn->close();
			//$conn.close();
		    $responseArray = array("responseMessage" => $response,"responseContent" => $result);
			return $responseArray;
		} else {
			// throw new Exception('SQL Querry Error'.$sql.$this->conn->error);
			$response = ['Connection Error',$this->conn->error];
			$result = $this->conn->query($sql);
			$this->conn->close();
			//$conn.close();
			return $responseArray  = array("responseMessage" => $response,"responseContent" => $result);
		}
	}
	public function createObject($type,$objectName,$arguments) {
		$this->establishConnection();
		// values need to be separated by "','" and concatanated by .
		$sql= "CREATE $type $objectName ($arguments);";
		echo $sql.'</br>';
		$this->executeQuerry($sql);
	}
	public function saveObject ($type,$values) {
		$this->establishConnection();		
		// values need to be separated by "','" and concatanated by .
		$sql= "INSERT INTO $type VALUES ('$values');";
		echo $sql;
		return $response = $this->executeQuerry($sql);
	}
	public function deleteObject($id,$type){
		$this->establishConnection();
		$sql = "DELETE FROM $type WHERE id ='$id' ";
		$this->executeQuerry($sql);
	}
	public function editObject($id,$type,$arguments,$values){
		$this->establishConnection();
		for ($i=0;$i<count($arguments);$i++) {
			$sql = "UPDATE $type SET $arguments[$i] = '$values[$i]' WHERE id='$id'";
			$this->executeQuerry($sql);
		}
	}
	public function readObject($sql){
		$this->establishConnection();
		//echo $sql;
		$resultAll = $this->executeQuerry($sql);
		$result = $resultAll['responseContent'];
		$result_array = array();
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		        echo $row['cus_username'].$row['cus_pass'];
		        array_push($result_array, $row);
		    }
		}
		print_r($resultAll);
		return $result_array;
	}
	public function sanitizeInputs($values) {
	    return null;
	}
	private function prepareValues($values) {
	    foreach ($values as $key => $value) {
	        $this->prepare("INSERT INTO $type VALUES ('$values');");
	    }
	}

}
?>
