<?php 
	session_start();	
/* 
 * ICS325 - Group Project
 * Iteration: 1
 * Group: D for Dolphins
 * File: index.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: Main index page when going to the main site
 *   
 * */

	require("navigation.inc");
 
	$navigation = new Navigation();

	echo $navigation;
	
?>			
		<div class="mainContent" >
			<img src="images/mainguitar.jpg" id="mainPageImg"/><br />
			<p id="indexContent">
				<h1 class="indexH1"><?php echo $navigation->GetFilePath(); ?>Welcome to Music Electric Inc!</h1> <br /><br />
				<h3 class="indexH1">We sell beginner to professional level musical instruments at a competitive price.
				Check out our inventory and shoot us an email with any questions!</h3>
			</p>
		</div>
		
	</body>
</html>