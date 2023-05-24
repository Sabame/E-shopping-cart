<!DOCTYPE html>
<html lang=en>
    <head>
        <title>Check</title>
        <link rel="stylesheet" type="text/css" href="../cssFile/style.css">
    </head>
    <body>
    <?php
        session_start();
        $number = $_POST['number'];
        $password = $_POST['password'];

        $conn = mysqli_connect("127.0.0.1", "root", "", "user");
        if ($conn->connect_error) {
            die("fail: " . $conn->connect_error);
        } 

        $sql = "SELECT * FROM bank WHERE number = '$number' AND password = '$password'";
	    $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        if ($number == $row['number'] && $password == $row['password']) { 
            if($_SESSION['whole'] > $row['balance']){
                echo "</br>";
                echo "</br>";
                echo "</br>";
                echo "<h3 style = 'text-align:center;'>Your balance is not enough!<h3>";
                ?>
                 </br>
                <form action="pay.php" align = center>
                    <input type="submit" value="Back" id = "back">
	            </form>
                <?php
            }
            else{
                $rest = $row['balance'] - $_SESSION['whole'];
                $_SESSION['rest'] = $rest;
                $_SESSION['number'] = $row['number'];
                mysqli_query($conn,"UPDATE bank SET balance = '$rest'
                WHERE number = $number AND password = $password");
                header("Location:report.php?err=1");
                ?>

                <?php
            }
        }
        else { 
            //uncorrect username or password, err is 1
            header("Location:pay.php?err=1");
        } 
        
    ?>
    </body>
</html>