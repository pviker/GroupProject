<?php 

/* 
 * ICS325 - Group Project
 * Iteration: 5
 * Group: D for Dolphins
 * File: userinfo.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This page displays all products for an order
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

	<?php     
		if ($_SESSION['adminFlag'] == 1) {
    ?>
	     <div class="breadcrumb">    
	          <ul>
	            <li><a href="../index.php">home</a></li>
	            <li><a href="../accounts/admin.php">admin</a></li> 
	            <li><a href="viewAllOrders.php">view all orders</a></li>
	            <li><a href="">view products in order</a></li>           
	          </ul>
	     </div>
     <?php } else{ ?>
	     <div class="breadcrumb">    
	          <ul>
	            <li><a href="../index.php">home</a></li>
	            <li><a href="viewMyOrders.php">view my orders</a></li>
	            <li><a href="">view products in order</a></li>           
	          </ul>
	     </div>
     <?php } ?>
     
     
     <div class = "mainContentTable">
        
        <h1 class="indexH1">Products</h1>
         
         <table class = "cartTable">
             <tr>
                 <td>Order ID</td>
                 <td>Photo</td>
                 <td>Product</td>
                 <td>Description</td>
                 <td>Price</td>
                 <td>Quantity</td>
                 
             </tr>

<?php

    $orderID = $_GET['orderid'];

    // $productInfoQuery = "select order_items.qty, title, price, descr, photo_loc from order_items, products where order_items.prod_id = products.prod_id and products.prod_id in 
    // (select order_items.prod_id from order_items where order_id='" . $orderID . "')";
	
	$productInfoQuery = "select order_items.qty, descr, title, price, photo_loc from order_items, products where 
	 	order_items.prod_id=products.prod_id and order_id=".$orderID;
    
    $productResults = mysqli_query($dbc, $productInfoQuery);
    
    $totalAmount = "";
    
    while($productRow = mysqli_fetch_assoc($productResults)) {
        
        echo "<tr>
        
                <td>" . $orderID . "</td>        
                <td><img src=\"../" . $productRow['photo_loc'] . "\" height=\"100\" width=\"100\"></td>
                <td>" . $productRow['title'] . "</td>
                <td>" . $productRow['descr'] . "</td>
                <td>" . $productRow['price'] . "</td>
                <td>" . $productRow['qty']   . "</td>
             
             </tr>";      
             
             $totalAmount += $productRow['price'] * $productRow['qty'];  
           
     }

?>

</table>

</div>
<br><br>

<div class = "amountTable">

        <table>
             
             <tr>Total Amount</tr>
             
                <td>$<?php echo number_format($totalAmount * 1.07125, 2); ?></td>
                
         </table>       
                
</div>   

<?php 

    $userQuery = "select first_name, last_name, email, address, city, state, zip, phone from users, orders 
    where users.userid=orders.user_id and orders.orders_id='" . $orderID . "'";
    
    $userResult = mysqli_query($dbc, $userQuery);
    
    $userRow = mysqli_fetch_assoc($userResult);
    
?>

<br><br><br>
 <div class = "mainContentTable">
        
        <h1 class="indexH1">Customer Info</h1>
         
         <table class = "cartTable">
             <tr>
                 <td>First Name</td>
                 <td>Last Name</td>
                 <td>E-Mail</td>
                 <td>Address</td>
                 <td>City</td>
                 <td>State</td>
                 <td>Zip Code</td>
                 <td>Phone Number</td>
                 
             </tr>
             
             <td><?php echo $userRow['first_name']; ?></td>
             <td><?php echo $userRow['last_name']; ?></td>
             <td><?php echo $userRow['email']; ?></td>
             <td><?php echo $userRow['address']; ?></td>
             <td><?php echo $userRow['city']; ?></td>
             <td><?php echo $userRow['state']; ?></td>
             <td><?php echo $userRow['zip']; ?></td>
             <td><?php echo $userRow['phone']; ?></td>
           
           
           </table>     

</body>

</html>


