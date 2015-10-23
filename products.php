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
     	<h1>PRODUCT PAGE ---- IN PROGRESS</h1> <br/>			
    </div>
    
	</body>

</html>