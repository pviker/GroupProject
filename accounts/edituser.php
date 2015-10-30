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
    
    if ($_SESSION['adminFlag'] !== 1) {
        header ('Location: login.php'); 
    }
    
    // if(isset($_POST['submitSearch'])) {
//         
    // $usernameSearch = $_POST['search'];
    
    if(isset($_GET['id'])) {
        
        $userId = $_GET['id'];
        
    
    
        
    $userQuery = "select credentials.username, first_name, last_name, email, dob, address, city, state, 
    zip, phone, gender, credentials.admin from users, credentials where users.userid = credentials.userid and 
    users.userid = '" . $userId . "'";
    
    $result = mysqli_query($dbc, $userQuery); 
    
    $row = mysqli_fetch_assoc($result);
        
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
        
    
    
    // if($username !== $usernameSearch) {
//         
        // echo 
//         
        // "<div class=\"breadcrumb\">
        // <nav>
          // <ul>
            // <li><a href=\"../index.php\">home</a></li>
            // <li><a href=\"admin.php\">admin</a></li> 
            // <li><a href=\"\">edit user</a></li> 
          // </ul>
        // </nav>
    // </div>
//         
        // <div class = \"mainContent\"> Username \"" . $usernameSearch . "\" does not exist. Please try again. <br><br>
        // <a href=\"edituser.php\">Back to edit user</a>";
//         
        // exit;
//         
     // }
//     
    
    mysqli_free_result($result);
  
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

    <!-- <div class = "mainContent">
    	
    	<h1 class="indexH1">Edit User</h1>
        
        <form name="searchUser" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
            
            <fieldset id="field1">
                
              <label>Search for user:</label>
            
                   <input type="text" name="search" placeholder="Enter username to search" size="40">
                 
                   <input type="submit" name="submitSearch" value="Search">
            
            </fieldset>
                 
        </form>  -->
        
        
         <?php if(isset($_GET['id'])) { ?>
             
        <div class="mainContent">
            
        <form class="form2" name="editUser" action="edituser.php" method="post">
            
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
                   <!-- <input type="text" name="admin" value = "<?php echo $admin ?>" size="5"><br><br> -->
                   <select name="admin">
                       
                      <option value="1" <?php if($admin == 1) {
                          
                          echo "selected";
                          
                      } ?>
                      
                      >Yes</option>
                      
                      
                      <option value="0" <?php if($admin == 0) {
                          
                          echo "selected";
                          
                      } ?>
                      
                      >No</option>
                       
                   </select><br><br>
               
               <label>Update User:</label>
                   <input type="submit" name="updateUser" value="Update">
            
            </fieldset>
            
        </form>
        
    </div>
        
<?php 

}

           if(isset($_POST['updateUser'])) {
               
           $username = $_POST['userName'];
           $fName_in = $_POST['fName'];
           $lName_in = $_POST['lName'];
           $email_in = $_POST['email'];
           $dob_in = $_POST['dob'];
           $address_in = $_POST['address'];
           $city_in = $_POST['city'];
           $state_in = $_POST['state'];
           $zip_in = $_POST['zip'];
           $phone_in = $_POST['phone'];
           $gender_in = $_POST['gender'];
           $admin_in = $_POST['admin'];
           
           $updateQuery = "update users, credentials set first_name = '" . $fName_in . "', last_name = '" . $lName_in . 
           "', email = '" . $email_in . "', dob = '" . $dob_in . "', address = '" . $address_in . "', city = '" . 
           $city_in . "', state = '" . $state_in . "', zip = '" . $zip_in . "', phone = '" . $phone_in . "', gender = '" .
           $gender_in . "', admin = '" . $admin_in . "' where users.userid = credentials.userid and credentials.username = '" .
           $username . "'";
           
           mysqli_query($dbc, $updateQuery); 
           
          $_SESSION['confirmMessage'] = "You have successfully updated \"" . $username . "\"!";   
          
           // echo "<div class = \"mainContent\">" . $_SESSION['confirmMessage'] . "</div>";
           
           header("Location: admin.php");

           }

           mysqli_close($dbc);
           
           
           
?>
       
     </div>
        
    </body>
    
</html>

