<?php 
	
	function OpenCon(){
		$dbhost = "localhost:8889";
		$dbuser = "root";
		$dbpass = "root";
		$dbname = "registrationDB";

		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Connection failed: %s\n". $conn->error);

		return $conn; 
	}

	function CloseCon($conn){
		$conn -> close();
	}
?>