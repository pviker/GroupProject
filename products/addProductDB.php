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
		header ('Location: login.php');  
    }	
	
	require("../navigation.inc");
	require("../controllers/database.php");
	
	
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
	    $photo = $_POST['photo'];
	}
	
	$_SESSION["subcat"] = $subcat;
	$_SESSION["title"] = $title;
	$_SESSION["descr"] = $descr;
	$_SESSION["price"] = $price;
	$_SESSION["photo"] = $photo;
	/* UNCOMMENT FOR LOCAL DB CREDENTIALS */
	// $dbUser = "user1";
	// $dbPass = "abc123";
	// $db = "music_electric";
	
	var_dump($_POST);
	/* UNCOMMENT FOR SERVER DB CREDENTIALS */
	//	$dbUser = "ics325fa1528";
	//	$dbPass = "983278";
	//	$db = "ics325fa1528";
	
	//Database connection
	@ $dbc = mysqli_connect('localhost', $dbUser, $dbPass, $db);
	
	if(mysqli_connect_errno() ) {
	    echo "Error: could not connect to database. Please try again later.";
	    exit;
	}
	
	$productQuery = "insert into products (cat_id,title,descr,price,photo_loc) values ('" .$subcat. "', '" .$title. "', '" .$descr. "', '" .$price. "', '" .$photo. "')";
	if(mysqli_query($dbc, $productQuery)){
	    echo "Product Added";
	};
	
	header('Location: ../accounts/admin.php');

?>