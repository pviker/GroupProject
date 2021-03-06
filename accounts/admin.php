<?php    
/* 
 * ICS325 - Group Project
 * Iteration: 4
 * Group: D for Dolphins
 * File: admin.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: Admin homepage 
 *   
 * */
 
  	if(null === session_id()){
		session_start();
	}
	require("../navigation.inc");
    $navigation = new Navigation();
    echo $navigation; 
    
?>
    
    <div class="breadcrumb">    
          <ul>
            <li><a href="../index.php">home</a></li>
            <li><a href="">admin</a></li>            
          </ul>
    </div> 
    
    <?php
    
	if ($_SESSION['adminFlag'] !== 1) {
    	header ('Location: login.php'); 
    }
    
	?>
		
	<div class = "mainContent">
		
		<h1 class="indexH1">Administration Page </h1><br />
     	<!-- <h2 class="indexH1"><?php echo $_SESSION['confirmMessage']; ?>!</h2> -->
		<h2 class="indexH1">
			<span><a href="userinfo.php">View registered users</a></span> | 
			<span><a href="edituser.php">Edit users</a></span> |
			<span><a href="newCategory.php">Add new category</a></span><br /> 
			<span><a href="addProduct.php">Add product</a></span> |
			<span><a href="editProduct.php">Edit product</a></span>
		</h2>
   
    </div>
     
	 </body> 
</html>	 