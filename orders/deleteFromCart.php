<?php 
// delete from array

	require ("cartHead.php");

	$myCart = $_SESSION['myCart'];
	$tempCart = array();
	
	if (isset($_GET['prod_id'])){
		$prod_id = $_GET['prod_id'];
	}
	
	// logic for duplicate cart products 
	foreach($myCart as $key => $value) { 
		if($myCart[$key]['prod_id'] != $prod_id){ 
		     $tempCart[] = $myCart[$key];
		} 
	}
	

	
	$_SESSION['myCart'] = $tempCart;
	$_SESSION['cartMsg'] = "Item successfully deleted from cart!";
	header("Location: cart.php");
	
// $myCart = $tempArray;
?>