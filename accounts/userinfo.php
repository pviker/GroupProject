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
         
         <table style = "border: 1px solid white">
             <tr>
                 <th>ID</th>
                 <th>First Name</th>
                 <th>Last Name</th>
                 <th>Date Entered</th>
                 <th>Email</th>
                 <th>Date of Birth</th>
                 <th>Address</th>
                 <th>City</th>
                 <th>State</th>
                 <th>Zip Code</th>
                 <th>Phone Number</th>
                 <th>Gender</th>
                 <th>Username</th>
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