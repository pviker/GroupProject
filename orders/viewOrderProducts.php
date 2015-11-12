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
                 <td>Photo</td>
                 <td>Product</td>
                 <td>Description</td>
                 <td>Price</td>
                 <td>Quantity</td>
                 
             </tr>

<?php

    $orderID = $_GET['orderid'];

    $productInfoQuery = "select order_items.qty, title, price, descr, photo_loc from order_items, products where order_items.prod_id = products.prod_id and products.prod_id in 
    (select order_items.prod_id from order_items where order_id='" . $orderID . "')";
    
    $productResults = mysqli_query($dbc, $productInfoQuery);
    
    // $qtyQuery = "select qty from orders, order_items where orders.orders_id=order_items.order_id and orders.orders_id='" . $orderID . "'";
//     
    // $qtyResults = mysqli_query($dbc, $qtyQuery);
    
    while($productRow = mysqli_fetch_assoc($productResults)) {
        
        echo "<tr>
        
                <td><img src=\"../" . $productRow['photo_loc'] . "\" height=\"100\" width=\"100\"></td>
                <td>" . $productRow['title'] . "</td>
                <td>" . $productRow['descr'] . "</td>
                <td>" . $productRow['price'] . "</td>
                <td>" . $productRow['qty']   . "</td>";
                
                
         // $qtyRow = mysqli_fetch_assoc($qtyResults);
//          
         // foreach($qtyRow as $qty) {
//              
             // echo "<td>" . $qty . "</td>";             
//              
         // }
             
             
                
        echo "</tr>";        
           
     }


?>

</table>

</div>

</body>

</html>


