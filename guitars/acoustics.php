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
		    <li><a href="">acoustic</a></li>
		  </ul>
		</nav>
	</div>
	
	<!--START MAIN CONTENT-->
	<div class="mainContent">		
		<table>
			<tr>
				<td><a href="productPages/YamahaF335.php"><span class="img"><img src="../images/guitars/YamahaF335.jpg" height="300" width="200" /></span></a></td>
				<td><a href="productPages/YamahaF335.php">Yamaha F335</a></td>
				<td>$129</td>
			</tr>
			<tr>
				<td><a href="productPages/Taylor.php"><span class="img"><img src="../images/guitars/Taylor.jpg" height="300" width="200" /></span></a></td>
				<td><a href="productPages/Taylor.php">Taylor GS Mini Koa</a></td>
				<td>$619</td>
			</tr>
		</table>	
	</div>
	<!--END MAIN CONTENT-->

	</body>
</html>