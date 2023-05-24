<!DOCTYPE html>
<html lang=en>
    <head>
        <title>Electronic Devices Shop</title>
        <link rel="stylesheet" type="text/css" href="../cssFile/style.css">
    </head>
    <body>
        <div id="header">
            <div id="welcome">
                <?php
                    session_start(); 
                    if (isset($_SESSION['user'])){
                        echo "Welcome, " . $_SESSION["user"] . "<br />";
                        echo '<a href="../register/logout.php?action=logout">Log Out</a>';
                    }
                    else{
                        echo "Welcome, guest<br />";
                        echo '<a href="../register/login.php?action=login">Log In</a>';
                    }
                ?>
            </div>

            <img src="image/mkPhone.png" alt="MkPhone" class="phone">
            <h1> Electronic Devices Shop</h1>
            <ul id="navigation">
                <li>
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

                <li  class="current">
                    <a href="../webPages/contact.php">Contact Us</a>
                </li>
                
            </ul>
        </div>
        
        <div id="body">
            <h3><img src="image/ad1.jpg" class = "icon">&nbsp Address</h3>
            <img src="image/address.jpg" alt="address">
            <h3><img src="image/ad3.jpg" class = "icon">&nbsp Email</h3>
            <p class = contact>wanyihao@kean.edu.cn</p>
            <h3><img src="image/ad2.jpg" class = "icon">&nbsp Phone</h3>
            <p class = contact>+86 182xxxx8958</p>
            <h3><img src="image/ad4.jpg" class = "icon">&nbsp Mail address</h3>
            <p class = contact>325006</p>
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