<?php

/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: userinfo.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This page echoes all current users in the database.
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

      $addQuery = "insert into categories (category, subcategory) values ('". $category . "', '" . $newSubcat . "')";

      if(mysqli_query($dbc, $addQuery)) {
          
          echo "<div class=\"mainContent\"> New Sub-Category added successfully!</div>";
          
      }

?>




