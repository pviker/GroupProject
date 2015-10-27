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
    
 ?>
 
	<div class="breadcrumb">    
          <ul>
            <li><a href="../index.php">home</a></li>
            <li><a href="admin.php">admin</a></li> 
            <li><a href="">view all users</a></li>           
          </ul>
    </div>
    
    <div class = "mainContent">
     	<h1><a href="admin.php">Admin Interface</a> </h1> <br/>			
    </div>
    
    <?php
    
    if ($_SESSION['adminFlag'] !== 1) {
        
		header ('Location: login.php'); 
        
    }
	
	?>    
    
<?php 
    
    //Query for user info
    $userInfoQuery = "select users.userid, first_name, last_name, date, email, dob, address, city, 
    state, zip, phone, gender, username, admin from users, credentials where users.userid = credentials.userid";
     
    $results = mysqli_query($dbc, $userInfoQuery);
     
?>
     
     <div class = "mainContentTable">
     	<h2 class="indexH1"><?php echo $_SESSION['confirmMessage']; ?>!</h2><br />
     	<h1 class="indexH1">Registered Users:</h1>
         
         <table class = "usersTable">
             <tr>
                 <td>ID</td>
                 <td>First Name</td>
                 <td>Last Name</td>
                 <td>Date Entered</td>
                 <td>Email</td>
                 <td>Date of Birth</td>
                 <td>Address</td>
                 <td>City</td>
                 <td>State</td>
                 <td>Zip Code</td>
                 <td>Phone Number</td>
                 <td>Gender</td>
                 <td>Username</td>
                 <td>Admin</td>
             </tr>
             
             <?php 
             
             //Print rows from database records into table
             while($row = mysqli_fetch_assoc($results)) {    
                 echo "<tr><td>" . $row["userid"] . "</td><td>" . $row["first_name"] . "</td><td>" . 
                 $row["last_name"] . "</td><td>" . $row["date"] . "</td><td>" . $row["email"] . "</td><td>" .
                 $row["dob"] . "</td><td>" . $row["address"] . "</td><td>" . $row["city"] . "</td><td>" . 
                 $row["state"] . "</td><td>" . $row["zip"] . "</td><td>" . $row["phone"] . "</td><td>" . 
                 $row["gender"] . "</td><td>" . $row["username"] . "</td><td>" . $row["admin"] . "</td></tr>";    
             }
             
             ?>
             
        	</table>
		</div>
     
		<?php     
		  
		    //Free results from memory
		    mysqli_free_result($results);
		    //Close database connection
		    mysqli_close($dbc);
		 
		?>

	</body>

</html>