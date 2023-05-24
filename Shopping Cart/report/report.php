<!DOCTYPE html>
<html>
    <head>
        <title>report</title>
        <link rel="stylesheet" type="text/css" href="../cssFile/style.css">
        <meta name="content-type"; charset="UTF-8">
    </head>
    <body>

    <form action="../webPages/index.php">
        <input type="submit" value="home page" id = "home page">
	</form>

    </br>

    <table border="2" align="center" cellpadding="16">
			<caption><h2 style = "text-align:center; font-family:Times New roman; font-size: 28px;">Report</h2></caption>
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

    $sql = "select * from temp";
	$result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    $phoneArr = '';
    $quantityArr = '';
    $priceArr = '';
    $totalArr = 0;

    while($row){
        $phone = $row['phone'];
        $code = $row['code'];
        $price = $row['price'];
        $quantity = $row['quantity'];
		while($row = mysqli_fetch_array($result)){           
            if($row['code'] == $code){
                $quantity += $row['quantity'];
            }
        }

        $customer = $_SESSION['user'];
        date_default_timezone_set("Asia/Shanghai");
        $time = date('Y-m-d h:i a');
        $sql_insert = "INSERT INTO transaction(phone,quantity,price,customer,time) 
                       VALUES('$phone','$quantity','$price','$customer','$time')"; 
        mysqli_query($conn, $sql_insert);
        $Total_price = $quantity * $price;
        echo "<tr>";
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$phone."</th>";
        $phoneArr = $phoneArr.'<br>'.$phone;
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$quantity."</th>";
        $quantityArr = $quantityArr.'<br>'.$quantity;
        echo "<th style = 'text-ali gn:center; font-family:Times New roman; font-size: 18px;'>".$price."</th>";
        $priceArr = $priceArr.'<br>'.$price;
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$customer."</th>";
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$Total_price."</th>";
        $totalArr = $totalArr+$Total_price;
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$time."</th>";
        echo "</tr>";
        
        $sql2 = "SELECT inventory FROM product WHERE code='$code'";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_array($result2);
        
        $inventory =  $row2['inventory'] - $quantity;
        mysqli_query($conn,"UPDATE product SET inventory='$inventory' WHERE code='$code'");

        ?>
        
        </br>
        
        <?php
        $sql_remove = "DELETE FROM temp WHERE code = '$code'";
		mysqli_query($conn, $sql_remove);
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
    }

    $whole = $_SESSION['whole'];
    $rest = $_SESSION['rest'];
    $number = $_SESSION['number'];

        ?>
    </table>
    </br>
    </br>
    </br>

    <table border="2" align="center" cellpadding="16">
			<caption><h2 style = "text-align:center; font-family:Times New roman; font-size: 28px;">Credit card</h2></caption>
			<tr>
				<th style = "text-align:center; font-family:Times New roman; font-size: 20px;">Card number</th>
                <th style = "text-align:center; font-family:Times New roman; font-size: 20px;">Cost / $</th>
				<th style = "text-align:center; font-family:Times New roman; font-size: 20px;">Balance / $</th>
			</tr>

    <?php
    echo "<tr>";
    echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$number."</th>";
    echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$whole."</th>";
    echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$rest."</th>";
    echo "</tr>";
    ?>
    </table>
</body>
</html>
