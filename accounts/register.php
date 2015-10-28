<?php

/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: register.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This is the registration page for users to register an account.
 *   
 * */

	//session_start();
	
	if(null === session_id()){
		session_start();
	}
	
	require("../navigation.inc");
	$navigation = new Navigation();
	echo $navigation;

	include ("serverValidate.php");
	include ("serverValidateModel.php");

?>

	<div class="breadcrumb">	
		  <ul>
		    <li><a href="../index.php">home</a></li>
		   	<li><a href="">register</a></li>		    
		  </ul>
	</div>

	<!--START MAIN CONTENT-->
	<div class="mainContent">
	    <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
	        <?php echo $message ?>
	        <fieldset id="field1">
	            <legend>Account Registration</legend>
	
	            <label>Todays date is:</label>
	            	<input type="text" readonly="true" name="DATE" value="<?php echo date("m/d/Y") ?>" id="date" /><br />
	
	            <label>Name:</label>
		            <input type="text" name="FIRST" placeholder="First" 
		            	value="<?php if(isset($_POST['FIRST'])) {echo $firstName;}; ?>" size="15" id="firstName" 
		            		<?php if (!validateName($firstName)){echo $styleInvalid;}?> />
		            		
		            <input type="text" name="LAST" placeholder="Last" 
		            	value="<?php if(isset($_POST['LAST'])) {echo $lastName;} ?>" size="15" id="lastName" 
		            		<?php if (!validateName($firstName)){echo $styleInvalid;}?> /><br />
		
	            <label>Address:</label>
		            <input type="text" name="ADDRESS" 
		            	value="<?php if(isset($_POST['ADDRESS'])) {echo $address;} ?>" size="37" id="address" 
		            		<?php if (!validateAddress($address)){echo $styleInvalid;}?> /><br />
	
	
	            <label>City:</label>
	
	            <input type="text" name="LOCALITY" size="37" 
	            	value="<?php if(isset($_POST['LOCALITY'])) {echo $city;} ?>" id="city" 
	            		<?php if (!validateCity($city)){echo $styleInvalid;}?> /><br />
	
	            <label>State/Province:</label>
	            
	            <select name="REGION" size="1" id="region" 
	            	<?php if (!validateState($state)){echo "style=\"background:#A6A6B4\"";}?> >
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
	            </select><br />
	
	            <label>ZIP/Postal Code:</label>
		            <input type="text" name="POSTAL" size="10" id="postalcode" placeholder="#####" class="validates" 
		            	onkeyup="zipValid()" 
		            		value="<?php if(isset($_POST['POSTAL'])) {echo $zip;} ?>" 
		            			<?php if (!validateZip($zip)){echo $styleInvalid;}?> />
		            				<span class="formcheck" id="spanZip" ></span><br />
	
	            <label>Phone:</label>
	            	<input type="text" name="PHONE" size="17" id="phone" class="validates" placeholder="###-###-####" 
	            		onkeyup="phoneValid()" 
	            			value="<?php if(isset($_POST['PHONE'])) {echo $phone;} ?>" 
	            				<?php if (!validatePhone($phone)){echo $styleInvalid;}?> />
									<span class="formcheck" id="spanPhoneNum"> </span><br />
	
	            <label>Birthday:</label>
	            	<input type="date" name="DOB" size="30" placeholder="mm/dm/yyyy" 
	            		value="<?php if(isset($_POST['DOB'])) {echo $dob;} ?>" id="dob" 
	            			<?php if (!validateDOB($dob)){echo $styleInvalid;}?> /><br />
	
	            <label>Email:</label>
	            	<input type="text" name="EMAIL" size="30" id="email" class="validates" placeholder="mail@example.com" 
	            		onkeyup="emailValid()" 
	            			value="<?php if(isset($_POST['EMAIL'])) {echo $email;} ?>" 
	            				<?php if (!validateEmail($email)){echo $styleInvalid;}?> />
	            					<span class="formcheck" id="spanEmail"> </span><br />
	
	            <label>Username:</label>
	            	<input type="text" name="USERNAME" size="30" id="user" 
	            		onfocus="usernameValid()" 
		            		value="<?php if(isset($_POST['USERNAME'])) {echo $username;} ?>" 
		            			<?php if (!validateUsername($username)){echo $styleInvalid;}?> />
		            				<span class="formcheck" id="spanUsername"> </span><br />
	
	            <label>Password:</label>
	            	<input type="password" name="PASSWORD" size="30" id="passwd" class="validates" 
	            		onfocus="pValid()" />
	            			<span class="formcheck" id="spanP"></span><br />
	
	            <label>Confirm Password:</label>
	           		<input type="password" name="CONFIRMPASSWORD" size="30" id="confirmPasswd" class="validates" 
	           			onkeyup="passwdValid()" 
	           				<?php if (!validatePassword($password1,$password2)){echo $styleInvalid;}?> />
	            				<span class="formcheck" id="spanPasswd"></span><br />
	
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

