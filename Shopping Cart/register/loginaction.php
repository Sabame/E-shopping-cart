<?php
// $Id:$ //decare variables
$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$remember = isset($_POST['remember']) ? $_POST['remember'] : ""; //judge if the username and password is empty
if (!empty($username) && !empty($password)) { //establish connection 
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'user'); //connect to SQL database 
    $sql_select = "SELECT username,password FROM usertext WHERE username = '$username' AND password = '$password'"; //execute SQL statement
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); //judge if the username and password is correct 
    if ($username == $row['username'] && $password == $row['password']) 
    { //select "remember me"
        session_start(); //start session
        $_SESSION['user'] = $username; //write into session 
        date_default_timezone_set("Asia/Shanghai");
        $date = date('Y-m-d h:i:s a');
        $_SESSION['time'] = $date;
        $ip = $_SERVER['REMOTE_ADDR'];
        $sql_logs = "INSERT INTO logs(username,ip,date) VALUES('$username','$ip','$date')";
        mysqli_query($conn, $sql_logs);;
        //to loginsucc.php page
        header("Location:loginsucc.php"); //close databake, turn to loginsucc.php
        mysqli_close($conn);
    }
    else 
    { 
        //uncorrect username or password, err is 1
        header("Location:login.php?err=1");
    }
} else { //empty username or password，err is 2
    header("Location:login.php?err=2");
} ?>
