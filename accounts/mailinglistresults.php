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

<<<<<<< HEAD
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
=======
    //USERS table data
    $firstName = $_SESSION['fname'];
    $lastName = $_SESSION['lname'];
/*    $date = $_POST['DATE'];
    $email = $_POST['EMAIL'];
    $dob = $_POST['DOB'];
    $address = $_POST['ADDRESS'];
    $city = $_POST['LOCALITY'];
    $state = $_POST['REGION'];
    $zip = $_POST['POSTAL'];
    $phone = $_POST['PHONE'];
    $gender = $_POST['GENDER'];
    
    //CREDENTIALS table data
*/    $username = $_SESSION['uname'];
/*    $password = $_POST['PASSWORD'];
>>>>>>> master
    
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
*/    
    ?>
    
    <div class="maincontent">
<<<<<<< HEAD
        
    
    
=======
    	<h1>Thank you <?php echo $firstName; ?>, for registering! <br />Account created for, <?php echo $username; ?></h1>
>>>>>>> master
    </div>
    
    
        
<?php

<<<<<<< HEAD
    //Close database connection
    mysqli_close($db);
=======
//    mysqli_close($db);
>>>>>>> master
	
?>    
	
    
