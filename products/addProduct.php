<?php
/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: userinfo.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This page echoes all current users in the database.
 *   
 * */
require("../navigation.inc");
$navigation = new Navigation();
echo $navigation;

require("../controllers/database.php");

if(null === session_id()){
    session_start();
}

if ($_SESSION['adminFlag'] !== 1) {
		header ('Location: login.php');  
}	
?>

	<div class="breadcrumb">
		<ul>
			<li><a href="../index.php">home</a></li>
			<li><a href="../accounts/admin.php">admin</a></li>
			<li><a href="">Add Product</a></li>
		</ul>
	</div>
	
	<!--START MAIN CONTENT-->
	<div class="mainContent">
		
		<h1 class="indexH1">Add New Product</h1>
		<form action="addProductDB.php" method="post" enctype="multipart/form-data">
	
		<fieldset id="field1">
			<label>Category: </label>
	    	<select id="category"  name="subcat">;
	        <option value="">Select</option>;

<?php

        $sql="SELECT * from categories";
        $result=mysqli_query($dbc,$sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $cat = $row['category'];
            $sub = $row['subcategory'];
            echo "<option value='".$id."'>".$sub." ".$cat."</option>";
            }
        // Free result set
         mysqli_free_result($result);

         mysqli_close($dbc);

?>
		</select><br />
		
		    <input type="hidden" name="category" value="<?php echo "$cat" ?>">
		    <input type="hidden" name="subcategory" value="<?php echo "$sub" ?>">
		    
		    <label>Title</label>
		   		<input type="text" name="title" placeholder="" value="" size="15" id="title"/><br />
		
		    <label>Description</label>
		    	<textarea name="descr" value=""  rows ="3" cols = "55" id="desc"> </textarea> <br />
		
		
		    <label>Price:</label>
		    	<input type="text" name="price" size="15" value="" id="price" /><br />
			<label>Qty:</label>
			<input type="text" name="qty" size="15" value="" id="qty" /><br />
			<label>Photo Location:</label>
				
		    	<input type="file" name="photo" id="photo" accept="image/*" value="">
		
		</fieldset>
            <div class="buttons">
                <input type="submit" class="buttons" name="Submit" alt="Submit" value="Submit" id="submit" style="opacity: 1" />
                <input type="reset" class="buttons" name="Reset" value="Reset" />
            </div>
		</form>
		
	</div>
	<!--END MAIN CONTENT-->

</body>
</html>
