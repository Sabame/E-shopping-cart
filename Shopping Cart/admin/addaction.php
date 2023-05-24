<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$servername = "127.0.0.1";
		$username = "root";
		$password = "";
		$dbName = "user" ;
		
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbName);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());}
		// sql to insert data
		$phoneName=$_POST["phoneName"];
		$code=$_POST["code"];
		$price=$_POST["price"];
		$imageLocation=$_POST["imageLocation"];
		$inventory=$_POST["inventory"];


		
		$sql = "INSERT INTO product (name, code, price, image,inventory)
		VALUES ('$phoneName', '$code', '$price', '$imageLocation', '$inventory')";   // dont forget to close the quotation in the last raw
		
		
		if ($conn->query($sql) === TRUE) {
			echo "</br>";
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp New record created successfully";
		} else {
			echo "</br>";
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		$conn->close();
		
			}
	?>
	<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp go to <a href="../admin/manage.php">manage page</a>