<?php

	if (!isset($_SESSION)) session_start();
	 
	// start session and init cart here, then require this page in all other pages
	 
	if(!isset($_SESSION['myCart']))  {
	   $_SESSION['myCart'] = array();
	   $_SESSION['myTotalItems'] = 0;
	   $_SESSION['myTotalPrice'] = 0;
	}


?>

