<?php

	if(null === session_id()){
	    session_start();
	}
	//if ($_SESSION['uname'] !== 'administrator') {
	  //  header ('Location: login.php');
	//}
	
	//var_dump($_SESSION);
	// $dbUser = "user1";
	// $dbPass = "abc123";
	// $db = "music_electric";
	
	require("../navigation.inc");
	require("../controllers/database.php");
//	var_dump($_POST);
	
	if ($_SESSION['adminFlag'] !== 1) {
		header ('Location: ../accounts/login.php');  
	}	
	
	if (isset($_POST['category'])){
	    $cat = $_POST["category"];
	    $cat = strtolower($cat);
	
	}
	if (isset($_POST['subcategory'])) {
	    $sub = $_POST["subcategory"];
	    $sub = strtolower($sub);
	}
	if (isset($_POST['catid'])) {
	    $catID = $_POST['catid'];
	    if($catID == ""){
	    $subcat = $_SESSION['sub'];
	        $cat = $_SESSION['cat'];
	        $catID = $_SESSION['cid'];
	    }
	
	}
	
	if (isset($_POST['title'])) {
	    $title = $_POST['title'];
	}
	if (isset($_POST['descr'])) {
	    $descr = $_POST['descr'];
	}
	if (isset($_POST['price'])) {
	    $pr = $_POST['price'];
	    $price = (int)$pr;
	}
	if (isset($_POST['photo'])) {
	    $photo = $_POST['photo'];
	}
	// if (isset($_POST['newPhoto'])) {
	    // $photo= $_POST['newPhoto'];
	// }
	
//	var_dump($photo);
	$_SESSION['catid'] = $catID;
	$id = $_SESSION['id'];
	
	// $dbUser = "user1";
	// $dbPass = "abc123";
	// $db = "music_electric";
	
	
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
	
	//$productQuery = "select products.prod_id,products.title,products.descr,products.price,
	//	products.photo_loc,categories.category,categories.subcategory from products ,categories  
	//		where products.cat_id = categories.id";
	
	$sql = "update products set cat_id='". $catID. "', title='". $title. "',descr='". $descr. "',price='". $price. "',
				photo_loc='". $photo. "' where prod_id ='". $id. "'";
				
	//$results = mysqli_query($dbc, $sql);
	
	if ($dbc->query($sql) === TRUE) {
		$_SESSION["message"] = "Record edit successful";
	    echo "Record updated successfully";
		header("Location: ../accounts/admin.php");
	} else {
	    echo "Error updating record: " . $dbc->error;
	}
	
	//Free results from memory
	//mysqli_free_result($results);
	//Close database connection
	mysqli_close($dbc);
	$_SESSION['cid'] = "";
	
?>
