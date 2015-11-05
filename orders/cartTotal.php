<?php

	require ("cartHead.php");
	
	$myCart = $_SESSION['myCart'];
	$totalQty = 0;

	foreach($myCart as $key => $value) {
		$totalQty += $myCart[$key]['qty'];
	}
	
	$_SESSION['myTotalQuantity'] = $totalQty;

?>