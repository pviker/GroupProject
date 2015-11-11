<?php

	if(null === session_id()){
	    session_start();
	}
	session_start();
	
	if ($_SESSION['adminFlag'] !== 1) {
		header ('Location: ../accounts/login.php');
	}
	
	if (isset($_POST['cancel'])){
		$_SESSION["message"] = "Cancelled record deletion";
		header ('Location: ../accounts/admin.php');
	} else if(isset($_POST['delete'])){

		require("../controllers/database.php");
	
		//product id to session
		$id = $_SESSION["id"];
		
		$sql = "delete from products where  prod_id = ". $id;
		
		if ($dbc->query($sql) === TRUE) {
			$_SESSION["message"] = "Record deleted successfully";
			echo $_SESSION['message'];
		} else {
			$_SESSION["message"] = "Error Deleting Record";
			echo $_SESSION['message']. "\n";
			echo $sql;
		}
		
		//Free results from memory
		//mysqli_free_result($results);
		//Close database connection
		mysqli_close($dbc);

	
		header("Location: ../accounts/admin.php");
	}
?>

