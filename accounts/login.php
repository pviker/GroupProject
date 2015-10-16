<?php 
	session_start();	
/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: login.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This will be the login page for user login and to view all users.
 *   
 * */

	require("../navigation.inc");
 
	$navigation = new Navigation();

	echo $navigation;
    
$username = $_POST['userName'] ;
$password = $_POST['password'];
$admin = "administrator";
$adminPass = "password";
$_SESSION['uname'] = $username;
$_SESSION['confirmMessage'] = "";

/* UNCOMMENT FOR LOCAL DB CREDENTIALS */
    $dbUser = "user1";          
    $dbPass = "abc123";             
    $db = "music_electric";         

/* UNCOMMENT FOR SERVER DB CREDENTIALS */
//  $dbUser = "ics325fa1528";       
//  $dbPass = "983278";             
//  $db = "ics325fa1528";
    
if((!isset($username)) || (!isset($password))) {
  
?>	
	
	<!--START MAIN CONTENT-->
	<div class="mainContent">	
		<!-- <h1 class="indexH1"><a href="userinfo.php">View all users!</a></h1> -->	

		<!-- <form onsubmit="return submitForm()" action="mailinglistresults.html" method="post"> -->
		<form name="login" action="login.php" method="post">
			
			<fieldset id="field1">
				<legend>Credentials</legend>
				<label>User name:</label><input type="text" name="userName" value="Enter user name" size="25" class="fields" id="userName" /><br />
				<label>Password:</label><input type="password" name="password" value="" size="25" class="fields" id="password" /><br />
			</fieldset>

			<div class="buttons">
				<input type="submit" class="buttons" name="Send" alt="Send" value="Send" />
				<input type="reset" class="buttons" name="Reset" value="Reset" />
			</div> 

			
		</form>
	
	</div>

<?php 

} else {
            
    if(($username == $admin) && ($password == $adminPass)) {
           
           
        $_SESSION['confirmMessage'] = "Welcome " . $_SESSION['uname'];
        
        header("Location: userinfo.php");
        
        
    } else {
    
    @ $dbc = mysqli_connect('localhost', $dbUser, $dbPass, $db);
    
    if(mysqli_connect_errno() ) {
                echo "Error: could not connect to database. Please try again later.";
                exit;
    }
    
    $query = "select count(*) from credentials where username = '" . $username . "' and 
    password = '" . $password . "'";
    
    $result = mysqli_query($dbc, $query);
    
    if(!$result) {
        
        echo "Cannot run query.";
        exit;
        
    }
    
    $row = mysqli_fetch_row($result);
    $count = $row[0];
    
    if($count > 0) {
        
        $_SESSION['confirmMessage'] = "Welcome " . $_SESSION['uname'];
        
        header("Location: ../index.php");
    }
    
    else {
            
        echo "<div class = \"mainContent\"> Your username or password are not correct. Please try again. </div>";
        
    }
    
    
}

}


?>
	<!--END MAIN CONTENT-->
	</body>
</html>