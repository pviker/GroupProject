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
		    <li><a href="guitars.php">guitars</a></li>
		    <li><a href="">bass</a></li>
		  </ul>
		</nav>
	</div>
	
	<!--START MAIN CONTENT-->
	<div class="mainContent">		
		<table>
			<tr>
				<td><a href="productPages/Ibanez.php"><span class="img"><img src="../images/guitars/Ibanez_bass.jpg" height="300" width="200" /></span></a></td>
				<td><a href="productPages/Ibanez.php">Ibanez SRFF806 Six-String Electric Bass Guitar Black Stained</a></td>
				<td>$1059</td>
			</tr>
			<tr>
				<td><a href="productPages/Fender.php"><span class="img"><img src="../images/guitars/Fender_Deluxe.jpg" height="300" width="200" /></span></a></td>
				<td><a href="productPages/Fender.php">Fender Deluxe DJ Bass Sea Foam Pearl</a></td>
				<td>$700</td>
			</tr>
		</table>	
	</div>
	<!--END MAIN CONTENT-->

	</body>
</html>