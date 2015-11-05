<?php

	//calculates cart total
	
	require("../controllers/database.php");

	if(isset($_SESSION['myCart'])){
	 	$myCart = $_SESSION['myCart'];
		$totalPrice = 0;
		
		// loop through each index of myCart[] array
		foreach($_SESSION['myCart'] AS $temp)  {
			$prod_id = $temp["prod_id"];
			$qty = $temp["qty"];
		    
		    $query = "select * from products where prod_id =" . $prod_id;
		    $results = mysqli_query($dbc, $query);

	        while($row = mysqli_fetch_assoc($results)) {
				$totalPrice += $qty * $row["price"];
	 
			} // end while loop
		} // end for loop : $myCart[]
	} // end if isset($myCart[])
	
	$_SESSION['myTotalPrice'] = $totalPrice;

?>