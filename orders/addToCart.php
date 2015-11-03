<?php

	require ("cartHead.php");
	
	if (isset($_GET['prod_id'])){
		$_SESSION['myCart'][] = array("prod_id"=>$_GET['prod_id'], "qty"=>1);
	}
	
	header("Location: cart.php");

?>