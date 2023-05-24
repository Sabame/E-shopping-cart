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
                        echo '<a href="../register/logout.php?action=logout">log out</a>';
                    }
                    else{
                        echo "Welcome, guest<br />";
                        echo '<a href="../register/login.php?action=login">log in</a>';
                    }
                ?></div>
            <img src="../webPages/image/mkPhone.png" alt="MkPhone" class="phone">
            <h1> Electronic Devices Shop</h1>
            <ul id="navigation">
                <li>
                    <a href="../webPages/index.php">Home</a>
                </li>
                <li>
                    <a>Commodity</a>
                    <ul>
                    <li>
                            <a href="../webPages/mi.php">Mi 11 Lite</a>
                            <!--https://www.mi.com/sg/product/mi-11-lite/specs-->
                        </li>
                        <li>
                            <a href="../webPages/iphone.php">Iphone 12</a>
                            <!--https://www.apple.com/iphone-12/-->
                        </li>
                        <li>
                            <a href="../webPages/oppo.php">Oppo A94</a>
                            <!--https://www.oppo.com/sg/smartphones/series-a/a94/-->
                        </li>
                    </ul>
                <li class = "current">
                    <a href="iflog.php"  class="current">Buy</a>
                </li>
                <li>
                    <a href="../webPages/contact.php">Contact Us</a>
                </li>
            </ul>
        </div> 
        <div id="body">
        <?php
            if (!isset($_SESSION['user']))
                echo "To access your shopping cart, please log in first!";
            else
                header('Refresh:0; url="cart.php"');
        ?>
        </div>
        <div id="footer">
            <div>
                <span>88 University St. Wenzhou | 325006</span>
                <p>
                    © 2023 by Joe & Crawford. 
                </p>
            </div>
        </div>
</html>