<?php 
/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: userinfo.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This function deletes an item from the cart if the user no longer wants it 
 *   
 * */

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