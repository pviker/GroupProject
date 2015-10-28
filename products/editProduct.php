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

if(null === session_id()){
    session_start();
}
//if ($_SESSION['uname'] !== 'administrator') {
 //   header ('Location: login.php');
//}

require("../navigation.inc");
$navigation = new Navigation();
echo $navigation;

require("../controllers/database.php");

?>

<div class="breadcrumb">
    <ul>
        <li><a href="../index.php">home</a></li>
        <li><a href="admin.php">admin</a></li>
        <li><a href="">products</a></li>
    </ul>
</div>

<!-- <div class = "mainContent">
    <h1><a href="admin.php">Admin Interface</a> </h1> <br/>
</div> -->

<?php

//Query for user info
$productQuery = "select products.prod_id,products.cat_id,products.title,products.descr,products.price,
					products.photo_loc,categories.category,categories.subcategory from products ,categories  
						where products.cat_id = categories.id";

$results = mysqli_query($dbc, $productQuery);

?>

<div class = "mainContentTable">
    <h1 class="indexH1">Edit Products</h1>

    <table class = "usersTable">
        <tr>
            <td>ID</td>

            <td>Category</td>
            <td>Subcategory</td>
            <td>Title</td>
            <td>Descripton</td>
            <td>Price</td>
            <td>photo</td>
        </tr>

        <?php

        //Print rows from database records into table
        while($row = mysqli_fetch_assoc($results)) {
            $i = $row['prod_id'];
            $c = $row['category'];
            $s = $row['subcategory'];
            $cID = $row['cat_id'];
            echo "<tr><td>" . $row["prod_id"] . "</td><td>" . $row["category"] . "</td><td>" .
                $row["subcategory"] . "</td><td>" . $row["title"] . "</td><td>" . $row["descr"] . "</td><td>" .
                $row["price"] . "</td><td>" . $row["photo_loc"] . "</td><td>" . 
                	"<a href =" . "editProductDB.php?id=$i&cat=$c&sub=$s&cid=$cID" . " style=\"color:black\">EDIT</a>". 
                		"<a href =" . "confirmDeleteProduct.php?id=$i" . " style=\"color:black\">  DELETE</a>";

        }

        ?>

    </table>
</div>

	<?php
	
	//Free results from memory
	mysqli_free_result($results);
	//Close database connection
	mysqli_close($dbc);
	
	?>

</body>
</html>