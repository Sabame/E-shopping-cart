<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link href="../cssFile/admin.css" type="text/css" rel="stylesheet"> 


</head>
<body>
	<h2 id="addPhone">Enter the new product's information</h2> 
	<div id="submission">
		<form id="information" action="addaction.php" method="post">
			<table id="table" border="2" cellpadding="20" align = "center">
				<tr class="line">
					<td><label for="phoneName">Phone Name</label></td>
					<td><input style="height: 30px; width: 280px;" type="text" name="phoneName" id="phoneName" placeholder="Please enter the name of the product name"></td>
				</tr>
				<tr>
					<td><label for="code">Code</label></td>
					<td><input style="height: 30px; width: 280px;" type="text" name="code" id="code" placeholder="Please enter a string"></td>
				</tr>
				
				<tr>
					<td><label for="price">Unit Price($)</label></td>
					<td><input style="height: 30px; width: 280px;" type="text" name="price" id="price"  onkeyup="this.value=/^\d+\.?\d{0,2}$/.test(this.value) ? this.value : this.value.substring(0,this.value.length-1)" placeholder="Keep two decimal places"/> </td>
				</tr>
			
				<tr>
					<td><label for="imageLocation">Image Location</label></td>
					<td><input style="height: 30px; width: 280px;" type="text" name="imageLocation" id="imageLocation" placeholder="Please enter the location of the image"></td>
				</tr>
			
				<tr>
					<td><label for="inventory">inventory</label></td>
					<td><input style="height: 30px; width: 280px;" type="number" name="inventory" id="inventory" oninput="value=value.replace(/[^\d]/g,'')" placeholder="Please enter a non negative integer"></td>
				</tr>
			
			</table>
			</br>
			<input id="submit" type="submit" value="Submit" name="submit">
		</form>
		</br>
    <form action="manage.php" align = center>
        <input type="submit" value="Back" id = "back">
	</form>
	</div>




</body>
</html>