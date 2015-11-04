<?php 

	// this page will update the qty for the selected item

	// echo "...nope not happening";
    
    // if(null === session_id()){
        session_start();
    // }
    
    require("../controllers/database.php");
    
    $newQty = $_POST['qty'];
    
    // print_r($_SESSION['myCart']);
    // foreach($_SESSION['myCart'] as $temp) {
        
    $prod = $_SESSION['myCart'][0];
    
    $prodID = $prod['prod_id'];
    
    $qtyQuery = "select qty from products where prod_id = '" . $prodID . "'";
    
    $result = mysqli_query($dbc, $qtyQuery);
    
    $row = mysqli_fetch_assoc($result);
    
    if($newQty > $row['qty']) {
        
       $_SESSION['qtyMessage'] = "There are not enough in stock.";
        
        header("Location: cart.php");
        
    } else {
        
        $updateQuery = "update products set qty='" . ($row['qty'] - $newQty) . "' where prod_id='" . $prodID . "'";
        
        mysqli_query($dbc, $updateQuery);
        
        header("Location: cart.php");
         
        
        
    }
    
    
    
    // }
?>