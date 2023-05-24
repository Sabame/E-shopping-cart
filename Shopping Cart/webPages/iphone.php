<!DOCTYPE html>
<html lang=en>
    <head>
        <title>Electronic Devices Shop</title>
        <link rel="stylesheet" type="text/css" href="../cssFile/style.css">
      <link rel="stylesheet" type="text/css" href="../cssFile/photo.css">

    </head>
    <body>
        <div id="header">
            <div id="welcome">
                <?php
                    session_start(); 
                    if (isset($_SESSION['user'])){
                        echo "Welcome, " . $_SESSION["user"] . "<br />";
                        echo '<a href="logout.php?action=logout">logout</a>';
                    }
                    else
                        echo "Welcome, guest<br />";
                ?></div>
            <img src="image/mkPhone.png" alt="MkPhone" class="phone">
            <h1> Electronic Devices Shop</h1>
            <ul id="navigation">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="current">
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
                    <a href="../shoppingcart/iflog.php">Buy</a>
                </li>
                <li>
                    <a href="../webpages/contact.php">Contact Us</a>
                </li>
            </ul>
        </div>
        <div id="body">
            <div id="tagline">
                <h1>Iphone 12</h1>
                <?php 
                        $conn = mysqli_connect("127.0.0.1", "root", "", "user");
                        if ($conn->connect_error) {
                        die("fail: " . $conn->connect_error);
                    }
                    $quantity = 0;
                    $sql = "SELECT quantity FROM transaction WHERE phone = 'iPhone 12'";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($result)){           
                            $quantity += $row['quantity'];
                        }
                    echo "Total sales volume: $quantity";
                ?>
                <table>
                    <tr>
                      <td>Dimension</td>
                      <td>6.1 inch</td>
                    </tr>   
                    <tr>
                      <td>CPU</td>
                      <td>Apple A14</td>
                    </tr>
                    <tr>
                        <td>RAM</td>
                        <td>4G</td>
                    </tr>
                    <tr>
                        <td>ROM</td>
                        <td>64G/128G/256G</td>
                    </tr>
                    <tr>
                        <td>Capacitance</td>
                        <td>2775mAh</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>925$</td>
                    </tr>
                </table>
                <a href="https://www.apple.com/iphone-12/" target="_blank"><p class="more">Learn more</p></a>
            </div>

          <!-- Slideshow container -->
          <div class="slideshow-container" id="slideshow" style="width:45%;postion:absolute;float:right;top:180px; right:0px; border:1px;">
            <div>
              <!-- Full-width images with number and caption text -->
              <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img  src="image/iphone12first.jpg" style="width:100%">
                <!--        <div class="text">Caption Text</div>-->
              </div>
              
              <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="image/iphone12second.jpg" style="width:100%">
                <!--        <div class="text">Caption Two</div>-->
              </div>
              
              <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="image/iphone12third.jpg" style="width:100%">
                <!--        <div class="text">Caption Three</div>-->
              </div>
              
              <!-- Next and previous buttons -->
              <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
              <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>
            
            <!-- The dots/circles -->
            <div style="text-align:center">
              <span class="dot" onclick="currentSlide(1)"></span>
              <span class="dot" onclick="currentSlide(2)"></span>
              <span class="dot" onclick="currentSlide(3)"></span>
            </div> 
            
          </div>
          <script>
            var slideIndex = 1;
            showSlides(slideIndex);
            
            // Next/previous controls
            function plusSlides(n) {
              showSlides(slideIndex += n);
            }
            
            // Thumbnail image controls
            function currentSlide(n) {
              showSlides(slideIndex = n);
            }
            
            function showSlides(n) {
              var i;
              var slides = document.getElementsByClassName("mySlides");
              var dots = document.getElementsByClassName("dot");
              if (n > slides.length) {slideIndex = 1}
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
              }
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";
              dots[slideIndex-1].className += " active";
            } 
          </script>
          
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