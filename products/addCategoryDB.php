<?php

/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: addCategoryDB.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This page adds a new sub-category to the DB
 *   
 * */

	if(null === session_id()){
	    session_start();
	}
	
	
	require("../navigation.inc");
	$navigation = new Navigation();
	echo $navigation;
	
	require("../controllers/database.php");
	
	if ($_SESSION['adminFlag'] !== 1) {
		header ('Location: ../accounts/login.php'); 
	}

?>

<div class="breadcrumb">
    <ul>
        <li><a href="../index.php">home</a></li>
        <li><a href="../accounts/admin.php">admin</a></li>
        <li><a href="">products</a></li>
    </ul>
</div>

<?php

      if(isset($_POST['category'])) {
          $category = $_POST['category'];
      }
      
      if(isset($_POST['newSubcat'])) {
          $newSubcat = $_POST['newSubcat'];
      }
      
      if(isset($_POST['description'])) {
          $description = $_POST['description'];
      }

      

      $addQuery = "insert into categories (category, subcategory, description) values ('". $category . "', '" . $newSubcat . 
      "', '" . $description . "')";

      if(mysqli_query($dbc, $addQuery)) {
          
          $_SESSION["message"] = "New sub-category added successfully!";
          
      }
      
     header('Location: ../accounts/admin.php');
     

?>

</body>

</html>


