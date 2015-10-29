<?php

	if(null === session_id()){
	    session_start();
	    //  if ($_SESSION['uname'] !== 'administrator') {
	    //       header ('Location: login.php');
	       }
	
	require("../navigation.inc");
	$navigation = new Navigation();
	echo $navigation;
	
	$id = $_GET['id'];
	$_SESSION['id'] = $id;
	
	if ($_SESSION['adminFlag'] !== 1) {
		header ('Location: ../accounts/login.php');  
    }
	
?>

	<div class="breadcrumb">
	    <ul>
	        <li><a href="../index.php">home</a></li>
	        <li><a href="../products/editProduct.php">products</a></li>
	        <li><a href="">Delete Product</a></li>
	    </ul>
	</div>
	
	<!--START MAIN CONTENT-->
	<div class="mainContent">
	 
	 <h1 class="indexH1">Are you Sure?</h1>
	    
	    <form action="deleteProductDB.php" method="post">
	
	<div class="buttons">
	    <input type="submit" class="buttons" name="delete" alt="delete" value="delete" id="delete" />
	    <input type="submit" class="buttons" name="cancel" value="cancel" />
	</div>
	<!--END MAIN CONTENT-->

	</body>
</html>
