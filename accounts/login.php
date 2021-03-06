<?php 	
/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: login.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This will be the login page for user login and to view all users.
 *   
 * */
 
 	if(null === session_id()){
		session_start();
	}

	require("../navigation.inc");
	$navigation = new Navigation();
	echo $navigation;
	
	require("../controllers/database.php");
  
	if(isset($_POST['Send'])) {
	    
	$username = $_POST['userName'];
	$password = $_POST['password'];
	
	}  
	
	// $admin = "administrator";
	// $adminPass = "password";
//     
	if((!isset($username)) || (!isset($password))) {
  
?>	

	<div class="breadcrumb">
		<nav>
		  <ul>
		    <li><a href="../index.php">home</a></li> <!-- ALWAYS INDEX.php -->
		    <li><a href="">login</a></li> <!-- ALWAYS SUBCATEGORY -->
		  </ul>
		</nav>
	</div>
	
	<!--START MAIN CONTENT-->
	<div class="mainContent">	
		<!-- <h1 class="indexH1"><a href="userinfo.php">View all users!</a></h1> -->	

		<!-- <form onsubmit="return submitForm()" action="mailinglistresults.html" method="post"> -->
		<form name="login" action="login.php" method="post">
			
			<fieldset id="field1">
				<legend>Credentials</legend>

				<label>User name:</label><input type="text" name="userName" placeholder="Enter username" size="25" class="fields" id="userName" /><br />
				<label>Password:</label><input type="password" name="password" placeholder="Enter password" size="25" class="fields" id="password" /><br />

			</fieldset>

			<div class="buttons">
				<input type="submit" class="buttons" name="Send" alt="Send" value="Send" />
				<input type="reset" class="buttons" name="Reset" value="Reset" />
			</div> 

			
		</form>
	
	</div>



<?php 

} else {
    
    $adminQuery = "select count(*) from credentials where username = '" . $username . "' and 
    password = sha1('" . $password . "') and admin = '1'";
    
    $result = mysqli_query($dbc, $adminQuery);
           
          
    if(!$result) {
        
        echo "Cannot run query.";
        exit;
        
    }
    
    $row = mysqli_fetch_row($result);
    $count = $row[0];
    
    if($count > 0) {
        
        $_SESSION['uname'] = $username;
        
        $_SESSION['confirmMessage'] = "Welcome " . $_SESSION['uname'];
        
        $_SESSION['adminFlag'] = 1;
        
        header("Location: userinfo.php");
    }
        
     
        
        
     else {
    
    $query = "select count(*) from credentials where username = '" . $username . "' and 
    password = sha1('" . $password . "')";
    
    $result = mysqli_query($dbc, $query);
    
    if(!$result) {
        
        echo "Cannot run query.";
        exit;
        
    }
    
    $row = mysqli_fetch_row($result);
    $count = $row[0];
    
    if($count > 0) {
        
        $_SESSION['uname'] = $username;
        
        $_SESSION['confirmMessage'] = "Welcome " . $_SESSION['uname'];
        
        $_SESSION['adminFlag'] = 0;
        
        header("Location: ../index.php");
        
    }
    
   
      else {
           
        
        ?>
        
      <div class="breadcrumb">
		<nav>
		  <ul>
		    <li><a href="../index.php">home</a></li> <!-- ALWAYS INDEX.php -->
		    <li><a href="">login</a></li> <!-- ALWAYS SUBCATEGORY -->
		  </ul>
		</nav>
	</div>
        
        <div class ="mainContent">
        	Your username or password are not correct. Please try again. <br /><br>
        	<a href = "login.php">Back to Login</a>       
        </div>
       
   <?php 
       
         }
    }
}




?>
	<!--END MAIN CONTENT-->
	</body>
</html>