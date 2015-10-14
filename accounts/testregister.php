<?php
session_start();

	require("../navigation.inc");
 
	$navigation = new Navigation();

	echo $navigation;

	include ("serverValidate.php");
	$message = "*Please follow formatting rules on examples. All fields are required!";
	$firstName = $lastName = $email = $phone = $gender = $subscription = $zip = "";
	$address = $dob = $city = $state = $password1 =$password2 =$username = $comments ="";
	$styleInvalid = "style=background-color:#4C4C6A";

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
        //$x = true;
        if (validateName($lastName)) {
            //  $x = true;
            if (validateEmail($email)) {
                //  $y = true;
                if ($dob != "") {
                    //   $x = true;
                    if ($address != "") {
                        // $x = true;
                        if ($city != "") {
                            //  $x = true;
                            if (validateState($state)) {
                                //  $x = true;
                                if (validateZip($zip)) {
                                    //   $y = true;
                                    if (validatePhone($phone)) {
                                        //  $y = true;
                                        if ($username != "") {
                                            //  $x = true;
                                            if (validateGender($gender)) {
                                                //    $x = true;
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
                                                    $address =

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

	<!--START MAIN CONTENT-->
	<div class="mainContent">
	    <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
	        <?php echo $message ?>
	        <fieldset id="field1">
	            <legend>Account Registration</legend>
	
	            <label>Todays date is:</label>
	            <input type="text" readonly="true" name="DATE" value="<?php echo date("m/d/Y") ?>" id="date" /><br />
	            <!-- <span><?php echo date("m/d/Y") ?></span><br /> -->
	
	            <label>Name:</label>
	
	            <input type="text" name="FIRST" placeholder="First" value="<?php if(isset($_POST['FIRST'])) {echo $firstName;}; ?>" size="15" id="firstName" /><?php if (!validateName($firstName)){echo "*";}?>
	            <input type="text" name="LAST" placeholder="Last" value="<?php if(isset($_POST['LAST'])) {echo $lastName;} ?>" size="15" id="lastName" ><?php if (!validateName($firstName)){echo "*";}?><br />
	
	            <label>Address:</label>
	            <input type="text" name="ADDRESS" value = "<?php if(isset($_POST['ADDRESS'])) {echo $address;} ?>"size="37" id="address" /><?php if (!validateAddress($address)){echo "*";}?><br />
	
	
	            <label>City:</label>
	
	            <input type="text" name="LOCALITY" size="37" 
	            	value="<?php if(isset($_POST['LOCALITY'])) {echo $city;} ?>" id="city" 
	            		<?php if (!validateCity($city)){echo $styleInvalid;}?> />
	            			<?php if (!validateCity($city)){echo "*";}?><br />
	
	            <label>State/Province:</label>
	            <select name="REGION" size="1" id="region">
	                <option>Select</option>
	                <optgroup label="USA" class="label" >
	                    <option value="AL">Alabama (AL)</option>
	                    <option value="AK">Alaska (AK)</option>
	                    <option value="AZ">Arizona (AZ)</option>
	                    <option value="AR">Arkansas (AR)</option>
	                    <option value="CA">California (CA)</option>
	                    <option value="CO">Colorada (CO)</option>
	                    <option value="CT">Connecticut (CT)</option>
	                    <option value="DE">Delaware (DE)</option>
	                    <option value="FL">Florida (FL)</option>
	                    <option value="GA">Georgia (GA)</option>
	                    <option value="HI">Hawaii (HI)</option>
	                    <option value="ID">Idaho (ID)</option>
	                    <option value="IL">Illinois (IL)</option>
	                    <option value="IN">Indiana (IN)</option>
	                    <option value="IA">Iowa (IA)</option>
	                    <option value="KS">Kansas (KS)</option>
	                    <option value="KY">Kentucky (KY)</option>
	                    <option value="LA">Louisiana (LA)</option>
	                    <option value="ME">Maine (ME)</option>
	                    <option value="MD">Maryland (MD)</option>
	                    <option value="MA">Massachusetts (MA)</option>
	                    <option value="MI">Michigan (MI)</option>
	                    <option value="MN">Minnesota (MN)</option>
	                    <option value="MS">Mississippi (MS)</option>
	                    <option value="MO">Missouri (MO)</option>
	                    <option value="MT">Montana (MT)</option>
	                    <option value="NE">Nebraska (NE)</option>
	                    <option value="NV">Nevada (NV)</option>
	                    <option value="NH">New Hampshire (NH)</option>
	                    <option value="NJ">New Jesery (NJ)</option>
	                    <option value="NM">New Mexico (NM)</option>
	                    <option value="NY">New York (NY)</option>
	                    <option value="NC">North Carolina (NC)</option>
	                    <option value="ND">North Dakota (ND)</option>
	                    <option value="OH">Ohio (OH)</option>
	                    <option value="OK">Oklahoma (OK)</option>
	                    <option value="OR">Orgeon (OR)</option>
	                    <option value="PA">Pennsylvania (PA)</option>
	                    <option value="RI">Rhode Island (RI)</option>
	                    <option value="SC">South Carolina (SC)</option>
	                    <option value="SD">South Dakota (SD)</option>
	                    <option value="TN">Tennessee (TN)</option>
	                    <option value="TX">Texas (TX)</option>
	                    <option value="UT">Utah (UT)</option>
	                    <option value="VT">Vermont (VT)</option>
	                    <option value="VA">Virginia (VA)</option>
	                    <option value="WA">Washington (WA)</option>
	                    <option value="WV">West Virginia (WV)</option>
	                    <option value="WI">Wisconsin (WI)</option>
	                    <option value="WY">Wyoming (WY)</option>
	                </optgroup>
	
	            </select><?php if (!validateState($state)){echo "*";}?><br />
	
	
	
	            <label>ZIP/Postal Code:</label>
	            <input type="text" name="POSTAL" size="10" id="postalcode" placeholder="#####" class="validates" onkeyup="zipValid()" value="<?php if(isset($_POST['POSTAL'])) {echo $zip;} ?>"/><!-- (#####) -->
	            <span class="formcheck" id="spanZip" ></span><?php if (!validateZip($zip)){echo "*";}?><br />
	
	
	            <label>Phone:</label>
	            <input type="text" name="PHONE" size="17" id="phone" class="validates" placeholder="###-###-####" onkeyup="phoneValid()" value="<?php if(isset($_POST['PHONE'])) {echo $phone;} ?>"/><!-- (###-###-####) -->
	            <span class="formcheck" id="spanPhoneNum"> </span><?php if (!validatePhone($phone)){echo "*";}?><br />
	
	            <label>Birthday:</label>
	            <input type="date" name="DOB" size="30" placeholder="mm/dm/yyyy" value="<?php if(isset($_POST['DOB'])) {echo $dob;} ?>" id="dob" /><?php if (!validateDOB($dob)){echo "*";}?><br />
	
	
	            <label>Email:</label>
	            <input type="text" name="EMAIL" size="30" id="email" class="validates" placeholder="mail@example.com" onkeyup="emailValid()" value="<?php if(isset($_POST['EMAIL'])) {echo $email;} ?>"/><!-- (mail@example.com) -->
	            <span class="formcheck" id="spanEmail"> </span><?php if (!validateEmail($email)){echo "*";}?><br />
	
	            <label>Username:</label>
	            <input type="text" name="USERNAME" size="30" id="email" value="<?php if(isset($_POST['USERNAME'])) {echo $username;} ?>" />
	            <span class="formcheck" id="spanEmail"> </span><?php if ($username == ""){echo "*";}?><br />
	
	            <label>Password:</label>
	            <input type="password" name="PASSWORD" size="30" id="passwd" class="validates" /><br />
	
	            <label>Confirm Password:</label>
	            <input type="password" name="CONFIRMPASSWORD" size="30" id="confirmPasswd" class="validates" onkeyup="passwdValid()" /><?php if (!validatePassword($password1,$password2)){echo "*";}?><br />
	            <span class="formcheck" id="spanPasswd"></span>
	
	        </fieldset>
	        <fieldset id="fieldYN">
	            Gender:
	            <input type="radio" name="GENDER" value="male" id="maleRadio" /><label class="noLabel" for="maleRadio">Male </label>
	            <input type="radio" name="GENDER" value="female" id="femaleRadio" /><label class="noLabel" for="femaleRadio">Female </label><?php if (!validateGender($gender)){echo "*";}?><br />
	
	            <label for="mailYes" id="mailList">Subscribe to our mailing list:</label>
	            <input type="checkbox" name="SUBSCRIPTION" value="Yes" id="mailYes" checked /><br />
	
	            <label for="comments" class="noLabel">Comments:</label><br />
	            <textarea id="comments" name="comments" rows="3" cols="55"></textarea>
	        </fieldset>
	        <div class="buttons">
	            <input type="submit" class="buttons" name="Submit" alt="Submit" value="Submit" id="submit" />
	            <input type="reset" class="buttons" name="Reset" value="Reset" />
	        </div>
	    </form>
	
	</div>
	<!--END MAIN CONTENT-->

</body>
</html>

