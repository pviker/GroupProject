<?php
/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: userinfo.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
<<<<<<< HEAD
 * Description: This page shows the categories, what is in them, and allows  an admin to add to them
 *   
 * */
require("../navigation.inc");
$navigation = new Navigation();
echo $navigation;

require("../controllers/database.php");

if ($_SESSION['adminFlag'] !== 1) {
        header ('Location: ../accounts/login.php'); 
    }

?>
<div class="breadcrumb">
    <ul>
        <li><a href="../index.php">home</a></li>
        <li><a href="../accounts/admin.php">admin</a></li>
        <li><a href="">products</a></li>
    </ul>
</div>

<div class = "mainContent">
     
     <h1 class="indexH1">Add Category</h1>
     
          <form action="addCategoryDB.php" name="addCategory" method="post">
              
              <fieldset id="field1">
              
              <label>Category:</label>
              
                   <select name="category">
                       
                       <option value="Guitars">Guitars</option>
                       <option value="Amps">Amps</option>
                       <option value="Drums">Drums</option>
                       
                   </select><br>
                   
               <label>Sub-Category:</label>
               
                    <input type="text" name="newSubcat" size="40"><br>
                    
               <label>Sub-Category Description:</label> 
                   
                    <textarea name="description" rows="4"></textarea><br>
                    
                    <label>Add Sub-Category</label>
                    
                         <input type="submit" name="submit" value="Add">
                    
              
              </fieldset>
              
          </form>
		         <form name="showCategory" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">            
				<fieldset id="field2">
					<label>What Category do you want to see:</label >
						<input type="text" name="showCat" placeholder="Enter category to show" size="60"><br>
					<label>Show Category:</label>
						<input type="submit" name="showCategory" value="Show Category">
				</fieldset> 
		</form> 
        <form name="showCategories" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">            
				<fieldset id="field3">
					<label>Show Category:</label>
						<input type="submit" name="showCategories" value="Show Categories">
				</fieldset> 
		</form> 		 
		<?php
			if(isset($_POST['showCategory'])) {
	
			$categorySearch = $_POST['showCat'];
				$con=mysqli_connect("localhost",$dbUser,$dbPass,$db);
				// Check connection
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				$sql="SELECT * from categories  where category='".$categorySearch."'";
				$result=mysqli_query($con,$sql);

				while ($row = mysqli_fetch_assoc($result)) {
					$id = $row['id'];
					$cat = $row['category'];
					$sub = $row['subcategory'];
					$desc = $row['description'];
					echo "<div class = 'mainContent' > <option value='".$id."'>".$sub." | ".$cat." | ".$desc."</option> </div>";
					}
				// Free result set
				 mysqli_free_result($result);

			}
			if(isset($_POST['showCategories'])) {
				$con=mysqli_connect("localhost",$dbUser,$dbPass,$db);
				$selectQuery ='select distinct category from categories' ;
				$result = mysqli_query($con , $selectQuery);
				while ($row = mysqli_fetch_assoc($result)) {
					$cat = $row['category'];
					echo "<div class = 'mainContent' >".$cat. "</div>"; 
				}
				// Free result set
				mysqli_free_result($result);
			}
		?>
			</div>
</body>

</html>
