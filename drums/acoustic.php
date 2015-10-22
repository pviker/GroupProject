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
		<nav>
		  <ul>
		    <li><a href="../index.php">home</a></li>
		    <li><a href="drums.php">drums</a></li>
		    <li><a href="">acoustic</a></li>
		  </ul>
		</nav>
	</div>
	
	<!--START MAIN CONTENT-->
	<div class="mainContent">		
		<table>
			<tr>
				<td><a href="productPages/Ludwig.php"><span class="img"><img src="../images/drums/Ludwig.jpg" height="200" width="200" /></span></a></td>
				<td><a href="productPages/Ludwig.php">Ludwig Junior Outfit</a></td>
				<td>$450</td>
			</tr>
			<tr>
				<td><a href="productPages/Stage.php"><span class="img"><img src="../images/drums/YamahaStage.jpg" height="200" width="200" /></span></a></td>
				<td><a href="productPages/Stage.php">Yamaha Stage Custom</a></td>
				<td>$700</td>
			</tr>
		</table>	
	</div>
	<!--END MAIN CONTENT-->

	</body>
</html>