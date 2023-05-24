<!DOCTYPE html>
<html>
<head>
<title>log out</title>
<link rel="stylesheet" type="text/css" href="../cssFile/style.css">
<meta name="content-type";
 charset="UTF-8">
</head>
<body> 
<?php
	if($_GET['action']=="logout"){
		header('Refresh:3; url="../webPages/index.php"');
		session_start();
		setcookie("cookiename", NULL);
		session_unset();
		session_destroy();
        echo "<br/>&nbsp&nbsp&nbsp&nbsp&nbspLog out successfully<br/>";
		echo "&nbsp&nbsp&nbsp&nbsp&nbspReturn to home page in 3 seconds";
	}
?>
</html>
