<?php 
   	session_start();     
/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: userinfo.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This page is only accessible by administrator. 
 *   
 * */
   require("../navigation.inc");
 
    $navigation = new Navigation();

    echo $navigation; 
    
	if ($_SESSION['uname'] !== 'administrator') {
<<<<<<< HEAD
        
    ?>
    
    <div class="breadcrumb">    
          <ul>
            <li><a href="../index.php">home</a></li>
            <li><a href="">login</a></li>            
          </ul>
    </div> 
    
    <?php
        
        
        echo "<div class = \"mainContent\">You are not authorized to view this page. <br><br>";
        echo "<a href = \"login.php\">Back to login</a></div>";
        exit;
        
=======
        header ('Location: login.php'); 
>>>>>>> origin/master
    }
	?>
 <!DOCTYPE html>
   <html>
      <body>
		
		<div class="breadcrumb">    
			  <ul>
				<li><a href="../index.php">home</a></li>
				<li><a href="">login</a></li>            
			  </ul>
		</div> 
		
		<div class = "mainContentTable">
     	<h1 class="indexH1"><?php echo $_SESSION['confirmMessage']; ?>!</h1> 
			<a href='userinfo.php'> View all users </a> 
       </div>
     
	 </body> 
</html>	 