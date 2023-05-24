<!DOCTYPE html>
<html>
    <head>
        <title>editaction</title>
        <link rel="stylesheet" type="text/css" href="../cssFile/adminlog.css">
        <meta name="content-type"; charset="UTF-8">
    </head>
    <body> 

    <?php
        session_start();
        $id = $_SESSION['id'];
         $conn = mysqli_connect("localhost", "root", "", "user");
         if ($conn->connect_error) {
             die("fail: " . $conn->connect_error);
         } 
 
         $sql = "SELECT * FROM product WHERE id = $id";
         $result = mysqli_query($conn,$sql);
         $row = mysqli_fetch_array($result);

         $name = $_POST['phoneName'];
         $code = $_POST['code'];
         $image = $_POST['imageLocation'];
         $price = $_POST['price'];
         $inventory = $_POST['inventory'];

         mysqli_query($conn,"UPDATE product SET name='$name', code='$code', image='$image', price='$price', inventory='$inventory' WHERE id='$id'");
    
    ?>
    
    <h1>&nbsp&nbsp&nbsp edit successfully！</h1> 
    <br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp go to <a href="../admin/manage.php">manage page</a>

    </body>
</html>