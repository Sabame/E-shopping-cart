<!DOCTYPE html>
<html lang=en>
    <head>
        <title>Electronic Devices Shop</title>
        <link rel="stylesheet" type="text/css" href="../cssFile/style.css">
    </head>
    <body>
        <div id="header">
            <div id = "adim">
                Administrator entry <br> <a href="../admin/adminlog.php">Admin</a>
            </div>
            <div id="welcome">
                <?php
                    session_start(); 
                    if (isset($_SESSION['user'])){
                        echo "Welcome, " . $_SESSION["user"] . "<br />";
                        echo '<a href="../register/change.php">Change Password</a>';
                        echo "<br/>";
                        echo '<a href="../report/history.php">History Transaction</a>';
                        echo "<br/>";
                        echo '<a href="../register/logout.php?action=logout">Log Out</a>';
                    }
                    else{
                        echo "Welcome, guest<br />";
                        echo '<a href="../register/login.php?action=login">Log In</a>';
                        echo "&nbsp&nbsp";
                        echo '<a href="../register/register.php?action=signup">Sign Up</a>';
                    }
                ?></div>
            <img src="image/mkPhone.png" alt="MkPhone" class="phone">
            <h1> Electronic Devices Shop</h1>
            <ul id="navigation">
                <li class="current">
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a>Commodity</a>
                    <ul>
                        <li>
                            <a href="mi.php">Mi 11 Lite</a>
                            <!--https://www.mi.com/sg/product/mi-11-lite/specs-->
                        </li>
                        <li>
                            <a href="iphone.php">Iphone 12</a>
                            <!--https://www.apple.com/iphone-12/-->
                        </li>
                        <li>
                            <a href="oppo.php">Oppo A94</a>
                            <!--https://www.oppo.com/sg/smartphones/series-a/a94/-->
                        </li>
                    </ul>
                <li>
                    <a href="../shoppingcart/iflog.php" >Buy</a>
                </li>

                <li>
                    <a href="contact.php">Contact Us</a>
                </li>
                
            </ul>
        </div>
        <div id="body">
            <div id="tagline">
                <h1>JUST BUY IT!</h1>
                <p>
                    Better Phone<br>Better Life
                </p>
            </div>
            <img src="image/phone1.png" alt="phone" class="figure">
        </div>
        
        <div id="footer">
            <div>
                <span>88 University St. Wenzhou | 325006</span>
                <p>
                © 2023 by Joe & Crawford. 
                </p>
            </div>
        </div>    
    </body>
</html>