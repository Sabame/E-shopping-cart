<!DOCTYPE html>
<html lang=en>
    <head>
        <title>ChangePassword</title>
        <link rel="stylesheet" type="text/css" href="../cssFile/style.css">
    </head>
    <body>
    <?php
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $re_password = $_POST['re_password'];

        if ($password == $re_password) {
            $conn = mysqli_connect("localhost", "root", "", "user");
            if ($conn->connect_error) {
                die("fail: " . $conn->connect_error);
            } 
            $sql = "SELECT * FROM usertext";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result)){
                if($row['username'] == $username){
                    mysqli_query($conn,"UPDATE usertext SET password = '$password'");
                }
            }
            ?>
        <br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Change Password Successful！
        <br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp go to <a href="../webPages/index.php">home page</a> 
            <?php
        }

        else{
            echo "Incorrect username or unvalid password";
        ?>
        <br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Incorrect username or unvalid password
        <br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp go to <a href="../webPages/index.php">home page</a>
        <?php
        }
        ?>
       
    </body>
</html>