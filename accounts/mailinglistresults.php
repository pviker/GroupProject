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

    //USERS table data
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
    
    //CREDENTIALS table data
    $username = $_POST['USERNAME'];
    $password = $_POST['PASSWORD'];
   
    
    //echo "<div class=\"mainContent\"><h1>" . $_POST['FIRST'] . "</h1></div>";
    
    @ $db = mysqli_connect('localhost', 'user1', 'abc123', 'music_electric');
    
    if(mysqli_connect_errno() ) {
                echo "Error: could not connect to database. Please try again later.";
                exit;
            }
    
    $query = "insert into users (first_name, last_name, date, email, dob, address, city, state, 
    zip, phone ) values ('" . $firstName . "', '" . $lastName . "', '" . $date . "', '" . $email . "', '" . $dob 
    . "', '" . $address . "', '" . $city . "', '" . $state . "', '" . $zip . "', '" . $phone . "')";
    
    if (mysqli_query($db, $query)) {
        
    $last_id = mysqli_insert_id($db);
        
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    
    } else {
        
    echo "Error: could not complete query.";
    
    }
    
    echo $last_id;
    
    mysqli_close($db);
	
	
    
?>