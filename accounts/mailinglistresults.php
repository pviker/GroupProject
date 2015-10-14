<?php 
    session_start();    
/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: mailinglistresults.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This is an account creation confirmation.
 *   
 * */

    require("../navigation.inc");
    $navigation = new Navigation();
    echo $navigation;
 
?>


<?php

    //USERS table data from form
    $firstName = $_SESSION["fname"];
    $lastName = $_SESSION["lname"];
    $date = $_SESSION["date"];
    $email = $_SESSION["email"];
    $dob = $_SESSION["dob"];
    $address = $_SESSION["add"];
    $city = $_SESSION["cty"];
    $state = $_SESSION["state"];
    $zip = $_SESSION["zip"];
    $phone = $_SESSION["phone"];
    $gender = $_SESSION["sex"];
    
    //CREDENTIALS table data form
    $username = $_SESSION["uname"];
    $password = $_SESSION["pwd"];
    
/* UNCOMMENT FOR LOCAL DB CREDENTIALS */
	$dbUser = "user1";			
	$dbPass = "abc123";				
	$db = "music_electric";			

/* UNCOMMENT FOR SERVER DB CREDENTIALS */
//	$dbUser = "ics325fa1528";		
//	$dbPass = "983278";				
//	$db = "ics325fa1528";			
	
    //Database connection
    @ $db = mysqli_connect('localhost', $dbUser, $dbPass, $db);
    
    if(mysqli_connect_errno() ) {
                echo "Error: could not connect to database. Please try again later.";
                exit;
            }

    //Insert query for 'users' table
    $usersQuery = "insert into users (first_name, last_name, date, email, dob, address, city, state, 
    zip, phone, gender) values ('" . $firstName . "', '" . $lastName . "', '" . $date . "', '" . $email . "', '" . $dob 
    . "', '" . $address . "', '" . $city . "', '" . $state . "', '" . $zip . "', '" . $phone . "', '" . $gender . "')";
    
    //Insert into 'users'
    mysqli_query($db, $usersQuery);

    //Get id from last insert
    $last_id = mysqli_insert_id($db);
    
    //Insert query for 'credentials' table
    $credentialsQuery = "insert into credentials (userid, username, password) values ('" . $last_id . "', '" 
    . $username . "', '" . $password . "')";
    
    //Insert into 'credentials'
    mysqli_query($db, $credentialsQuery);
   
    ?>
    
    <div class="maincontent">

    	<h1>Thank you <?php echo $firstName; ?>, for registering! <br />Account created for, <?php echo $username; ?></h1>

    </div>
    
<?php
    //Close database connection
    mysqli_close($db);
?>    
	
    
