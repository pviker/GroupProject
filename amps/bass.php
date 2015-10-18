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
		    <li><a href="amps.php">amps</a></li>
		    <li><a href="">bass</a></li>
		  </ul>
		</nav>
	</div>
	
	<!--START MAIN CONTENT-->
	<div class="mainContent">		
		<table>
			<tr>
				<td><a href="productPages/supersonic.php"><span class="img"><img src="../images/amplifiers/Fender_SuperSonic.jpg" height="200" width="200" /></span></a></td>
				<td><a href="productPages/supersonic.php">Fender Super Sonic 22 Watt 1x12" Combo</a></td>
				<td>$1049</td>
			</tr>
			<tr>
				<td><a href="productPages/marshall.php"><span class="img"><img src="../images/amplifiers/Marshall_bluesbreaker.jpg" height="200" width="200" /></span></a></td>
				<td><a href="productPages/marshall.php">Marshall 1962 Bluesbreaker - Used</a></td>
				<td>$1399</td>
			</tr>
		</table>	
	</div>
	<!--END MAIN CONTENT-->

	</body>
</html>