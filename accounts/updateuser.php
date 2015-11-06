<?php 

    session_start();
    
	require("../controllers/database.php");

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
	   
		if(mysqli_query($dbc, $updateQuery)){
		     
			$_SESSION["confirmMessage"] = "You have successfully updated \"" . $username . "\"!";   

			header("Location: admin.php");
		}
	}

   mysqli_close($dbc);
          
?>
       