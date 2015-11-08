<?php
/* 
 * ICS325 - Group Project
 * Iteration: 5
 * Group: D for Dolphins
 * File: orderDB.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: Persists customer orders
 *   
 * */
 
	if(!isset($_SESSION)) session_start();
	if(!isset($_SESSION['uname'])) header("Location: ../accounts/login.php");
	if(!isset($_SESSION['myCart'])) header("Location: cart.php");

	require("../controllers/database.php");
	require("cartHead.php");


	// after persisting to the DB, unset cart session vars
	// unset($_SESSION['myCart']);
	// unset($_SESSION['myTotalQuantity']);
	// unset($_SESSION['myTotalPrice']);
?>

