<?php

/* 
 * ICS325 - Group Project
 * Iteration: 5
 * Group: D for Dolphins
 * File: userinfo.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This page displays all orders for a logged in user
 *   
 * */


if(null === session_id()){
        session_start();
    }

    require("../navigation.inc");
    $navigation = new Navigation();
    echo $navigation;
    
    require("../controllers/database.php");
    
    if (!isset($_SESSION['uname'])) {
        header ('Location: ../accounts/login.php');  
    }
    
    
    
?>

<div class="breadcrumb">    
          <ul>
            <li><a href="../index.php">home</a></li>
            <li><a href="">view my orders</a></li>           
          </ul>
     </div>

<?php  

     $userQuery = "select userid from credentials where username = '" . $_SESSION['uname'] . "'";
     
     $userResult = mysqli_query($dbc, $userQuery);
     
     $userRow = mysqli_fetch_assoc($userResult);
     
     $orderQuery = "select orders_id, amount, date from orders where user_id = '" . $userRow['userid'] . "' order by date";
     
     $orderResult = mysqli_query($dbc, $orderQuery);
     
     
     




?>
