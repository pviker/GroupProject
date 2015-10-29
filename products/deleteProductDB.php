<?php

	if(null === session_id()){
	    session_start();
	    //  if ($_SESSION['uname'] !== 'administrator') {
	    //       header ('Location: login.php');
	 // }
	}
	//product id
	
	 if ($_SESSION['adminFlag'] !== 1) {
		 header ('Location: ../accounts/login.php');  
     }
	
	require("../navigation.inc");
	$navigation = new Navigation();
	echo $navigation;
	require("../controllers/database.php");

	//product id to session
	//$_SESSION["id"] = $id;

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
	    <form action="confirmEditProduct.php" method="post">
	        <fieldset id="field1">
	            <?php
		            $id = $_SESSION['id'];
		            $con=mysqli_connect("localhost",$dbUser,$dbPass,$db);
		            // Check connection
		            if (mysqli_connect_errno())
		            {
		                echo "Failed to connect to MySQL: " . mysqli_connect_error();
		            }
		            $sql = "delete from products where  prod_id = '". $id. "'";
		
		            if ($con->query($sql) === TRUE) {
		            	$_SESSION["message"] = "Record deleted successfully";
		                echo "Record deleted successfully";
		                header("Location: ../accounts/admin.php");
		            } else {
		                echo "Error deleting record: " . $con->error;
		            }
		            //Free results from memory
		            //mysqli_free_result($results);
		            //Close database connection
		            mysqli_close($con);
		        //    header("Location: accounts/admin.php");
		        }
	            ?>

