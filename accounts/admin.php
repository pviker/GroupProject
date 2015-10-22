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
        
    ?>
    
    <div class="breadcrumb">    
          <ul>
            <li><a href="../index.php">home</a></li>
            <li><a href="">login</a></li>            
          </ul>
    </div> 
    
    <?php
        
        // header ('Location: ../index.php'); 
        echo "<div class = \"mainContent\">You are not authorized to view this page. <br><br>";
        echo "<a href = \"login.php\">Please Log In</a></div>";
        exit;
        
    }
    
    ?>
    
<!DOCTYPE html>

<html>
    <body>
		<div class = "mainContentTable">
     	<h1 class="indexH1"><?php echo $_SESSION['confirmMessage']; ?>!</h1>
         
			<a href='userinfo.php'> View all users </a> 

       </div>
     
	 </body> 
</html>	 