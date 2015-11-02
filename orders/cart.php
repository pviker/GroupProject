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
    
    if (!isset($_SESSION['uname'])) {
        header ('Location: login.php');  
    }
	
	
	    
 ?>
 
	<div class="breadcrumb">    
          <ul>
            <li><a href="../index.php">home</a></li>
            <li><a href="">shopping cart</a></li>          
          </ul>
    </div>
    
    <div class = "mainContent">
     	<!-- <h1><a href="admin.php">Admin Interface</a> </h1> <br/>	 -->		
    </div>
    
   
    
<?php 
    
    //Query for user info
    $userInfoQuery = "select users.userid, first_name, last_name, date, email, dob, address, city, 
    state, zip, phone, gender, username, admin from users, credentials where users.userid = credentials.userid";
     
    $results = mysqli_query($dbc, $userInfoQuery);
     
?>
     
     
    
     <div class = "mainContentTable">
     	<!-- <h2 class="indexH1"><?php echo $_SESSION['confirmMessage']; ?>!</h2><br /> -->
     	<h1 class="indexH1">TESTING SHOPPING CART FUNCTIONALITY</h1>
         
         <table class = "usersTable">
             <tr>
                 <td>Item ID</td>
                 <td>Thumbnail</td>
                 <td>Item Descr.</td>
                 <td>Unit Cost</td>
                 <td>Qty.</td>
                 <td>Item Subtotal</td>
                 <td>Delete From Cart</td>
                 <td>...</td>
                 <td>...</td>
                 <td>...</td>
                 <td>...</td>
                 <td>...</td>
                 <td>...</td>
                 <td>...</td>
                 <!-- <td>ID</td> -->
     
             </tr>
             
             <?php 
             
             // MORE THAN LIKELY GENERATE FROM SESSION ARRAY MYCART[]
             
             while($row = mysqli_fetch_assoc($results)) {
                     
                 echo "<tr>
                 		<td>" . $row["userid"] . "</td>
                 		<td>" . $row["first_name"] . "</td>
                 		<td>" . $row["last_name"] . "</td>
                 		<td>" . $row["date"] . "</td>
                 		<td>" . $row["email"] . "</td>
                 		<td>" . $row["dob"] . "</td>
                 		<td>" . $row["address"] . "</td>
                 		<td>" . $row["city"] . "</td>
                 		<td>" . $row["state"] . "</td>
                 		<td>" . $row["zip"] . "</td>
                 		<td>" . $row["phone"] . "</td>
                 		<td>" . $row["gender"] . "</td>
                 		<td>" . $row["username"] . "</td>
                 		<td>" . $row["admin"] . "</td>" .
                 		//<td><a href=\"edituser.php?id=" . $row["userid"] . "\" style=\"color:black\" >EDIT</a></td>
                 	"</tr>";    
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