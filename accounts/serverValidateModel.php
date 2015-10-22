<?php

	$message = "*Please follow formatting rules on examples. Highlighted fields are required!";
	$firstName = $lastName = $email = $phone = $gender = $subscription = $zip = "";
	$address = $dob = $city = $state = $password1 =$password2 =$username = $comments ="";
	$styleInvalid = "style=background-color:#A6A6B4";

    if (isset($_POST['FIRST'])) {
        $firstName = $_POST["FIRST"];
    }
    if (isset($_POST['LAST'])) {
        $lastName = $_POST['LAST'];
    }
    if (isset($_POST['DATE'])) {
        $date = $_POST['DATE'];
    }
    if (isset($_POST['EMAIL'])) {
        $email = $_POST['EMAIL'];
    }
    if (isset($_POST['DOB'])) {
        $dob = $_POST['DOB'];
    }
    if (isset($_POST['ADDRESS'])) {
        $address = $_POST['ADDRESS'];
    }
    if (isset($_POST['LOCALITY'])) {
        $city = $_POST['LOCALITY'];
    }
    if (isset($_POST['REGION'])) {
        $state = $_POST['REGION'];
    }
    if (isset($_POST['POSTAL'])) {
        $zip = $_POST['POSTAL'];
    }
    if (isset($_POST['PHONE'])) {
        $phone = $_POST['PHONE'];
    }
    if (isset($_POST['USERNAME'])) {
        $username = $_POST['USERNAME'];
    }
    if (isset($_POST['PASSWORD'])) {
        $password1 = $_POST['PASSWORD'];
    }
    if (isset($_POST['CONFIRMPASSWORD'])) {
        $password2 = $_POST['CONFIRMPASSWORD'];
    }
    if (isset($_POST['GENDER'])) {
        $gender = $_POST['GENDER'];
    }
    if (isset($_POST['SUBSCRIPTION'])) {
        $subscription = $_POST['SUBSCRIPTION'];

    }if (isset($_POST['comments'])) {
    $comments = $_POST['comments'];
    }

    if (validateName($firstName)) {       
        if (validateName($lastName)) {            
            if (validateEmail($email)) {                
                if ($dob != "") {                    
                    if ($address != "") {                       
                        if ($city != "") {                            
                            if (validateState($state)) {                                
                                if (validateZip($zip)) {                                   
                                    if (validatePhone($phone)) {                                       
                                        if (validateUsername($username)) {                                            
                                            if (validateGender($gender)) {                                              
                                                if (validatePassword($password1, $password2)) {
                                                           
                                                    $_SESSION["fname"] = $firstName;
                                                    $_SESSION["lname"] = $lastName;
                                                    $_SESSION["add"] = $address;
                                                    $_SESSION["date"] = $date;
                                                    $_SESSION["cty"] = $city;
                                                    $_SESSION["state"] = $state;
                                                    $_SESSION["zip"] = $zip;
                                                    $_SESSION["email"] = $email;
                                                    $_SESSION["phone"] = $phone;
                                                    $_SESSION["uname"] = $username;
                                                    $_SESSION["pwd"] = $password1;
                                                    $_SESSION["sub"] = $subscription;
                                                    $_SESSION["sex"] = $gender;
                                                    $_SESSION["dob"] = $dob;
                                                    $_SESSION["comments"] = $comments;
                                                    $_SESSION['confirmMessage'] = "Welcome " . $_SESSION['uname'];
                                                    
                                                    $firstName = cleanInput($firstName);
                                                    $lastName = cleanInput($lastName);
                                                    $address = cleanInput($address);
                                                    $city = cleanInput($city);
                                                    $state = cleanInput($state);
                                                    $zip = cleanInput($zip);
                                                    $email = cleanInput($email);
                                                    $phone = cleanInput($phone);
                                                    $gender = cleanInput($gender);
                                                    $dob = cleanInput($dob);
                                                    $comments = cleanInput($comments);
                                                    $gender = cleanInput($gender);
                                                    $dob = cleanInput($dob);
                                                    $comments = cleanInput($comments);

                                                    header("Location: mailinglistresults.php");
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>