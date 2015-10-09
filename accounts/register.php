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
			<form onsubmit="<!-- return submitForm() -->" action="<!-- mailinglistresults.html -->">
				
				<fieldset id="field1">
					<legend>Account Registration</legend>
					
						<label>Name:</label>
						<input type="text" name="FIRST" value="First" size="15" id="firstName" />
						<input type="text" name="LAST" value="Last" size="15" id="lastName" /><br />
					
					
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
						
					
						<label>ZIP/Postal Code:</label>
						<input type="text" name="POSTAL" size="10" id="postalcode" class="validates" onkeyup="zipValid()" /><!-- (#####) -->
						<span class="formcheck" id="spanZip"></span><br />
					
					
						<label>Phone:</label>
						<input type="text" name="PHONE" size="17" id="phone" class="validates" onkeyup="phoneValid()" value=""/><!-- (###-###-####) -->
						<span class="formcheck" id="spanPhoneNum"> </span><br />
					
					
						<label>Email:</label>
						<input type="text" name="EMAIL" size="30" id="email" class="validates" onkeyup="emailValid()" /><!-- (mail@example.com) -->
						<span class="formcheck" id="spanEmail"> </span><br />
						
						<label>Username:</label>
						<input type="text" name="USERNAME" size="30" id="email" />
						<span class="formcheck" id="spanEmail"> </span><br />
						
						<label>Password:</label>
						<input type="text" name="PASSWORD" size="30" id="passwd" class="validates" />
						<span class="formcheck" id="spanEmail"> </span><br />
						
						<label>Confirm Password:</label>
						<input type="text" name="CONFIRMPASSWORD" size="30" id="confirmPasswd" class="validates" onkeyup="confirmPasswd()" />
						<span class="formcheck" id="spanEmail"> </span><br />
					
				</fieldset>
				<fieldset id="fieldYN">
					Gender:
						<input type="radio" name="SUBSCRIPTION" value="Yes" id="mailYes" /><label class="noLabel" for="mailYes">Male </label>
						<input type="radio" name="SUBSCRIPTION" value="No" id="mailNo" /><label class="noLabel" for="mailNo">Female </label><br />
						
					Subscribe to our mailing list:
						<input type="checkbox" name="SUBSCRIPTION" value="Yes" id="mailYes" checked />
				</fieldset>
					<div class="buttons">
						<input type="submit" class="buttons" name="Send" alt="Send" value="Send" />
						<input type="reset" class="buttons" name="Reset" value="Reset" />
					</div>				
			</form>
		
	</div>
	<!--END MAIN CONTENT-->

	</body>
</html>