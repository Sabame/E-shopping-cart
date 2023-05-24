<?php
class DBController {
	private $host = "127.0.0.1" ; 
	private $user = "root";
	private $password = "";
	private $database = "user";
	private $conn;
	function __construct() {
		$this->conn = $this->connectDB();
	}
	public function connectDB() {
		$myconn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		if (!$myconn) 
		{ die("Connection failed: " . mysqli_connect_error());}
		 //echo "Connected successfully";
		  return $myconn;
	}
	
	public function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	public function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}

	public function eleQuery($query){
		$result= mysqli_query($this->conn,$query);
		$ret = mysqli_fetch_assoc($result);
		return $ret["code"];
	}
}// end of DBController class
?>