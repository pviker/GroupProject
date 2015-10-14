<?php 
    session_start();    
/* 
 * ICS325 - Group Project
 * Iteration: 1
 * Group: D for Dolphins
 * File: electrics.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: Electric guitar product listing page.
 *   
 * */

    require("../navigation.inc");
 
    $navigation = new Navigation();

    echo $navigation;
?>

<!DOCTYPE html>

<html>
    
    <body>
    
<?php 
    //Connect to database
    @ $db = mysqli_connect('localhost', 'user1', 'abc123', 'music_electric');
    
    if(mysqli_connect_errno() ) {
                echo "Error: could not connect to database. Please try again later.";
                exit;
            }
    
    //Query for user info
    $userInfoQuery = "select users.userid, first_name, last_name, date, email, dob, address, city, 
    state, zip, phone, gender, username from users, credentials where users.userid = credentials.userid";
     
     $results = mysqli_query($db, $userInfoQuery);
     
?>
     
     <div class = "maincontent">
         
        
         
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