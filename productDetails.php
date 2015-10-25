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
 
 	global $id;
	global $cat;
	global $subcat;
 
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
	
	if (isset($_GET["prod_id"])){
		$prod_id = $_GET["prod_id"];
	} else $prod_id = "";
	
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
            <li><a href="products.php?cat=<?php echo $cat; ?>"><?php echo $cat; ?></a></li>
            <li><<a href="products.php?id=<?php echo $id ?>&cat=<?php echo $cat; ?>&subcat=<?php echo $subcat ?>"><?php echo $subcat; ?></a></li> 
            <li><a href="">Details</a></li>
                     
          </ul>
    </div>
    
    <div class = "productContent">
    	
    	
    <!--START MAIN CONTENT-->		
			<p><h2>Marshall 1962 Bluesbreaker - Used</h2></p>
			<span class="productImg"><img src="images/amplifiers/Marshall_bluesbreaker.jpg" height="450" width="450" /></span>
		    <span>
				<p>$1399</p>
				<p>FEATURES:</p>
					<ul>
						<li>30W output</li>
						<li>2 - 12" 25W Celestion Greenback speakers</li>
						<li>Valve rectifier</li>
					</ul>
			</span>	

	<!--END MAIN CONTENT-->
    	
    	
     	<h1>Products page in progress...</h1> <br/>
     	
     	<table>
     	<?php 
     		// Need to query that will grab all products that have a 
     		// cat_id referenced to category table matching a specific category 
     		// (ie. category table for guitars has a id= 1,2,3,9)
     		// SELECT * FROM products where cat_id in (select categories.id where category = "Guitars");
     		
     		//$this->server = $server;
     		
     		if($cat == "Guitars" && $subcat == ""){
     			$query = "select * from products where cat_id in (1, 2, 3, 9)";
     		} else if($cat == "Amps" && $subcat == ""){
     				$query = "select * from products where cat_id in (4, 5, 6)";
     		  } else if($cat == "Drums" && $subcat == ""){
     					$query = "select * from products where cat_id in (7, 8)";		
     			} else {
     					$query = "select * from products where cat_id = " . $id;
				  }
				
			$results = mysqli_query($dbc, $query);	
     	
			// echo all products matching category ID
			while($row = mysqli_fetch_assoc($results)) {    
	        	echo "<tr>
	        			<td><a href=\"/ics325/GroupProject/products.php?prod_id=" . $row["prod_id"] . "\">
	        					<span class=\"img\"><img src=\"" . $row["photo_loc"] . "\" height=\"200\" width=\"200\" /></span</a></td>
	        			<td><a href=\"/ics325/GroupProject/products.php?prod_id=" . $row["prod_id"] . "\">" . $row["title"] . "</a></td>
	        			<td>" . $row["price"] . "</td>    
       				  </tr>";
			} // end while
			
        ?>
        

        
		</table>
				
    </div>
    
	</body>

</html>