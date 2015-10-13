<?php 
    session_start();    
/* 
 * ICS325 - Group Project
 * Iteration: 1
 * Group: D for Dolphins
 * File: electrics.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: Electric guitar product listing page.
 *   
 * */

    require("../navigation.inc");
 
    $navigation = new Navigation();

    echo $navigation;
    
 
?>


<?php 

    //USERS table data from form
    $firstName = $_POST['FIRST'];
    $lastName = $_POST['LAST'];
    $date = $_POST['DATE'];
    $email = $_POST['EMAIL'];
    $dob = $_POST['DOB'];
    $address = $_POST['ADDRESS'];
    $city = $_POST['LOCALITY'];
    $state = $_POST['REGION'];
    $zip = $_POST['POSTAL'];
    $phone = $_POST['PHONE'];
    $gender = $_POST['GENDER'];
    
    //CREDENTIALS table data form
    $username = $_POST['USERNAME'];
    $password = $_POST['PASSWORD'];
    
    //Database connection
    @ $db = mysqli_connect('localhost', 'user1', 'abc123', 'music_electric');
    
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
        
    <p>Thank you for registering!</p><br>
    <p>Welcome to Music Electric!</p>
    
    </div>
    
<?php

    //Close database connection
    mysqli_close($db);
	
?>    
	
    
