<!DOCTYPE html>
<html lang=en>
    <head>
        <title>Pay</title>
        <link rel="stylesheet" type="text/css" href="../cssFile/style.css">
    </head>
    <body>
        <h1 style = "text-align:center; font-family:Times New roman; font-size: 24px;">Pay information</h1>
        <form action="check.php" method="post" > 
        <table border="0" align="center"> 
            <tr>
                 <td >Credit Card Number:</td> 
                 <td><input type="text" name="number" required="required"></td>  
            </tr>
            <tr>
                 <td >Credit Card password:</td> 
                 <td><input type="password" name="password" required="required"></td>  
            </tr>
            <tr> <td colspan="2" align="center" style="color:red;font-size:10px;"> 
            <?php $err = isset($_GET["err"]) ? $_GET["err"] : "";
                  switch($err){
                      case 1:
                      echo "Incorrect card number or password";
                      break;
                      
                      case 2:
                      echo "The Card number or password cannot be empty!";
                      break;
                    }  ?>
                    </td> </tr> 
        </table>
        </br>
            <div style="text-align:center;vertical-align:middel;">
                <input type="submit" value="pay">
            <div>
        </form>
        </br>
    
    <form action="../shoppingcart/cart.php" align = center>
        <input type="submit" value="Back" id = "back">
	</form>
    </body>
</html>