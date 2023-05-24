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
                <li  class="current">
                    <a href="../shoppingcart/cart.php">Buy</a>
                </li>
				<li>
                    <a href="../webPages/contact.php">Contact Us</a>
                </li>
            </ul>
        </div> 
		<div id="body">
			<?php
			require_once("dbcontroller.php"); // Check if the dbcontroller is already included
			$db_handle = new DBController();
			if(!empty($_GET["action"])) {
			switch($_GET["action"]) {
				case "add":

					if(!empty($_POST["quantity"])) {
						$productByCode = $db_handle->runQuery("SELECT * FROM product WHERE code='" . $_GET["code"] . "'");
						$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"], 'inventory'=>$productByCode[0]["inventory"]));
						
						if(!empty($_SESSION["cart_item"])) {								
							if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
								foreach($_SESSION["cart_item"] as $k => $v) {
										if($productByCode[0]["code"] == $k) {
											if(empty($_SESSION["cart_item"][$k]["quantity"])) {
												$_SESSION["cart_item"][$k]["quantity"] = 0;
											}

											if($_POST["quantity"] + $_SESSION["cart_item"][$k]["quantity"] <= $productByCode[0]["inventory"]){
												$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];

												$phone = $productByCode[0]["name"];
												$goal = $db_handle->eleQuery("SELECT code FROM product WHERE name = '$phone'");
												$code = $goal;
												$quantity = $_POST["quantity"];
												$price = $productByCode[0]["price"];
												$customer = $_SESSION["user"];		
						
												$sql_insert = "INSERT INTO temp(phone,code,quantity,price,customer) 
													VALUES('$phone','$code','$quantity','$price','$customer')";
													mysqli_query($db_handle->connectDB(), $sql_insert);

											}
											else{
												?>
												<script>
												alert("Your purchase exceeds the inventory. Please try again");
												</script>
												<?php
											}
												
										}
								}
							} 
							
							else {
								if($_POST["quantity"] <= $productByCode[0]["inventory"]){
									$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
									$phone = $productByCode[0]["name"];
									$goal = $db_handle->eleQuery("SELECT code FROM product WHERE name = '$phone'");
									$code = $goal;
									$quantity = $_POST["quantity"];
									$price = $productByCode[0]["price"];
									$customer = $_SESSION["user"];		
						
									$sql_insert = "INSERT INTO temp(phone,code,quantity,price,customer) 
									VALUES('$phone','$code','$quantity','$price','$customer')";
									mysqli_query($db_handle->connectDB(), $sql_insert);
								}
								else{
									?>
									<script>
									alert("Your purchase exceeds the inventory. Please try again");
									</script>
									<?php
								}
								
							}

					}

						else {
							if($_POST["quantity"] <= $productByCode[0]["inventory"]){
								$_SESSION["cart_item"] = $itemArray;

								$phone = $productByCode[0]["name"];
								$goal = $db_handle->eleQuery("SELECT code FROM product WHERE name = '$phone'");
								$code = $goal;
								$quantity = $_POST["quantity"];
								$price = $productByCode[0]["price"];
								$customer = $_SESSION["user"];		
					
								$sql_insert = "INSERT INTO temp(phone,code,quantity,price,customer) 
								VALUES('$phone','$code','$quantity','$price','$customer')";
								mysqli_query($db_handle->connectDB(), $sql_insert);
							}
							else{
								?>
								<script>
								alert("Your purchase exceeds the inventory. Please try again");
								</script>
								<?php
							}

						}

					}


				break;
				case "remove":
					if(!empty($_SESSION["cart_item"])) {
						$productByCode = $db_handle->runQuery("SELECT * FROM product WHERE code='" . $_GET["code"] . "'");
						foreach($_SESSION["cart_item"] as $k => $v) {
								if($_GET["code"] == $k)
									unset($_SESSION["cart_item"][$k]);				
								if(empty($_SESSION["cart_item"]))
									unset($_SESSION["cart_item"]);
						}
						$phone = $productByCode[0]["name"];
						$sql_remove = "DELETE FROM temp WHERE phone='$phone'";
						mysqli_query($db_handle->connectDB(), $sql_remove);
					}
				break;
				case "empty":
					unset($_SESSION["cart_item"]);
					$sql_remove = "DELETE FROM temp";
					mysqli_query($db_handle->connectDB(), $sql_remove);
				break;	
			}
			}
			?>
			<div id="shopping-cart">
			<div class="txt-heading"><strong>Shopping Cart</strong></div>

			<a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
			<?php
			if(isset($_SESSION["cart_item"])){
				$total_quantity = 0;
				$total_price = 0;
			?>	
			<table class="tbl-cart" cellpadding="10" cellspacing="1">
			<tbody>
			<tr>
			<th style="text-align:left;">Name</th>
			<th style="text-align:left;">Code</th>
			<th style="text-align:right;" width="5%">Quantity</th>
			<th style="text-align:right;" width="15%">Unit Price</th>
			<th style="text-align:right;" width="15%">Price</th>
			<th style="text-align:center;" width="10%">Remove</th>
			</tr>	
			<?php		
				foreach ($_SESSION["cart_item"] as $item){
					$item_price = $item["quantity"]*$item["price"];
					?>
							<tr>
							<td><img src="../webPages/<?php echo $item["image"]; ?>" class="cart-item-image"/><?php echo $item["name"]; ?></td> 
							<td><?php echo $item["code"]; ?></td>
							<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
							<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
							<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
							<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="../webPages/image/remove.png" alt="Remove Item" id = "removePic"/></a></td>
							</tr>
							<?php
							$total_quantity += $item["quantity"];
							$total_price += ($item["price"]*$item["quantity"]);
					}
					?>

			<tr>
			<td colspan="2" align="right">Total:</td>
			<td align="right"><?php echo $total_quantity; $_SESSION['whole'] = $total_price; ?></td>
			<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
			
			</tr>
			</tbody>
			
			</table>

			<form action="../report/pay.php">
					<input type="submit" value="buy" id = "buy">
			</form>

			<?php
			} else {
			?>
			<div class="no-records">Your Cart is Empty</div>
			<?php 
			}
			?>
			</div>

			<div id="product-grid">
				<a>——————————————————————————————————————————————————————————</a>
				<div class="txt-heading"><strong>Products</strong></div>
				<?php
				$product_array = $db_handle->runQuery("SELECT * FROM product ORDER BY id ASC");
				if (!empty($product_array)) { 
					foreach($product_array as $key=>$value){
						$_SESSION['dummyIn']=$product_array[$key]["inventory"];
				?>
					<div class="product-item" float = 'right'>
						<form method="post" action="cart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
						<div class="product-image"><img src="../webPages/<?php echo $product_array[$key]["image"]; ?>" class="cart-item-image" ></div>
						<div class="product-tile-footer">
						<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
						<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>

						<?php
						$b = $product_array[$key]["inventory"];
						?>
						
						<div class="cart-action"><input type="text" class="product-quantity" id="quantity" name="quantity" 
														value="1"  size="2" oninput="value=value.replace(/[^\d]/g,''); if(value><?php echo $b;?>)value=<?php echo $b;?>"/>

							</br><input type="submit" value="Add to Cart" class="btnAddAction"/></div>
							<?php echo "Inventory: ".$product_array[$key]["inventory"]; ?>
						</div>
						</form>
					</div>
				<?php
					}
				}
				?>
			</div>
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
