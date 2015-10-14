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

		<!-- <form onsubmit="return submitForm()" action="mailinglistresults.html" method="post"> -->
		<form>
			
			<fieldset id="field1">
				<legend>Credentials</legend>
				<label>User name:</label><input type="text" name="userName" value="Enter user name" size="25" class="fields" id="userName" /><br />
				<label>Password:</label><input type="text" name="password" value="Enter password" size="25" class="fields" id="password" /><br />
			</fieldset>

			<div class="buttons">
				<input type="button" class="buttons" name="Send" alt="Send" value="Send" />
				<input type="reset" class="buttons" name="Reset" value="Reset" />
			</div> 

			
		</form>
	
	</div>
	<!--END MAIN CONTENT-->
	</body>
</html>