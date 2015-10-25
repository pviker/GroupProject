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
	
    require("navigation.inc");
    $navigation = new Navigation();
    echo $navigation;

	require("controllers/database.php");
//	require("URLpath.inc");
	// $URLpath = new URLpath();
	// $this->server = $server;
	
	if (isset($_GET["id"])){
		$id = $_GET["id"];
	} else $id = "";
	
	if (isset($_GET["cat"])){
		$cat = $_GET["cat"];
	} else $cat = "";
	
	if (isset($_GET["subcat"])){
		$subcat = $_GET["subcat"];
	} else $subcat = "";
    
 ?>
 
	<div class="breadcrumb">    
          <ul>
            <li><a href="index.php">home</a></li>
            <li><a href="products.php?cat=<?php echo $_GET["cat"]; ?>"><?php echo $_GET["cat"]; ?></a></li>
            <?php if (isset($_GET["subcat"])){ ?>
            	<li><a href=""><?php echo $_GET["subcat"]; ?></a></li> 
            <?php } ?>         
          </ul>
    </div>
    
    <div class = "mainContent">
    	
     	<h1 class="indexH1"><?php echo $subcat . " " . $cat; ?></h1>
     	
     	<table>
	     	<?php 
	     		// Need to query that will grab all products that have a 
	     		// cat_id referenced to category table matching a specific category 
	     		// (ie. category table for guitars has a id= 1,2,3,9)
	     		// SELECT * FROM products where cat_id in (select categories.id where category = "Guitars");
	     		
	     		//$this->server = $server;
	     		
	     		if($cat == "Guitars" && $subcat == ""){
	     			$query = "select * from products, categories where cat_id in (1, 2, 3, 9) and id=cat_id";
	     		} else if($cat == "Amps" && $subcat == ""){
	     				$query = "select * from products, categories where cat_id in (4, 5, 6) and id=cat_id";
	     		  } else if($cat == "Drums" && $subcat == ""){
	     					$query = "select * from products, categories where cat_id in (7, 8) and id=cat_id";		
	     			} else {
	     					$query = "select * from products, categories where cat_id = " . $id . " and id=cat_id";
					  }
					
				$results = mysqli_query($dbc, $query);	
	     	
				// echo all products matching category ID
				while($row = mysqli_fetch_assoc($results)) {
	
					
		        	echo "<tr>
		        			<td><a href=\"/ics325/GroupProject/productDetails.php?prod_id=" . 
		        						$row["prod_id"] . "&id=" . $row["id"] . "&cat=" . $row["category"] . "&subcat=" . 
		        							$row["subcategory"] . "\">
		        					<span class=\"img\">
		        						<img src=\"" . $row["photo_loc"] . "\" height=\"200\" width=\"200\" />
		        					</span>
		        				</a></td>
		        			<td><a href=\"/ics325/GroupProject/productDetails.php?prod_id=" . 
		        						$row["prod_id"] . "&id=" . $row["id"] . "&cat=" . $row["category"] . "&subcat=" . 
		        							$row["subcategory"] . "\">" . 
		        								$row["title"] . "
		        				</a></td>
		        			<td>$" . $row["price"] . "</td>    
	       				  </tr>";
				} // end while
				
	        ?>
		</table>
				
    </div>
    
	</body>

</html>