<?php 

/* 
 * ICS325 - Group Project
 * Iteration: 1
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
			<p><h2>Fender American Standard Stratocaster</h2></p>
			<span class="productImg"><img src="../../images/guitars/strat.jpg" height="450" width="450" /></span>
		    <span>
			    <p>$1299</p>
			    <p>FEATURES:</p>
			       <ul>
				       <li>Body shape: Double cutaway</li>
				       <li>Body type: Solid body</li>
				       <li>Body wood: Alder</li>
				       <li>Neck shape: C modern</li>
				       <li>Neck wood: Maple</li>
				       <li>Scale length: 25.5"</li>
				       <li>Neck Pickup: Custom Shop Fat '50s</li>
				       <li>Middle Pickup: Custom Shop Fat '50s</li>
	                   <li>Bridge Pickup: Custom Shop Fat '50s</li>
	                   <li>Bridge type: Tremolo/Vibrato</li>
	                   <li>Bridge design: Synchronized tremolo</li>
	                   <li>Finish: Olympic White</li>
	              </ul>
			</span>    
			
	</div>
	<!--END MAIN CONTENT-->

	</body>
</html>