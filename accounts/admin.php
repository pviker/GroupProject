<?php    
/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: userinfo.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This page is only accessible by administrator. 
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
    
	if ($_SESSION['uname'] !== 'administrator') {
 
        // echo "<div class = \"mainContent\">You are not authorized to view this page. <br><br>";
        // echo "<a href = \"login.php\">Back to login</a></div>";
        // exit;
        

        header ('Location: login.php'); 

    }
	?>
 <!DOCTYPE html>
   <html>
      <body>
		
		<!-- <div class="breadcrumb">    
			  <ul>
				<li><a href="../index.php">home</a></li>
				<li><a href="">admin</a></li>            
			  </ul>
		</div>  -->
		
		<div class = "mainContent">
     	<h1 class="indexH1"><?php echo $_SESSION['confirmMessage']; ?>!</h1> 
			<h2 class="indexH1"><a href='userinfo.php'>View all users</a></h1> 
       </div>
     
	 </body> 
</html>	 