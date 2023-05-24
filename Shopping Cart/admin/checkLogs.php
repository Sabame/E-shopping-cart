<!DOCTYPE html>
<html>
    <head>
        <title>Log</title>
        <link rel="stylesheet" type="text/css" href="../cssFile/adminlog.css">
        <meta name="content-type"; charset="UTF-8">
    </head>
    <body> 

    <table border="2" align="center" cellpadding="16">
			<caption><h2 style = "text-align:center; font-family:Times New roman; font-size: 28px;">Users' Log</h2></caption>
			<tr>
				<th style = "text-align:center; font-family:Times New roman; font-size: 20px;">Username</th>
				<th style = "text-align:center; font-family:Times New roman; font-size: 20px;">IP</th>
                <th style = "text-align:center; font-family:Times New roman; font-size: 20px;">Date</th>
			</tr>    

    <?php
    $conn = mysqli_connect("127.0.0.1", "root", "", "user");
        if ($conn->connect_error) {
        die("fail: " . $conn->connect_error);
    }

    $sql = "select * from logs";
	$result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
        $username = $row['username'];
        $ip = $row['ip'];
        $date = $row['date'];
        echo "<tr>";
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$username."</th>";
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$ip."</th>";
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$date."</th>";
        echo "</tr>";  
    }
        
    ?>
    </table>

    </br>
    <form action="choose.php" align = center>
        <input type="submit" value="Back" id = "back">
	</form>
    </body>
</html>
