<?php 

/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: productDetails.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: Dynamically populates page for a specific product given a product ID#
 *   
 * */
 
 	global $id;
	global $cat;
	global $subcat;
 
 	if(null === session_id()){
		session_start();
	}
	
	// MENU
    require("navigation.inc");
    $navigation = new Navigation();
    echo $navigation;

	// DB connection
	require("controllers/database.php");
//	require("URLpath.inc");
	// $URLpath = new URLpath();
	// $this->server = $server;
	
	
	// set $_GET variables from url
	if (isset($_GET["id"])){
		$cat_id = $_GET["id"];
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
 
 	<!-- BREADCRUMBS -->
	<div class="breadcrumb">    
          <ul>
            <li><a href="index.php">home</a></li>
            <li><a href="products.php?cat=<?php echo $cat; ?>"><?php echo $cat; ?></a></li>
            <li><a href="products.php?id=<?php echo $cat_id ?>&cat=<?php echo $cat; ?>
            													&subcat=<?php echo $subcat ?>">
            																<?php echo $subcat; ?></a></li> 
            <li><a href="">Details</a></li>         
          </ul>
    </div>
    
    <div class="productContent">
    	
    	<?php
    		$query = "select * from products where prod_id = " . $prod_id;
			$results = mysqli_query($dbc, $query);	
			
			// print out product information from DB using prod_id
    		while($row = mysqli_fetch_assoc($results)) {    
	        	echo   "<p><h2>" . $row["title"] . "</h2></p>
	        		  	<span class=\"productImg\"><img src=\"" . $row["photo_loc"] . "\" height=\"450\" width=\"450\" /></span>
	        		  	<span>
	        		  		<p>Price: $" . $row["price"] . "</p><br/>
	        		  		<p>FEATURES:</p>
	        		  		<p>" . $row["desc"] . "</p>
	        		  	</span>";
			} // end while
    	?>
  				
    </div>
    
	</body>
</html>