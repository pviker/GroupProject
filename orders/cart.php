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
	
	require("cartHead.php");
	
	
	    
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
     	<h2 class="errorMsg">
     		<?php 
     			if(isset($_SESSION['cartMsg'])){
     				echo $_SESSION['cartMsg']; 
     				unset($_SESSION['cartMsg']);
				}
			?>
		</h2>
     	<h1 class="indexH1">
     		SHOPPING CART
     	</h1>
 
        
         <table class = "cartTable">
             <tr>
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
					$totalPrice = 0;
					
					// loop through each index of myCart[] array
					foreach($_SESSION['myCart'] AS $temp)  {
               			$prod_id = $temp["prod_id"];
               			$qty = $temp["qty"];
					    
					    $query = "select * from products where prod_id =" . $prod_id;
					    $results = mysqli_query($dbc, $query);
		            	
			            // query DB with each index of array to populate cart table
			            while($row = mysqli_fetch_assoc($results)) {
			            	
							// set total price session var
							//$totalPrice += $qty * $row["price"];
							 
				            	
							// create quantity field based off qty wanted vs. available qty	            	
							$qtyField = "<form action=\"updateCart.php\" class=\"cartQty\"method=\"post\">
											<input type=\"hidden\" name=\"prod_id\" value=\"" . $prod_id . "\" id=\"prod_id\"/>
											<input type=\"text\" name=\"qty\" class=\"cartQty\" value=\"" . $qty  . "\" 
												size=\"2\" id=\"qty\"/>\n
											<br />available: " . $row["qty"] . "<br />
											<input type=\"submit\" class=\"cartQty\" name=\"update\" alt=\"update\" 
												value=\"update\" id=\"submit\" style=\"opacity: 1\" />
										</form>";
							
							// print table of cart items     
			                echo "<tr>
			                 		<td><img src=\"../" . $row["photo_loc"] . "\" height=\"100\" width=\"100\"></td>
			                 		<td>" . $row["title"] . "<br /><br />item id: " . $row["prod_id"] . "</td>
			                 		<td>$" . $row["price"] . "</td>
			                 		<td>"
		        						. $qtyField . 
		        					"</td>		                 		
			                 		<td>$" . $row["price"] * $qty . "</td>
			                 		<td><a href=\"deleteFromCart.php?prod_id=" . $row["prod_id"] . "\" id=\"deleteBtn\">
			                 				DELETE
			                 			</a>
			                 		</td>
			                 	  </tr>";  
						} // end while loop
					} // end for loop : $myCart[]
				} // end if isset($myCart[])
             ?>
             
        	</table>
        	<?php 
        	
        		// $_SESSION['myTotalPrice'] = $totalPrice;
        		// echo $_SESSION['myTotalPrice']; 
        	
        	?>
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