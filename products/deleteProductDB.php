<?php

	if(null === session_id()){
	    session_start();
	}

    require("../navigation.inc");
    $navigation = new Navigation();
    echo $navigation;

	 if ($_SESSION['adminFlag'] !== 1) {
	//	 header ('Location: ../accounts/login.php');
     }
	

	require("../controllers/database.php");

	//product id to session
	$id = $_SESSION["id"];


	if (isset($_POST['cancel'])){
		$_SESSION["message"] = "Cancelled record deletion";
		header ('Location: ../accounts/admin.php');
	} else if(isset($_POST['delete'])){
?>

	<div class="breadcrumb">
	    <ul>
	        <li><a href="../index.php">home</a></li>
	        <li><a href="">Add Product</a></li>
	    </ul>
	</div>
	
	<!--START MAIN CONTENT-->
	<div class="mainContent">
	   <!-- <form action="confirmEditProduct.php" method="post">-->
	        <fieldset id="field1">
	            <?php
		           // $id = $_SESSION['id'];

		            $sql = "delete from products where  prod_id = '". $id. "'";
		
		            if ($dbc->query($sql) === TRUE) {
		            	$_SESSION["message"] = "Record deleted successfully";


		            } else {
						$_SESSION["message"] = "Error Deleting Record";


		            }
		            //Free results from memory
		            //mysqli_free_result($results);
		            //Close database connection
		            mysqli_close($dbc);
                header("Location: ../accounts/admin.php");
		        }
	            ?>

