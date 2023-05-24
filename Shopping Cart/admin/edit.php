<!DOCTYPE html>
<html>
    <head>
        <title>edit</title>
        <meta charset="UTF-8">
	    <link href="../cssFile/admin.css" type="text/css" rel="stylesheet"> 
    </head>
    <body> 
    </br>
    
    <table border="2" align="center" cellpadding="16">
			<caption><h2 style = "text-align:center; font-family:Times New roman; font-size: 28px;">Manage Product</h2></caption>
			<tr>
                <th style = "text-align:center; font-family:Times New roman; font-size: 20px;">status</th>
				<th style = "text-align:center; font-family:Times New roman; font-size: 20px;">name</th>
				<th style = "text-align:center; font-family:Times New roman; font-size: 20px;">code</th>
                <th style = "text-align:center; font-family:Times New roman; font-size: 20px;">image</th>
                <th style = "text-align:center; font-family:Times New roman; font-size: 20px;">price / $</th>
                <th style = "text-align:center; font-family:Times New roman; font-size: 20px;">inventory</th>
			</tr>

    <?php
    session_start();
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
    $conn = mysqli_connect("127.0.0.1", "root", "", "user");
        if ($conn->connect_error) {
        die("fail: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM product WHERE id = $id";
	$result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

        echo "<tr>";
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".'old'."</th>";
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$row['name']."</th>";
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$row['code']."</th>";
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$row['image']."</th>";
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$row['price']."</th>";
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".$row['inventory']."</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th style = 'text-align:center; font-family:Times New roman; font-size: 18px;'>".'new'."</th>";
    ?>

    <form id="editaction" action="editaction.php" method="post">
            <th style = "text-align:center; font-family:Times New roman; font-size: 18px;">
            <input style="height: 30px; width: 240px;" type="text" name="phoneName" id="phoneName" value=<?php echo $row['name'];?>></th>
        
            <th style = "text-align:center; font-family:Times New roman; font-size: 18px;">
            <input style="height: 30px; width: 240px;" type="text" name="code" id="code" value=<?php echo $row['code'];?>></th>
        
            <th style = "text-align:center; font-family:Times New roman; font-size: 18px;">
            <input style="height: 30px; width: 240px;" type="text" name="imageLocation" id="imageLocation" value=<?php echo $row['image'];?>></th>
        
            <th style = "text-align:center; font-family:Times New roman; font-size: 18px;">
            <input style="height: 30px; width: 240px;" type="text" name="price" id="price"  onkeyup="this.value=/^\d+\.?\d{0,2}$/.test(this.value) ? this.value : this.value.substring(0,this.value.length-1)" value=<?php echo $row['price'];?>></th>
        
            <th style = "text-align:center; font-family:Times New roman; font-size: 18px;">
            <input style="height: 30px; width: 240px;" type="number" name="inventory" id="inventory" oninput="value=value.replace(/[^\d]/g,'')" value=<?php echo $row['inventory'];?>></th>
            </tr>
           
        </table>
        </br>
        </br>
        <div style="text-align:center;vertical-align:middel;">
            <input type="submit" value="submit">
        <div>
    </form>

    </br>
    <form action="manage.php" align = center>
        <input type="submit" value="Back" id = "back">
	</form>

    </body>
</html>
