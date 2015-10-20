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

/* UNCOMMENT FOR LOCAL DB CREDENTIALS */
	$dbUser = "user1";			
	$dbPass = "abc123";				
	$db = "music_electric";			

/* UNCOMMENT FOR SERVER DB CREDENTIALS */
//	$dbUser = "ics325fa1528";		
//	$dbPass = "983278";				
//	$db = "ics325fa1528";
	
//	echo "<div class = \"mainContent\"> " . $_SESSION['confirmMessage'] . "</div>";
	
    //Database connection
    @ $db = mysqli_connect('localhost', $dbUser, $dbPass, $db);
    
    if(mysqli_connect_errno() ) {
                echo "Error: could not connect to database. Please try again later.";
                exit;
            }
    
    //Query for user info
    $userInfoQuery = "select users.userid, first_name, last_name, date, email, dob, address, city, 
    state, zip, phone, gender, username from users, credentials where users.userid = credentials.userid";
     
     $results = mysqli_query($db, $userInfoQuery);
     
?>

	<div class="breadcrumb">
		<nav>
		  <ul>
		    <li><a href="../index.php">home</a></li> <!-- ALWAYS INDEX.php -->
		    <li><a href="guitars.php">guitars</a></li> <!-- ALWAYS CATEGORY.php -->
		    <li><a href="">electric</a></li> <!-- ALWAYS SUBCATEGORY -->
		  </ul>
		</nav>
	</div>
	
	<!--START MAIN CONTENT-->
	<div class="mainContent">		
		<table>
			<tr>
				<td><a href="productPages/strat.php"><span class="img"><img src="../images/guitars/strat.jpg" height="200" width="200" /></span></a></td>
				<td><a href="productPages/strat.php">Fender American Standard Stratocaster</a></td>
				<td>$1299</td>
			</tr>
			<tr>
				<td><a href="productPages/es335.php"><span class="img"><img src="../images/guitars/Gibson_ES335.jpg" height="200" width="200" /></span></a></td>
				<td><a href="productPages/es335.php">Gibson Custom Shop VOS ES-335</a></td>
				<td>$3199</td>
			</tr>
		</table>	
	</div>
	<!--END MAIN CONTENT-->
     
     <div class = "mainContentTable">
     	<h1 class="indexH1"><?php echo $_SESSION['confirmMessage']; ?>!</h1>
         
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
             </tr>
             
             <?php 
             
             //Print rows from database records into table
             while($row = mysqli_fetch_assoc($results)) {
                     
                 echo "<tr><td>" . $row["userid"] . "</td><td>" . $row["first_name"] . "</td><td>" . 
                 $row["last_name"] . "</td><td>" . $row["date"] . "</td><td>" . $row["email"] . "</td><td>" .
                 $row["dob"] . "</td><td>" . $row["address"] . "</td><td>" . $row["city"] . "</td><td>" . 
                 $row["state"] . "</td><td>" . $row["zip"] . "</td><td>" . $row["phone"] . "</td><td>" . 
                 $row["gender"] . "</td><td>" . $row["username"] . "</td></tr>";
                 
             }
             
             ?>
             
             </table>

       </div>
     
<?php     
     
    //Free results from memory
    mysqli_free_result($results);
    //Close database connection
    mysqli_close($db);
 
?>

</body>

</html>