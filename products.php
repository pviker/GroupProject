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
	
	$id = "";
	$cat = "";
	$subcat = "";
	
	if (isset($_GET["id"])){
		$id = $_GET["id"];
	}
	
	if (isset($_GET["cat"])){
		$cat = $_GET["cat"];
	}
	
	if (isset($_GET["subcat"])){
		$subcat = $_GET["subcat"];
	}
	
//	$query = "select * from products where cat_id = " . $id;
//	$results = mysqli_query($dbc, $query);
    
 ?>
 
	<div class="breadcrumb">    
          <ul>
            <li><a href="index.php">home</a></li>
            <li><a href="products.php?cat=<?php echo $_GET["cat"]; ?>"><?php echo $_GET["cat"]; ?></a></li>
            <?php if (isset($_GET["subcat"])){ ?>
            	<li><a href=""><?php echo $_GET["subcat"];  ?></a></li> 
            <?php } ?>         
          </ul>
    </div>
    
    <div class = "mainContent">
    	
     	<h1>Products page in progress...</h1> <br/>
     	
     	<table>
     	<?php 
     		
     		//$this->server = $server;
     	
     		$query = "select * from products where cat_id = " . $id;
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