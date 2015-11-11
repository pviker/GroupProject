<?php 

/* 
 * ICS325 - Group Project
 * Iteration: 5
 * Group: D for Dolphins
 * File: confirmPayment.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: Shows payment confirmation to customer
 *   
 * */
	
	// accessibility conditionals
	if(!isset($_SESSION)) session_start();
	if(!isset($_SESSION['uname'])) header("Location: ../accounts/login.php");
	if(empty($_SESSION['myCart']) || !isset($_SESSION['myCart'])){
		header("Location: cart.php");
		exit;
	}
	if (strpos($_SERVER['HTTP_REFERER'],'orderPayment.php') == false) {
   		header("Location: cart.php");
		exit;
	}
	
	// handles persisting data to orders table
	require("orderDB.php");
	
    require("../navigation.inc");
    $navigation = new Navigation();
    echo $navigation;
	
	$_SESSION['currentOrderID'] = $order_id;
  
 ?>
 
	<div class="breadcrumb">    
          <ul>
            <li><a href="../index.php">home</a></li>
            <li><a href="">payment confirmation</a></li>          
          </ul>
    </div>
 
    <div class = "mainContentTable">
    	<h1 class="indexH1">Thank you for your order!</h1><br />
    	<h1 class="indexH1"><a href="orderReceipt.php" target="_blank">View Receipt</a></h1><br />
    	<h2 class="">Order Summary:</h2>
        
       <!-- SHIPMENT INFO -->
        	<?php 
        	
        		if(isset($_SESSION['uname'])){
        			$username = $_SESSION['uname'];
        		} else $username = "";
        	
				require("../controllers/database.php");
        		$query = "select userid from credentials where username = \"" . $username . "\"";
				$results = mysqli_query($dbc, $query);
				$row = mysqli_fetch_assoc($results);		
				$userid = $row['userid'];

				$query = "select * from users where userid= " . $userid;
				$results = mysqli_query($dbc, $query);
				$row = mysqli_fetch_assoc($results);
        	
        	?>
        	
        	<div class="customerInfo1">
        		<span style='font-weight: bold; margin-left: 5%'>Shipping to:</span>
        	</div>
        	<div class="customerInfo">
        		<?php 
	    			 echo	"<span>" . $row["first_name"] . " " . $row["last_name"] . "</span><br />" .
	    			 		"<span>" . $row["address"] . "</span><br />" .
							"<span>" . $row["city"] . ", " . $row["state"] . "</span><br />" .
							"<span>" . $row["zip"] . "</span><br />" .
							"<span>Phone #: " . $row["phone"] . "</span>";
        		?>
        	</div>
        	
        	<?php 
        	
        	/** *
			 * 
			 * FOLLOWING DATA SHOULD BE POPULATED BY DB AND NOT SESSION
			 * SESSION WILL BE UNSET BY THE TIME THIS CODE IS REACHED 
			 * 
			 * **/
			 	
			 	$query = "select * from orders where orders_id = " . $order_id;
				$results = mysqli_query($dbc, $query);
				$row = mysqli_fetch_assoc($results);	
					
				$grandTotal = $row['amount'];
				$subTotal = $grandTotal / 1.07125;
				$totalTax = $grandTotal - $subTotal;
        				
				$subTotal = number_format($subTotal,2);
				$totalTax = number_format($totalTax, 2);
				$grandTotal = number_format($grandTotal, 2);
        	
        	?>
        	<div class="orderTotal">
        		<span>Order subtotal: <?php echo "$".$subTotal; ?></span><br />
        		<span>Tax: <?php echo "$".$totalTax ?></span><br />
        		<span>Charge amount: <?php echo "$".$grandTotal ?></span>
        		
        	</div>        	
        
        <table class = "cartTable">
            <tr>
                <td></td>
                <td>Item Description</td>
                <td>Unit Cost</td>
                <td>Quantity</td>
                <td>Item Subtotal</td>  
            </tr>
           
            <?php 
            
           		$orderItemsQuery = "select prod_id, qty from order_items where order_id = " . $order_id;
				$results = mysqli_query($dbc, $orderItemsQuery);
				//$row = mysqli_fetch_assoc($results);
					
				// loop through orderItems
				while($orderItemsRow = mysqli_fetch_assoc($results))  {
           			$prod_id = $orderItemsRow["prod_id"];
           			$qty = $orderItemsRow["qty"];
				    
				    $productQuery = "select title, price, photo_loc from products where prod_id =" . $prod_id;
				    $productResults = mysqli_query($dbc, $productQuery);
					$row = mysqli_fetch_assoc($productResults);									
						
					// print table of cart items  
					$subTotal = number_format($row["price"] * $qty,2);
	                echo "<tr>
	                 		<td><img src=\"../" . $row["photo_loc"] . "\" height=\"100\" width=\"100\"></td>
	                 		<td>" . $row["title"] . "<br /><br />item id: " . $prod_id . "</td>
	                 		<td>$" . $row["price"] . "</td>
	                 		<td>"
        						. $qty . 
        					"</td>		                 		
	                 		<td>$" . $subTotal . "</td>
	                 		
	                 	  </tr>";  
					
				 } // end while loop
							
             ?>
             
        	</table>

		<?php     
		  
		    //Free results from memory
		    if(isset($results)){
			    mysqli_free_result($results);
			    //Close database connection
			    mysqli_close($dbc);
			}
		 
		?>
		
		</div>

	</body>
</html>