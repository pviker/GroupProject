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

<div class = "mainContent">
     
     <h1 class="indexH1">Add Category</h1>
     
          <form action="addCategoryDB.php" name="addCategory" method="post">
              
              <fieldset id="field1">
              
              <label>Category:</label>
              
                   <select name="category">
                       
                       <option value="">Select:</option>
                       <option value="guitars">Guitars</option>
                       <option value="amps">Amps</option>
                       <option value="drums">Drums</option>
                       
                   </select><br>
                   
               <label>New Sub-Category:</label>
               
                    <input type="text" name="newSubcat" size="40"><br>
                    
                    <label>Add Sub-Category</label>
                    <input type="submit" value="Add">
              
              </fieldset>
              
          </form>
    
    
</div>

</body>

</html>
