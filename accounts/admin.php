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
	if ($_SESSION['uname'] != 'administrator') {
		header ('Location: ../index.php'); 
	}
?>
<!DOCTYPE html>

<html>
    <body>
		<div class = "mainContentTable">
     	<h1 class="indexH1"><?php echo $_SESSION['confirmMessage']; ?>!</h1>
         
			<a href='userinfo.php'> show the users from the database </a> 

       </div>
     
	 </body> 
</html>	 