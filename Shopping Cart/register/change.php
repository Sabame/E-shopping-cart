<!DOCTYPE html>
<html lang=en>
    <head>
        <title>ChangePassword</title>
        <link rel="stylesheet" type="text/css" href="../cssFile/style.css">
    </head>
    <body>
    <form action="../webPages/index.php">
        <input type="submit" value="home page" id = "home page">
	</form>

    <form action="changeaction.php" method="post"> 
    <table border="0" align="center"> 
        <h2 style = "text-align:center; font-family:Times New roman; font-size: 28px;">Change Password</h2>
        <tr>
            <td>Username</td>
            <td><input type="text" id="username" name="username" required="required"></td> 
        </tr> 
        <tr>
            <td>New Password：</td>
            <td><input type="password" id="password" name="password" required="required"></td> 
        </tr> 
        <tr>
            <td>Repeat Password：</td>
            <td><input type="password" id="re_password" name="re_password" required="required"></td>
        </tr> 
        <tr> 
            <td colspan="2" align="center"> 
            <input type="submit" id="change" name="change" value="change"> </td> 
        </tr> 

    </table>
    </form>

    </body>
</html>