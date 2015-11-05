<?php
/**
 * Created by PhpStorm.
 * User: Crunk_Baller
 * title: 10/26/2015
 * Time: 10:20 AM
 */
	if(null === session_id()){
	    session_start();
	}
	
	 if ($_SESSION['adminFlag'] !== 1) {
		 header ('Location: ../accounts/login.php');  
     }
	require("../controllers/upload.php");
	require("../navigation.inc");
	require("../controllers/database.php");
	
	if (isset($_POST['category'])) {
	    $cat = $_POST['category'];
	}
	if (isset($_POST['subcat'])) {
	    $subcat = $_POST["subcat"];
	}
	if (isset($_POST['title'])) {
	    $title = $_POST['title'];
	}
	if (isset($_POST['descr'])) {
	    $descr = $_POST['descr'];
	}
	if (isset($_POST['price'])) {
	    $price = $_POST['price'];
	}
	if (isset($_POST['photo'])) {
	    $photo = "images/" . $_POST['photo'];
	}
	

	$photo = "images/" .$photoBase;
	
	$_SESSION["subcat"] = $subcat;
	$_SESSION["title"] = $title;
	$_SESSION["descr"] = $descr;
	$_SESSION["price"] = $price;
	$_SESSION["photo"] = $photo;

	
	$productQuery = "insert into products (cat_id,title,descr,price,photo_loc) 
						values ('" .$subcat. "', '" .$title. "', '" .$descr. "', '" .$price. "', '" .$photo. "')";
	if(mysqli_query($dbc, $productQuery)){
		$_SESSION["message"] = "New product upload successful!";
	};
    mysqli_close($dbc);
	header('Location: ../accounts/admin.php');

?>