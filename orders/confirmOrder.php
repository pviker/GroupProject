<?php 

/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: userinfo.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This page displays the users cart
 *   
 * */
 
 	if(null === session_id()){
		session_start();
	}
	
    require("../navigation.inc");
    $navigation = new Navigation();
    echo $navigation;

	require("../controllers/database.php");
    
    if (!isset($_SESSION['uname'])) {
        header ('Location: ../accounts/login.php');  
    }
	
	require("cartHead.php");
  
 ?>
 
	<div class="breadcrumb">    
          <ul>
            <li><a href="../index.php">home</a></li>
            <li><a href="../orders/cart.php">cart</a></li>
            <li><a href="">review order</a></li>          
          </ul>
    </div>
 
    <div class = "mainContentTable">
    	<h1 class="indexH1">Review order</h1>
    	<h2 class="indexH1">Please review your order and shipment information</h2>
        
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
        		<span style='font-weight: bold; margin-left: 5%'>Billing/Shipping information:</span>
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
        		<span>Grand total: <?php echo "$".$grandTotal ?></span>
        		
        	</div>
        	
        	
		</div>
     
		<?php     
		  
		    //Free results from memory
		    if(isset($results)){
			    mysqli_free_result($results);
			    //Close database connection
			    mysqli_close($dbc);
			}
		 
		?>

	</body>
</html>