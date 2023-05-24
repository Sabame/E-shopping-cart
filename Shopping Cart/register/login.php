<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="../cssFile/style.css">
        <meta name="content-type"; charset="UTF-8">
    </head>
    <body> 
        <form action="../webPages/index.php">
            <input type="submit" value="home page" id = "home page">
	    </form>

        <div class="content" align="center"> 
        <!--head-->
        <div class="header"> <h1>Login page</h1> </div> 
        <!--middle--> 
        <div class="middle">
            <form id="loginform" action="loginaction.php" method="post"> 
            <table border="0"> 
            <tr> 
                <td>Username：</td> 
                <td> <input type="text" id="name" name="username" required="required" value=""> </td>
            </tr> 
        
            <tr> <td>Password：</td> <td><input type="password" id="password" name="password"></td> </tr> 
            <tr>
                <td colspan="2" align="center" style="color:red;font-size:10px;"> <!--return information--> 
                    <?php
                    $err = isset($_GET["err"]) ? $_GET["err"] : "";
                    switch($err){
                      case 1:
                      echo "Incorrect username or password";
                      break;
                      
                      case 2:
                      echo "The username or password cannot be empty!";
                      break;
                    }  
                    ?>
                </td>
            </tr> 
            <tr>
                <td colspan="2" align="center"> 
                <input type="submit" id="login" name="login" value="login" style = "margin-top: 5px;"> <input type="reset" id="reset" 
                name="reset" value="reset">
                </td>
            </tr> 
            <tr> 
            <td colspan="2" align="center"> No account yet. Go <a href="register.php">register</a>.</td>
            </tr> 
            </table> 
            </form> 
        </div> 

        </br>
        </br>
        </br>
        <div class="footer"> <small> &copy; 2023 by Joe & Crawford </div> </div>
    </body>
</html>
