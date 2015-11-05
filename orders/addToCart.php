<?php

	require ("cartHead.php");

	$duplicateProd = false;
	$myCart = $_SESSION['myCart'];
	
	if (isset($_GET['prod_id'])){
		$prod_id = $_GET['prod_id'];
	}
	
	// logic for duplicate cart products 
	foreach($myCart as $key => $value) { 
		if($myCart[$key]['prod_id'] == $prod_id){ 
		     $duplicateProd = true;
		} 
	}
	
	if ($duplicateProd){
	    $_SESSION['cartMsg'] = "Item already in cart!";
		header("Location: cart.php");
		
	} else {
		if (isset($_GET['prod_id'])){
			$_SESSION['myCart'][] = array("prod_id"=>$_GET['prod_id'], "qty"=>1);
			$_SESSION['cartMsg'] = "Item successfully added!";
			
			require("cartTotal.php");
			header("Location: cart.php");
		}
	}
	

?>