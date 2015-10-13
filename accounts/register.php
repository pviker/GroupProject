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
	
	<!--START MAIN CONTENT-->
	<div class="mainContent">
			<form action="mailinglistresults.php" method="post">
				
				<fieldset id="field1">
					<legend>Account Registration</legend>
						<div class="formHeader">
							(*)required field
						</div>
					
						<label>Todays date is:</label>
						<input type="text" readonly="true" name="DATE" value="<?php date_default_timezone_set('America/Chicago'); echo date("m/d/Y") ?>" id="date" /><br />
						<!-- <span><?php echo date("m/d/Y") ?></span><br /> -->
					
						<label>Name:</label>
						<input type="text" name="FIRST" value="First" size="15" id="firstName" onfocus="if(this.value == "value") { this.value = ""; }" />
						<input type="text" name="LAST" value="Last" size="15" id="lastName" onfocus="if(this.value == "value") { this.value = ""; }" /><br />
					
					
						<label>Address:</label>
						<input type="text" name="ADDRESS" size="37" id="address" /><br />
					
					
						<label>City:</label>
						<input type="text" name="LOCALITY" size="37" id="city" /><br />
					
					
						<label>State/Province:</label>
							<select name="REGION" size="1" id="region">
								<option>Select</option>
									<optgroup label="USA" class="label">
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
						
					
						<label>*ZIP/Postal Code:</label>
						<input type="text" name="POSTAL" size="10" id="postalcode" class="validates" onkeyup="zipValid()" value="#####"/><!-- (#####) -->
						<span class="formcheck" id="spanZip"></span><br />
					
					
						<label>*Phone:</label>
						<input type="text" name="PHONE" size="17" id="phone" class="validates" onkeyup="phoneValid()" value="###-###-####"/><!-- (###-###-####) -->
						<span class="formcheck" id="spanPhoneNum"> </span><br />
					
						<label>Birthday:</label>
						<input type="date" name="DOB" size="30" id="dob" /><br />
						
					
						<label>*Email:</label>
						<input type="text" name="EMAIL" size="30" id="email" class="validates" onkeyup="emailValid()" value="mail@example.com"/><!-- (mail@example.com) -->
						<span class="formcheck" id="spanEmail"> </span><br />
						
						<label>*Username:</label>
						<input type="text" name="USERNAME" size="30" id="email" />
						<span class="formcheck" id="spanEmail"> </span><br />
						
						<label>*Password:</label>
						<input type="password" name="PASSWORD" size="30" id="passwd" class="validates" /><br />
						
						<label>Confirm Password:</label>
						<input type="password" name="CONFIRMPASSWORD" size="30" id="confirmPasswd" class="validates" onkeyup="passwdValid()" />
						<span class="formcheck" id="spanPasswd"></span><br />
					
				</fieldset>
				<fieldset id="fieldYN">
					Gender:
<<<<<<< HEAD
						<input type="radio" name="GENDER" value="male" id="maleRadio" /><label class="noLabel" for="maleRadio">Male </label>
						<input type="radio" name="GENDER" value="female" id="femaleRadio" /><label class="noLabel" for="femaleRadio">Female </label><br />
=======
						
						<input type="radio" name="GENDER" value="male" id="maleRadio" /><label class="noLabel" for="maleRadio">Male </label>
						<input type="radio" name="GENDER" value="female" id="femaleRadio" /><label class="noLabel" for="femaleRadio">Female </label><br />

>>>>>>> Database
						
					<label for="mailYes" id="mailList">Subscribe to our mailing list:</label>
						<input type="checkbox" name="SUBSCRIPTION" value="Yes" id="mailYes" checked /><br />
						
					<label for="comments" class="noLabel">Comments:</label><br />
						<textarea id="comments" name="comments" rows="3" cols="55"></textarea>
				</fieldset>
					<div class="buttons">
						<input type="button" class="buttons" name="Submit" alt="Submit" value="Submit" id="submit" class="formSubmit"/>
						<input type="reset" class="buttons" name="Reset" value="Reset" />
					</div>				
			</form>
		
	</div>
	<!--END MAIN CONTENT-->

	</body>
</html>