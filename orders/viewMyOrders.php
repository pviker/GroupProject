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
     
     <div class = "mainContentTable">
        
        <h1 class="indexH1">My Orders</h1>
         
         <table class = "cartTable">
             <tr>
                 <td>Order ID</td>
                 <td>Order Date</td>
                 <td>Total Amount</td>
                 <td>Products</td>
         </tr>

<?php  

     $userQuery = "select userid from credentials where username = '" . $_SESSION['uname'] . "'";
     
     $userResult = mysqli_query($dbc, $userQuery);
     
     $userRow = mysqli_fetch_assoc($userResult);
     
     $orderQuery = "select orders_id, amount, date from orders where user_id = '" . $userRow['userid'] . "' order by date";
     
     $orderResult = mysqli_query($dbc, $orderQuery);
     
     while($orderRow = mysqli_fetch_assoc($orderResult)) {
         
          echo "<tr>
      
                <td>" . $orderRow['orders_id'] . "</td>
                <td>" . $orderRow['date'] . "</td>
                <td>" . $orderRow['amount']  . "</td>
                <td><a href=\"viewOrderProducts.php?orderid=" . $orderRow['orders_id'] . "\" style=\"color:black\"\">View Products</a></td>
                
           </tr>";
         
         
         
         
     }
     
     
?>

</table>

</div>

</body>

</html>
