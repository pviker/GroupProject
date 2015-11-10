<?php

/* 
 * ICS325 - Group Project
 * Iteration: 5
 * Group: D for Dolphins
 * File: orderDB.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: Persist customer orders
 *   
 * */
 
 	// authorize page access
	if(!isset($_SESSION)) session_start();
	if(!isset($_SESSION['uname'])) header("Location: ../accounts/login.php");
	if(empty($_SESSION['myCart']) || !isset($_SESSION['myCart'])){
		header("Location: cart.php");
	}
	
	$previousPage = $_SERVER['HTTP_REFERER'];
	if (strpos($previousPage,'orderPayment.php') == false) {
   		header("Location: cart.php");
	}
	


	require("../controllers/database.php");
	require("cartHead.php");
	
	if(isset($_SESSION['uname'])){
    	$username = $_SESSION['uname'];
    } else $username = "";
    	
	// get userid for current username
	$query = "select userid from credentials where username = \"" . $username . "\"";
		$results = mysqli_query($dbc, $query);
		$row = mysqli_fetch_assoc($results);		
	
	// init db persist vars
	$userid = $row['userid'];
	$amount = $_SESSION['grandTotal'];
	$date = date("d-m-Y");
		
	// persist current order
	$query = "INSERT INTO orders (user_id, amount, date)
				VALUES ('$userid', '$amount', '$date')";
				
	if(mysqli_query($dbc, $query)) {
		// success
		$order_id = mysqli_insert_id($dbc); // get order_id from last insert
	} else {}// error
	
	
	// persist order_items
	if(isset($_SESSION['myCart'])){
     	$myCart = $_SESSION['myCart'];
		
		// loop through each index of myCart[] to persist all order items
		$query = "";
		foreach($_SESSION['myCart'] AS $temp)  {
   			$prod_id = $temp["prod_id"];
   			$qty = $temp["qty"];
			
			updateProductsQty($prod_id, $qty);
		    
			$query .= "INSERT INTO order_items (order_id, prod_id, qty)
				VALUES ('$order_id', '$prod_id', '$qty');";
		} // end for loop : $myCart[]
	
		if (mysqli_multi_query($dbc, $query)) {
	   		// success
		} else {}
	    	// error
	  
	} // end if isset($myCart[])

	// update quantity on products
	function updateProductsQty($prod_id, $orderItemQty){
		
		require("../controllers/database.php");
		
		$query = "select qty from products where prod_id =" . $prod_id;
		$results = mysqli_query($dbc, $query);
		$row = mysqli_fetch_assoc($results);
		
		$oldQty = $row['qty'];
		$newQty = $oldQty - $orderItemQty;
		
		$sql = "UPDATE products SET qty='$newQty' WHERE prod_id=$prod_id";
		
		if (mysqli_query($dbc, $sql)) {
		   // echo "Record updated successfully";
		} else {
		   // echo "Error updating record: " . mysqli_error($conn);
		}
		
	}
	
	// after persisting to the DB, unset cart session vars
	 unset($_SESSION['myCart']);
	 unset($_SESSION['myTotalQuantity']);
	 unset($_SESSION['myTotalPrice']);

?>

