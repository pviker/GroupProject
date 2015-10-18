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

	if(null === session_id()){
		session_start();
	}
	
	require("../navigation.inc");
	$navigation = new Navigation();
	echo $navigation;

?>

	<div class="breadcrumb">	
		  <ul>
		    <li><a href="../index.php">home</a></li>
		   	<li><a href="">contact</a></li>		    
		  </ul>
	</div>

	<!--START MAIN CONTENT-->
	<div class="mainContent">	
		<form name="sendEmail" action="sendEmail.php" method="post">
			<fieldset id="field1">
				<legend>Contact us</legend>
				<label for="subject" >Subject:</label>
					<input type="text" name="subject" placeholder="Subject" size="46" class="fields" id="subject" /><br />
				<label for="clientEmail">Your email:</label>
					<input type="text" name="clientEmail" placeholder="mail@example.com" size="46" class="fields" id="clientEmail" /><br />
	            	<textarea id="comments" name="comments" rows="8" cols="40" placeholder="Comments" class="email"></textarea><br />
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

