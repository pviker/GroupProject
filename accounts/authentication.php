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

$username = $_POST['userName'] ;
$password = $_POST['password'];
$admin = "administrator";
$adminPass = "password";

/* UNCOMMENT FOR LOCAL DB CREDENTIALS */
    $dbUser = "user1";          
    $dbPass = "abc123";             
    $db = "music_electric";         

/* UNCOMMENT FOR SERVER DB CREDENTIALS */
//  $dbUser = "ics325fa1528";       
//  $dbPass = "983278";             
//  $db = "ics325fa1528";

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
            
        echo "<div class = \"mainContent\"> Welcome " . $username . "! </div>";
        
    }
    
    else {
            
        echo "Your username or password are not correct. Please try again.";
        
    }
  
?>


