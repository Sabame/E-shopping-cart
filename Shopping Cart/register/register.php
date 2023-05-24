<!DOCTYPE html>
<html>

<head><title>Sign up</title>
<link rel="stylesheet" type="text/css" href="../cssFile/style.css">
<meta name="content-type"; charset="UTF-8">
</head>

<script type="text/javascript">
  function checkpwd(){
  var password=document.getElementById("password"); //Gets the password box value
  var re_password=document.getElementById("re_password");
  if(password.value.length<6){
    alert("Password length must be longer than six characters!");
    return false;
  }
  if(password.value != re_password.value){
    alert("The password does not match the duplicate password!");
    return false;
  }
  return true;
}
</script>

<body> 
<div>
  <a href="../webPages/index.php">Back to Home</a>
</div>
<div class="content" align="center"> <!--head--> 
<div class="header"> <h1>Register Page</h1> </div> <!--middle--> 
<div class="middle"> 

<form method="post" name ="theform" action="registeraction.php" onsubmit="return checkpwd();"> <table border="0"> 
<tr>
  <td>Username：</td> 
  <td><input type="text" id="id_name" name="username" required="required"></td> 
</tr>
<tr>
  <td>Password：</td>
  <td><input type="password" id="password" name="password" required="required"></td> 
</tr>
<tr>
  <td>Repeat Password：</td>
  <td><input type="password" id="re_password" name="re_password" required="required"></td> 
</tr> 
<tr>
  <td>Gender：</td>
  <td> <input type="radio" id="gender" name="gender" value="man">male <input type="radio" id="gender" name="gender" value="woman">female </td>
</tr>
<tr>
  <td>Email：</td>
  <td><input type="email" id="email" name="email" required="required"></td>
</tr>
<tr> 
  <td>Phone Number:</td>
  <td><input type="text" id="phone" name="phone" required="required" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength=11></td>
</tr>
<tr> 
  <td>Address：</td>
  <td><input type="text" id="address" name="address" required="required"></td>
</tr> 
<tr>
  <td colspan="2" align="center" style="color:red;font-size:10px;"> <!--remind information--> 
  <?php
    $err = isset($_GET["err"]) ? $_GET["err"] : "";
    switch ($err) {
    case 1:
      echo "Username already exists!";
      break;
    case 2:
      echo "The password does not match the duplicate password!";
      break;
    case 3:
      echo "registered successfully! Turn to login in 3 seconds.";
      header('Refresh:2; url="login.php"');
      break;
    } 
 ?> 
  </td>
</tr>
<tr>
  <td colspan="2" align="center">
    <input type="submit" id="register" name="register" value="sign up"/>
    <input type="reset" id="reset" name="reset" value="reset"> 
  </td>
</tr>
</form> 

<tr> 
  <td colspan="2" align="center"> 
    If you already have an account, go to <a href="login.php">login</a>. 
  </td>
</tr>

</table>
</form>
</div> 


<div class="footer"> <small> &copy; 2023 by Joe & Crawford </div> </div></body>
</html>


