<!DOCTYPE html>
<html>
    <head>
        <title>manage</title>
        <link rel="stylesheet" type="text/css" href="../cssFile/adminlog.css">
        <meta name="content-type"; charset="UTF-8">
    </head>
    <body> 

    </br>
    </br>
    </br>
    </br>

    <table border="2" align="center" cellpadding="16">
			<caption><h2 style = "text-align:center; font-family:Times New roman; font-size: 28px;">Manage Product</h2></caption>
			<tr>
				<th style = "text-align:center; font-family:Times New roman; font-size: 20px;">id</th>   
				<th style = "text-align:center; font-family:Times New roman; font-size: 20px;">name</th>
				<th style = "text-align:center; font-family:Times New roman; font-size: 20px;">code</th>
                <th style = "text-align:center; font-family:Times New roman; font-size: 20px;">image</th>
                <th style = "text-align:center; font-family:Times New roman; font-size: 20px;">price / $</th>
                <th style = "text-align:center; font-family:Times New roman; font-size: 20px;">inventory</th>
                <th style = "text-align:center; font-family:Times New roman; font-size: 20px;">operation</th>
			</tr>
            
    <?php
    $conn = mysqli_connect("127.0.0.1", "root", "", "user");
        if ($conn->connect_error) {
        die("fail: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM product";
	$result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$row['id']."</th>";
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$row['name']."</th>";
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$row['code']."</th>";
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$row['image']."</th>";
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$row['price']."</th>";
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$row['inventory']."</th>";
        echo "<td>  
                <a href='delete.php? id={$row['id']}'>delete</a>
                <a href='edit.php? id={$row['id']}'>edit</a>
		</td>";
        echo "</tr>";
    }
        ?>
    </table>

    </br>
    <form action="add.php" align = center>
        <input type="submit" value="Add Product" id = "addproduct">
	</form>

    </br>
    <form action="choose.php" align = center>
        <input type="submit" value="Back" id = "back">
	</form>

    


    </body>
</html>
