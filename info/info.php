<?php 
		
	if(null === session_id()){
		session_start();
	}
			
/* 
 * ICS325 - Group Project
 * Iteration: 2
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

	<div class="breadcrumb">
		
		  <ul>
		    <li><a href="../index.php">home</a></li>
		    <li><a href="">info</a></li>		    
		  </ul>
		
	</div>
	
	<!--START MAIN CONTENT-->
	<div class="mainContent">		
		<span>
			about
		</span>	
		<span>
			contact
		</span>
	</div>
	<!--END MAIN CONTENT-->

	</body>
</html>