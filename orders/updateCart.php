<?php 
/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: userinfo.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This page updates the cart if the user wants to add or drop a quantity of an item in the cart
 * */
	
    // if(null === session_id()){
        session_start();
    // }
    
    require("../controllers/database.php");

	// initiate vars from update form from given product (called from cart.php)
    $newQty = $_POST['qty'];
	$prod_id = $_POST['prod_id'];
        
    $myCart = $_SESSION['myCart'];
    
    $qtyQuery = "select qty from products where prod_id = '" . $prod_id . "'";
    $result = mysqli_query($dbc, $qtyQuery);
    $row = mysqli_fetch_assoc($result);
	
    if($newQty > $row['qty']) {
        
       $_SESSION['cartMsg'] = "There are not enough in stock!<br />Please select a quantity at or below available amount.";
       header("Location: cart.php");
        
    } else {
    	
    	// loop through $myCart associate array() 			
		foreach($myCart as $key => $value) {
			
			// update qty if myCart['prod_id'] == $prod_id
  			if($myCart[$key]['prod_id'] == $prod_id){
  				$myCart[$key]['qty'] = $newQty;
  			} 
	  	}
		
		$_SESSION['cartMsg'] = "Quantity successfully updated!";
		
		// update $myCart session var
        $_SESSION['myCart'] = $myCart;
     	require("cartTotal.php");
        header("Location: cart.php");
		
     } // end else
?>