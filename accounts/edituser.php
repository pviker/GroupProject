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
    
    if(isset($_POST['submitSearch'])) {
        
    $usernameSearch = $_POST['search'];
        
    $userQuery = "select credentials.username, first_name, last_name, email, dob, address, city, state, 
    zip, phone, gender, credentials.admin from users, credentials where users.userid = credentials.userid and 
    username = '" . $usernameSearch . "'";
    
    $result = mysqli_query($dbc, $userQuery);
    
    while($row = mysqli_fetch_assoc($result)) {
        
        $username = $row['username'];
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $email = $row['email'];
        $dob = $row['dob'];
        $address = $row['address'];
        $city = $row['city'];
        $state = $row['state'];
        $zip = $row['zip'];
        $phone = $row['phone'];
        $gender = $row['gender'];
        $admin = $row['admin'];
        
    }

  }
    
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
    
    <div class = "mainContent">
    	
    	<h1 class="indexH1">Edit User</h1>
        
        <form name="searchUser" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
            
            <fieldset id="field1">
                
              <label>Search for user:</label>
            
                   <input type="text" name="search" placeholder="Enter username to search" size="40">
                 
                   <input type="submit" name="submitSearch" value="Search">
            
            </fieldset>
                 
        </form>
        
        
        <?php if(isset($_POST['submitSearch'])) { ?>
            
        <form name="editUser" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
            
            <fieldset id = "fieldYN">
                
               <label>Username:</label>
                   <input type="text" name="userName" readonly="true" value = "<?php echo $username ?>" size="40"><br>
                   
               <label>First Name:</label>
                   <input type="text" name="fName" value = "<?php echo $fname ?>" size="40"><br>
            
               <label>Last Name:</label>
                   <input type="text" name="lName" value = "<?php echo $lname ?>" size="40"><br>
                
               <label>E-mail:</label>
                   <input type="text" name="email" value = "<?php echo $email ?>" size="40"><br>
                   
               <label>Date of Birth:</label>
                   <input type="text" name="dob" value = "<?php echo $dob ?>" size="15"><br>
                   
               <label>Address:</label>
                   <input type="text" name="address" value = "<?php echo $address ?>" size="40"><br>
                   
               <label>City:</label>
                   <input type="text" name="city" value = "<?php echo $city ?>" size="40"><br>
                   
               <label>State:</label>
                   <input type="text" name="state" value = "<?php echo $state ?>" size="5"><br>
                   
               <label>Zip Code:</label>
                   <input type="text" name="zip" value = "<?php echo $zip ?>" size="10"><br>
                   
               <label>Phone Number:</label>
                   <input type="text" name="phone" value = "<?php echo $phone ?>" size="15"><br>
                   
               <label>Gender:</label>
                   <input type="text" name="gender" value = "<?php echo $gender ?>" size="10"><br>
                   
               <label>Admin:</label>
                   <input type="text" name="admin" value = "<?php echo $admin ?>" size="5"><br>
            
            </fieldset>
            
        </form>
        
        <?php } ?>
        
     </div>
        
    </body>
    
</html>