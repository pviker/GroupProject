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
	
	require("../controllers/database.php");
 
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

    //Insert query for 'users' table
    $usersQuery = "insert into users (first_name, last_name, date, email, dob, address, city, state, 
    zip, phone, gender) values ('" . $firstName . "', '" . $lastName . "', '" . $date . "', '" . $email . "', '" . $dob 
    . "', '" . $address . "', '" . $city . "', '" . $state . "', '" . $zip . "', '" . $phone . "', '" . $gender . "')";
    
    //Insert into 'users'
    mysqli_query($dbc, $usersQuery);

    //Get id from last insert
    $last_id = mysqli_insert_id($dbc);
    
    //Insert query for 'credentials' table
    $credentialsQuery = "insert into credentials (userid, username, password) values ('" . $last_id . "', '" 
    . $username . "', sha1('" . $password . "'))";
    
    //Insert into 'credentials'
    mysqli_query($dbc, $credentialsQuery);
   
    ?>
    
    <div class="breadcrumb">    
          <ul>
            <li><a href="../index.php">home</a></li>
            <li><a href="">register</a></li>            
          </ul>
    </div>
    
    <div class="maincontent">     

    	<h1>Thank you <?php echo $firstName; ?> for registering! <br />Account created for: <?php echo $username; ?></h1>

    </div>
    
<?php
    //Close database connection
    mysqli_close($dbc);
?>    
	
    
