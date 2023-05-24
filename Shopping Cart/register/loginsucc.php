<!DOCTYPE html>
<html>
<head>
<title>log in successfully</title>
<link rel="stylesheet" type="text/css" href="../cssFile/style.css">
<meta name="content-type";
 charset="UTF-8">
</head>
<body> 
    <div> 
    <?php
    // $Id:$ //start session
    session_start(); //declare variables 
    $username = isset($_SESSION['user']) ? $_SESSION['user'] : ""; //judge is session is empty
    $time = isset($_SESSION['time']) ? $_SESSION['time'] : "";
    
    if (!empty($username)) { //if login
    ?> 
        <h1>&nbsp&nbsp&nbsp Log in successfully！</h1> 
        <br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Welcome！
    
        <?php 
        echo $username;
        ?> 
    
        <br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    
        <?php 
        echo "Time: "; echo $time
        ?> 
        
        <br/>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp go to <a href="../webPages/index.php">home page</a> <!--jump to home page-->
    
    <?php
    } 
    
    else  //not log in 
        echo "Sorry, you have no access.";
    ?>
    </div>
</body>
</html>


