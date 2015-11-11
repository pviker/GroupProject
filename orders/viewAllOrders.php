<?php 


/* 
 * ICS325 - Group Project
 * Iteration: 5
 * Group: D for Dolphins
 * File: userinfo.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This page displays all orders to admin
 *   
 * */


if(null === session_id()){
        session_start();
    }

    require("../navigation.inc");
    $navigation = new Navigation();
    echo $navigation;
    
    require("../controllers/database.php");
    
    if ($_SESSION['adminFlag'] !== 1) {
        header ('Location: login.php'); 
    }

?>


<div class="breadcrumb">    
          <ul>
            <li><a href="../index.php">home</a></li>
            <li><a href="../accounts/admin.php">admin</a></li> 
            <li><a href="">view all orders</a></li>           
          </ul>
    </div>
    

<div class = "mainContentTable">
        
        <h1 class="indexH1">All Orders</h1>
         
         <table class = "cartTable">
             <tr>
                 <td>Order ID</td>
                 <td>First Name</td>
                 <td>Last Name</td>
                 <td>Order Date</td>
                 <td>Total Amount</td>
                 <td>Products</td>
         </tr>
          
<?php 

      $selectOrdersQuery = "select * from orders order by date";
      
      $orderResults = mysqli_query($dbc, $selectOrdersQuery);
      
      $sortedUsersQuery = "select userid, first_name, last_name from users where userid in (select user_id from orders) order by last_name";
      
      $sortedUsersResults = mysqli_query($dbc, $sortedUsersQuery);
      
      // $sortedUserArray = array();
//       
      // while($row = mysqli_fetch_assoc($sortedUsersResults)) {
//                   
           // $sortedUserArray[] = $row;
//           
      // }
      
      // print_r($sortedUserArray);
      
      while($orderRow = mysqli_fetch_assoc($orderResults)) {
              
          // $userID = "";
//               
          // foreach($sortedUserArray as $temp) {
//               
              // $userID = $temp['userid'];
              
          
          
          $userQuery = "select first_name, last_name from users where users.userid = '" . $orderRow['user_id'] . "'";
          
          $userResults = mysqli_query($dbc, $userQuery);
          
          $userRow = mysqli_fetch_assoc($userResults);
          
          
          
          
      echo "<tr>
      
                <td>" . $orderRow['orders_id'] . "</td>
                <td>" . $userRow['first_name'] . "</td>
                <td>" . $userRow['last_name']  . "</td>
                <td>" . $orderRow['date']      . "</td>
                <td>" . $orderRow['amount']    . "</td>
                <td><a href=\"viewOrderProducts.php?orderid=" . $orderRow['orders_id'] . "\" style=\"color:black\"\">View Products</a></td>
                
           </tr>";
                
          } 
             
      // }
          
          
      
?>         
          
 </table>
 
</div>

</body>

</html>
