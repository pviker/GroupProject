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
    
    echo "<div class=\"mainContent\"><h1>" . $_POST['FIRST'] . "</h1>";
    
    @ $db = mysqli_connect('localhost', 'user1', 'abc123', 'music_electric');
    
    if(mysqli_connect_errno() ) {
                echo "Error: could not connect to database. Please try again later.";
                exit;
            }
    
    $query = "insert into users (first_name, last_name) values ('" . $_POST['FIRST'] . "', '" . 
    $_POST['LAST'] . "')";
    
 //   $result = 
    mysqli_query($db, $query);
	
	echo "</div>";
    
//    mysqli_free_result($result);
    mysqli_close($db);
	
	
    
?>