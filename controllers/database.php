<?php

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
    @ $dbc = mysqli_connect('localhost', $dbUser, $dbPass, $db);
    
    if(mysqli_connect_errno() ) {
                echo "Error: could not connect to database. Please try again later.";
                exit;
            }
/***** DB INCLUDE FILE TEMPLATE*****
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
 *
 */
	
?>
  