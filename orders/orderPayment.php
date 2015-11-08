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
            <li><a href="cart.php">cart</a></li>
            <li><a href="confirmOrder.php">review order</a></li>  
            <li><a href="">payment details</a></li>        
          </ul>
    </div>
 
    <div class = "mainContentTable">
    	<h1 class="indexH1">Payment details</h1>
    	<h2 class="indexH1">Please input your payment details</h2>
        	
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
    	<div class="centerCustomerInfo">
    		
        	<div class="customerInfo1">
        		<span style='font-weight: bold; margin-left: 5%'>Billing address:</span>
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
        	
        	<div class="orderTotal">     	
    	
        <form action="confirmPayment.php" method="post" class="noStyle">
			<fieldset id="field1">
				<label>Merchant: </label>
		    	<select id="category"  name="subcat">
		        	<option value="">Select</option>
					<option value="visa">Visa</option>
					<option value="mastercard">MasterCard</option>
					<option value="discover">Discover</option>
					<option value="amex">American Express</option>
				</select><br />
			    <label>Card number:</label>
			   		<input type="text" name="creditCard" placeholder="no dashes" value="" size="16" id="creditCard"/><br />
			   	<label>CVV:</label>
			   		<input type="text" name="cvv" placeholder="000" value="" size="4" id="cvv" /><br />
			    <label>Notes:</label>
			    	<textarea name="notes" value="" rows ="3" cols = "65" id="notes"> </textarea> <br />
			</fieldset>
			<input type="submit" class="payBtn" name="Submit" alt="Submit" value="Submit" id="submit" style="opacity: 1" />
		</form>
		
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
		</div>
	</body>
</html>