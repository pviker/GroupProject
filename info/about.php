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
		   	<li><a href="info.php">info</a></li>
		    <li><a href="">about</a></li>		    
		  </ul>
		
	</div>
	
	<!--START MAIN CONTENT-->
	<div class="mainContent">		
		Lorem ipsum dolor sit amet, iusto aperiam fierent pro te, mea ad eius sapientem. 
		Vel te natum solet, ex consulatu deseruisse voluptatibus ius, eu sea affert congue 
		aliquid. Choro percipitur ius ea. Ea duo menandri indoctum, no pro erat tantas. 
		Quis liber fuisset in eos. Ad dicta splendide assueverit quo, officiis laboramus 
		prodesset te per. Aliquip legimus an sea. Eam ei sumo magna albucius, ei verear 
		aliquip qui, ad adhuc tollit eum. Nibh quaeque meliore an vel, ei percipit molestiae 
		vis. Sed veritus efficiendi te, at vix saepe primis interpretaris.
	</div>
	<!--END MAIN CONTENT-->

	</body>
</html>