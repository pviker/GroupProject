<?php 

/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: index.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: Strat product page.
 *   
 * */
 
  require("../../navigation.inc");
 
  $navigation = new Navigation();

  echo $navigation;

?>

	<!--START MAIN CONTENT-->
	<div class="productContent">		
			<p><h2>Fender Deluxe PJ Bass Sea Foam Pearl</h2></p>
			<span class="productImg"><img src="../../images/guitars/Fender_Deluxe.jpg" height="500" width="300" /></span>
		    <span>
			    <p>$700</p>
			    <p>FEATURES:</p>
			       <ul>
				       <li>Precision Bass body with Maple 70’s Jazz Bass neck</li>
				       <li>Sea Foam Pearl color</li>
				       <li>20 Frets</li>
				       <li>34” Scale</li>
				       <li>Neck wood: Sapele</li>
				       <li>Chrome hardware</li>
	              </ul>
			</span>    
			
	</div>
	<!--END MAIN CONTENT-->

	</body>
</html>