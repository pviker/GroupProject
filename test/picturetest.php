<!DOCTYPE html>

<html>
    
    <body>

<?php

  
//* UNCOMMENT FOR LOCAL DB CREDENTIALS */
    $dbUser = "user1";          
    $dbPass = "abc123";             
    $db = "music_electric";         

/* UNCOMMENT FOR SERVER DB CREDENTIALS */
//  $dbUser = "ics325fa1528";       
//  $dbPass = "983278";             
//  $db = "ics325fa1528";           
    
    //Database connection
    @ $dbc = mysqli_connect('localhost', $dbUser, $dbPass, $db);
    
    if(mysqli_connect_errno() ) {
                echo "Error: could not connect to database. Please try again later.";
                exit;
            }
    
    $selectQuery = "select photo_loc from products where prod_id = '2'";
    
    $results = mysqli_query($dbc, $selectQuery);
    
  
    
    while($row = mysqli_fetch_assoc($results)) {
        
        $imageSource = $row["photo_loc"];
        
    }
    
    echo "<img src = \"" . $imageSource . "\">";
    
 
    
    mysqli_free_result($results);
    
    mysqli_close($dbc);

?>

<!-- <img src="<?php $imageSource ?>"> -->
</body>

</html>