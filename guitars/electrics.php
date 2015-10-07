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
  
  	$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
	$txt = "John Doe\n";
	fwrite($myfile, $txt);
	$txt = "Jane Doe\n";
	fwrite($myfile, $txt);
	fclose($myfile);
 
?>	
	
	<!--START MAIN CONTENT-->
	<div class="mainContent">		
		<table>
			<tr>
				<td><a href="productPages/strat.php"><span class="img"><img src="../images/guitars/strat.jpg" height="200" width="200" /></span></a></td>
				<td><a href="productPages/strat.php">Fender American Standard Stratocaster</a></td>
				<td>$1299</td>
			</tr>
			<tr>
				<td><a href="productPages/es335.php"><span class="img"><img src="../images/guitars/Gibson_ES335.jpg" height="200" width="200" /></span></a></td>
				<td><a href="productPages/es335.php">Gibson Custom Shop VOS ES-335</a></td>
				<td>$3199</td>
			</tr>
		</table>	
	</div>
	<!--END MAIN CONTENT-->

	</body>
</html>