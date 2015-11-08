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
	
	if(!isset($_SESSION)) session_start();
	if(!isset($_SESSION['uname'])) header("Location: ../accounts/login.php");
	if(!isset($_SESSION['myCart'])) header("Location: cart.php");
	
	require("orderDb.php");
	
    require("../navigation.inc");
    $navigation = new Navigation();
    echo $navigation;
    
    if (!isset($_SESSION['uname'])) {
        header ('Location: ../accounts/login.php');  
    }
  
 ?>
 
	<div class="breadcrumb">    
          <ul>
            <li><a href="../index.php">home</a></li>
            <li><a href="">payment confirmation</a></li>          
          </ul>
    </div>
 
    <div class = "mainContentTable">
    	<h1 class="indexH1">Thank you for your order!</h1><br />
    	<h1 class="indexH1"><a href="">View Receipt</a></h1><br />
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
        	
        		$subTotal = $_SESSION['myTotalPrice'];
				$totalTax = $_SESSION['myTotalPrice'] * .07125;
				$grandTotal = $subTotal + $totalTax;
				
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
             
            	// if there is a myCart session variable: populate cart
            	if(isset($_SESSION['myCart'])){
	             	$myCart = $_SESSION['myCart'];
					$totalPrice = 0;
					
					// loop through each index of myCart[] array
					foreach($_SESSION['myCart'] AS $temp)  {
               			$prod_id = $temp["prod_id"];
               			$qty = $temp["qty"];
					    
					    $query = "select * from products where prod_id =" . $prod_id;
					    $results = mysqli_query($dbc, $query);
		            	
			            // query DB with each index of array to populate cart table
			            while($row = mysqli_fetch_assoc($results)) {
							
							// print table of cart items  
							$subTotal = number_format($row["price"] * $qty,2);
			                echo "<tr>
			                 		<td><img src=\"../" . $row["photo_loc"] . "\" height=\"100\" width=\"100\"></td>
			                 		<td>" . $row["title"] . "<br /><br />item id: " . $row["prod_id"] . "</td>
			                 		<td>$" . $row["price"] . "</td>
			                 		<td>"
		        						. $qty . 
		        					"</td>		                 		
			                 		<td>$" . $subTotal . "</td>
			                 		
			                 	  </tr>";  
						} // end while loop
					} // end for loop : $myCart[]
				} // end if isset($myCart[])
				
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