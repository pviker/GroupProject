<?php 

/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: userinfo.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This page echoes all current users in the database.
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
	
	
	    
 ?>
 
	<div class="breadcrumb">    
          <ul>
            <li><a href="../index.php">home</a></li>
            <li><a href="">shopping cart</a></li>          
          </ul>
    </div>
    
    <div class = "mainContent">
     	<!-- <h1><a href="admin.php">Admin Interface</a> </h1> <br/>	 -->		
    </div>
 
     <div class = "mainContentTable">
     	<!-- <h2 class="indexH1"><?php echo $_SESSION['confirmMessage']; ?>!</h2><br /> -->
     	<h1 class="indexH1">
     		TESTING SHOPPING CART FUNCTIONALITY
     	</h1>
        
         <table class = "cartTable">
             <tr>
                 <td>Item ID</td>
                 <td>Thumbnail</td>
                 <td>Item Descr.</td>
                 <td>Unit Cost</td>
                 <td>Qty.</td>
                 <td>Item Subtotal</td>
                 <td>Delete From Cart</td>     
             </tr>
            
             <?php 
             
             	// if there is a myCart session variable: populate cart
             	if(isset($_SESSION['myCart'])){
	             	$myCart = $_SESSION['myCart'];
	            	//$arrlength = count($myCart);
					
					// loop through each index of myCart[] array
					foreach($_SESSION['myCart'] AS $temp)  {
               			$prod_id = $temp["prod_id"];
               			$qty = $temp["qty"];
					    
					    $query = "select * from products where prod_id =" . $prod_id;
					    $results = mysqli_query($dbc, $query);
		            
			            // query DB with each index of array to populate cart table
			            while($row = mysqli_fetch_assoc($results)) {
				            	
								// create quantity field based off qty wanted vs. available qty	            	
								$qtyField = "<form action=\"updateCart.php\" class=\"cartQty\"method=\"post\">
												<input type=\"text\" name=\"qty\" class=\"cartQty\" value=\"" . $qty  . "\" 
													size=\"2\" id=\"qty\"/>\n
												<br />available: " . $row["qty"] . "<br />
												<input type=\"submit\" class=\"cartQty\" name=\"update\" alt=\"update\" 
													value=\"update\" id=\"submit\" style=\"opacity: 1\" />
											</form>";
								
								// print table of cart items     
				                echo "<tr>
				                		<td>" . $row["prod_id"] . "</td>
				                 		<td><img src=\"../" . $row["photo_loc"] . "\" height=\"100\" width=\"100\"></td>
				                 		<td>" . $row["title"] . "</td>
				                 		<td>$" . $row["price"] . "</td>
				                 		<td>"
			        						. $qtyField . 
			        					"</td>		                 		
				                 		<td>$" . $row["price"] * $qty . "</td>
				                 		<td>" . "DELETE" . "</td>
				                 	  </tr>";    
									  
						} // end while loop
					} // end for loop : $myCart[]
				} // end if isset($myCart[])
             ?>
             
        	</table>
		</div>
     
		<?php     
		  
		    //Free results from memory
		    mysqli_free_result($results);
		    //Close database connection
		    mysqli_close($dbc);
		 
		?>

	</body>

</html>