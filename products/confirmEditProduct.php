<?php

	if(null === session_id()){
	    session_start();
	}
	require("../navigation.inc");
	require("../controllers/database.php");
	require("../controllers/upload.php");
$id = $_SESSION['id'];
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
	    $price = $_POST['price'];
	}
	if (isset($_POST['oldphoto'])) {
	    $photo = $_POST['oldphoto'];
        $sql = "update products set cat_id='". $catID. "', title='". $title. "',descr='". $descr. "',price='". $price. "' where prod_id ='". $id. "'";
	}
	if ($_FILES['photo']['name'] != "") {
        $photo = "images/" .$_FILES['photo']['name'];
        $sql = "update products set cat_id='". $catID. "', title='". $title. "', descr='". $descr. "',price='". $price. "',
				photo_loc='". $photo. "' where prod_id ='". $id. "'";
	}


	//$_SESSION['catid'] = $catID;


	if ($dbc->query($sql) === TRUE) {
		$_SESSION["message"] = "Record edit successful";
	    echo "Record updated successfully";
		header("Location: ../accounts/admin.php");
	} else {
	    echo "Error updating record: " . $dbc->error;
	}
	mysqli_close($dbc);
	$_SESSION['cid'] = "";
	//$_SESSION['']
	
?>
