<?php

	if(!isset($_SESSION)) session_start();
	if(!isset($_SESSION['uname'])) header("Location: ../accounts/login.php");
	if(!isset($_SESSION['myCart'])) header("Location: cart.php");
	
	if(!isset($_SESSION['myCart']))  {
	   $_SESSION['myCart'] = array();
	   $_SESSION['myTotalQuantity'] = 0;
	   $_SESSION['myTotalPrice'] = 0;
	}

	if(empty($_SESSION['myCart'])){
		if(isset($_SESSION["cartMsg"])){
			if($_SESSION["cartMsg"] != "Item successfully deleted from cart!"){
				$_SESSION['cartMsg'] = "Cart is empty, browse products and add to cart.";
			}
		}
	}

?>

