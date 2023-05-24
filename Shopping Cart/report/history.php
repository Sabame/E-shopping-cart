<!DOCTYPE html>
<html>
    <head>
        <title>history</title>
        <link rel="stylesheet" type="text/css" href="../cssFile/style.css">
        <meta name="content-type"; charset="UTF-8">
    </head>
    <body> 

    <form action="../webPages/index.php">
        <input type="submit" value="home page" id = "home page">
	</form>
    </br>
    </br>
    </br>

    <table border="2" align="center" cellpadding="16">
			<caption><h2 style = "text-align:center; font-family:Times New roman; font-size: 28px;">History Transaction</h2></caption>
			<tr>
				<th style = "text-align:center; font-family:Times New roman; font-size: 20px;">Phone</th>   
				<th style = "text-align:center; font-family:Times New roman; font-size: 20px;">Quantity</th>
				<th style = "text-align:center; font-family:Times New roman; font-size: 20px;">Price / $</th>
                <th style = "text-align:center; font-family:Times New roman; font-size: 20px;">Customer</th>
                <th style = "text-align:center; font-family:Times New roman; font-size: 20px;">Total price / $</th>
                <th style = "text-align:center; font-family:Times New roman; font-size: 20px;">Time</th>
			</tr>
            
    <?php
    session_start();
    $conn = mysqli_connect("127.0.0.1", "root", "", "user");
        if ($conn->connect_error) {
        die("fail: " . $conn->connect_error);
    }

    $user = $_SESSION['user'];
    $sql = "SELECT * FROM transaction";
	$result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)){
        if($row['customer'] == $user){
            $phone = $row['phone'];
            $quantity = $row['quantity'];
            $price = $row['price'];
            $time = $row['time'];
            $Total_price = $quantity * $price;

            echo "<tr>";
            echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$phone."</th>";
            echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$quantity."</th>";
            echo "<th style = 'text-ali gn:center; font-family:Times New roman; font-size: 18px;'>".$price."</th>";
            echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$user."</th>";
            echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$Total_price."</th>";
            echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$time."</th>";
            echo "</tr>";
        }
    }     
    
    ?>
    </table>
    </body>
</html>