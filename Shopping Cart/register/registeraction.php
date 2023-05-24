<?php
// $Id:$ //declare variables
$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$re_password = isset($_POST['re_password']) ? $_POST['re_password'] : "";
$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
$address = isset($_POST['address']) ? $_POST['address'] : "";

if ($password == $re_password) { //establish connection
    $conn = mysqli_connect("127.0.0.1", "root", "", "user"); //perpare SQL statement, query  username
    $sql_select = "SELECT username FROM usertext WHERE username = '$username'"; //excute SQL statement
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); //Determine if the user name already exists
    
    if ($username == $row['username']) { //Username already exists. Display prompt message
        header("Location:register.php?err=1");
    } 
    
    else { //User name does not exist, insert data. Prepare SQL statement
        $sql_insert = "INSERT INTO usertext(username,password,gender,email,phone,address) 
        VALUES('$username','$password','$gender','$email','$phone','$address')"; //excute SQL statement
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } //close database
    mysqli_close($conn);
} 

else {
    header("Location:register.php?err=2");
} 

?>
