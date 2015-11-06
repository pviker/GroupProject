<?php

	if(null === session_id()){
	    session_start();
	}
    
    require("../navigation.inc");
    $navigation = new Navigation();
    echo $navigation;
    
    require("../controllers/database.php");
	
	if ($_SESSION['adminFlag'] !== 1) {
		 header ('Location: ../accounts/login.php');  
    }
	
	//product id
	$id = $_GET['id'];
	$cat1 = $_GET['cat'];
	$sub1 = $_GET['sub'];
	$cID = $_GET['cid'];
	
	
	
	// //product id to session
	$_SESSION["id"] = $id;
	$_SESSION['cat']= $cat1;
	$_SESSION['sub'] = $sub1;
	$_SESSION['cid'] = $cID;

?>
<html>
<body>
	<div class="breadcrumb">
	    <ul>
	        <li><a href="../index.php">home</a></li>
	        <li><a href="../accounts/admin.php">admin</a></li>
	        <li><a href="editProduct.php">products</a></li>
	        <li><a href="">edit/delete product</a></li>
	    </ul>
	</div>

	<!--START MAIN CONTENT-->
	<div class="mainContent">
	    <form action="confirmEditProduct.php" method="post" enctype="multipart/form-data">
	
	<?php //var_dump($_SESSION); var_dump($_GET); var_dump($_POST);?>
	        <fieldset id="field1">
	
	<?php

		
		$sql = "select products.title,products.descr,products.price,
					products.photo_loc, products.qty,categories.category,categories.subcategory from products ,
						categories  where products.cat_id = categories.id and products.prod_id ='". $id. "'";
		;
		$result=mysqli_query($dbc,$sql);
		$row = mysqli_fetch_row($result);
		
		$cat = $row[5];
		$sub = $row[6];
		$title = $row[0];
		$descr = $row[1];
		$price = $row[2];
		$photo = $row[3];
		$qty = $row[4];
		
		
		// Free result set
		mysqli_free_result($result);
		
		mysqli_close($dbc);
	//	var_dump($photo);
	?>
	
	            <label>Category</label>
	            <select id="category"  name="catid">;
	                <option value="">Select</option>;
	
	                <?php
		                $con=mysqli_connect("localhost",$dbUser,$dbPass,$db);
		                // Check connection
		                if (mysqli_connect_errno())
		                {
		                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		                }
		
		                $sql="SELECT * from categories";
		                $result=mysqli_query($con,$sql);
		
		                while ($row = mysqli_fetch_assoc($result)) {
		                    $id = $row['id'];
		                    $cat = $row['category'];
		                    $sub = $row['subcategory'];
		                    echo "<option value='".$id."'>".$sub." ".$cat."</option>";
		                }
		                // Free result set
		                mysqli_free_result($result);
		
		                mysqli_close($con);
	                ?>
	            </select><br />
	
	            <input type="hidden" name="category" value="<?php echo "$cat1"; ?>">
	            <input type="hidden" name="subcategory" value="<?php echo "$sub1"; ?>">
	            <label>Title</label>
	            <input type="text" name="title" placeholder="" value="<?php echo "$title"; ?>" size="55" id="title"/><br />
	
	            <label>Description</label>
	            <textarea name="descr"   rows ="3" cols = "55" id="descr"><?php echo "$descr"; ?> </textarea> <br />
	
	
	          				<label>Price:</label>
				<input type="text" name="price" size="15"
					   value="<?php echo "$price" ?>" id="price" /><br />

				<label>Qty:</label>
				<input type="text" name="qty" size="15"
					   value="<?php echo "$qty" ?>" id="qty" /><br />

				<label>Current Photo</label>
	            <img src="../<?php echo $photo;?>" alt="Current photo" style="width:304px;height:228px;"><br />
	            <input type ="hidden" name ="oldphoto" value="<?php echo $photo;?>">
	            <label>Upload new Photo: </label>
	
	            <input type="file" name="photo" id="photo" accept="image/*" >
                <input type="hidden" name="photo" id="photo"  >

	
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
