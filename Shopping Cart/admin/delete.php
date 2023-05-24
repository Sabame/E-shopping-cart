<!DOCTYPE html>
<html>
<head>
<title>delete successfully</title>
<link rel="stylesheet" type="text/css" href="../cssFile/adminlog.css">
<meta name="content-type";
 charset="UTF-8">
</head>
<body>

    <?php
     $conn = mysqli_connect("127.0.0.1", "root", "", "user");
     if ($conn->connect_error) {
     die("fail: " . $conn->connect_error);
    }
        $id = $_GET['id'];
        $sql_remove = "DELETE FROM product WHERE id = $id";
		mysqli_query($conn, $sql_remove);
    ?>

    <h1>&nbsp&nbsp&nbsp delete successfully！</h1> 
    <br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp go to <a href="../admin/manage.php">manage page</a>
</body>
</html>
