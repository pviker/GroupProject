<?php 
	// this page will update the qty for the selected item
    // if(null === session_id()){
        session_start();
    // }
    
    require("../controllers/database.php");

	// initiate vars from update form from given product (called from cart.php)
    $newQty = $_POST['qty'];
	$prod_id = $_POST['prod_id'];

    // print_r($_SESSION['myCart']);
    // foreach($_SESSION['myCart'] as $temp) {
        
    $myCart = $_SESSION['myCart'];
    
    //$prodID = $prod['prod_id'];
    
    $qtyQuery = "select qty from products where prod_id = '" . $prod_id . "'";
    $result = mysqli_query($dbc, $qtyQuery);
    $row = mysqli_fetch_assoc($result);
	
    if($newQty > $row['qty']) {
        
       $_SESSION['qtyMessage'] = "There are not enough in stock!<br />Please select a quantity at or below available amount.";
       header("Location: cart.php");
        
    } else {
    	
    	// loop through array  			
		foreach($myCart as $key => $value) {
			
			// update qty if myCart['prod_id'] == $prod_id
  			if($myCart[$key]['prod_id'] == $prod_id){
  				$myCart[$key]['qty'] = $newQty;
  			}
	  	}
		
		// update $myCart session var
        $_SESSION['myCart'] = $myCart;

		// WE WILL PROBABLY WAIT TO UPDATE DB AFTER THE PURCHASE HAS BEEN MADE
       // $updateQuery = "update products set qty='" . ($row['qty'] - $newQty) . "' where prod_id='" . $prodID . "'";        
       // mysqli_query($dbc, $updateQuery);
        
       header("Location: cart.php");
   
     } // end else
?>