<?php   
/* 
 * ICS325 - Group Project
 * Iteration: 4
 * Group: D for Dolphins
 * File: edituser.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: Admin page for editing registered user information.
 *   
 * */
 
    if(null === session_id()){
        session_start();
    }

    require("../navigation.inc");
    $navigation = new Navigation();
    echo $navigation;
    
    require("../controllers/database.php");

?>
        
	<div class="breadcrumb">
        <nav>
          <ul>
            <li><a href="../index.php">home</a></li><!-- ALWAYS INDEX.php -->
            <li><a href="admin.php">admin</a></li> 
            <li><a href="">edit user</a></li> <!-- ALWAYS SUBCATEGORY -->
          </ul>
        </nav>
    </div>
    
    <br><br>
    
    <div class = "mainContent">
        
        <form name="searchUser" action="edituser.php" method="post">
            
            <fieldset id="field1">
                
              <label>Search for user:</label>
            
                   <input type="text" name="search" placeholder="Enter username to search" size="40">
                 
                   <input type="submit" name="submitSearch" value="Search">
            
            </fieldset>
                 
        </form>
        
        
        
        <form name="editUser" action="edituser.php" method="post">
            
            <fieldset id = "field1">
                
               <label>Username:</label>
                   <input type="text" name="userName" size="40"><br>
                   
               <label>First Name:</label>
                   <input type="text" name="fName" size="40"><br>
            
               <label>Last Name:</label>
                   <input type="text" name="lName" size="40"><br>
                
               <label>E-mail:</label>
                   <input type="text" name="email" size="40"><br>
                   
               <label>Date of Birth:</label>
                   <input type="text" name="dob" size="15"><br>
                   
               <label>Address:</label>
                   <input type="text" name="address" size="40"><br>
                   
               <label>City:</label>
                   <input type="text" name="city" size="40"><br>
                   
               <label>State:</label>
                   <input type="text" name="state" size="5"><br>
                   
               <label>Zip Code:</label>
                   <input type="text" name="zip" size="10"><br>
                   
               <label>Phone Number:</label>
                   <input type="text" name="phone" size="15"><br>
                   
               <label>Gender:</label>
                   <input type="text" name="gender" size="10"><br>
                   
               <label>Admin:</label>
                   <input type="text" name="lName" size="5"><br>
            
            </fieldset>
            
        </form>
        
        
     </div>
        
    </body>
    
</html>