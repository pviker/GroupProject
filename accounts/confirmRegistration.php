<?php
/**
 * Created by PhpStorm.
 * User: Crunk_Baller
 * Date: 10/12/2015
 * Time: 10:51 PM
 *
 * 
 * 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: confirmRegistration.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: Confirmation page for user registration.
 *   
 * 
 *
 *
 */
session_start();


?>
<html>
<body>
<div class="mainContent">

    <h1>Account Confirm</h1>

           <label>Today's date is:</label><?php echo date("m/d/Y") ?><br>
            <p>First Name:<?php echo $_SESSION['fname'];?> </p>
            <p>Last Name:<?php echo $_SESSION['lname'];?></p>
            <p>Address: <?php echo $_SESSION['add'];?></p>
            <p>City: <?php echo $_SESSION['cty'];?> </p>
            <p>State/Province:<?php echo $_SESSION['state'];?></p>
            <p>ZIP/Postal Code:<?php echo $_SESSION['zip'];?></p>
            <p>Phone:<?php echo $_SESSION['phone'];?></p>
            <p>Birthday:<?php echo $_SESSION['dob'];?></p>
            <p>Email:<?php echo $_SESSION['email'];?></p>
            <p>Username:<?php echo $_SESSION['uname'];?></p>
            <p>Gender: <?php echo $_SESSION['sex'];?></p>
            <p>Subscribe <?php echo $_SESSION['sub'];?></p>
            <p>Comments <?php echo $_SESSION['comments'];?></p>
<?php //var_dump($_SESSION); var_dump($_POST);?>
</div>
</body>
</html>

