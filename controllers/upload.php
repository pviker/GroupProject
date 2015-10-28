<?php

require("database.php");

//Directory to insert into
$target_dir = "../images/";
//Retrieve file name and append to directory for full filepath
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
//echo "Target file: " . basename($_FILES["photo"]["name"]);
//Counter
$uploadOk = 1;
//Retrieve filetype
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
        
    } else {
        
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["photo"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
    
    // $insertQuery = "insert into products (photo_loc) values ('" . $target_file . "')";
//     
    // mysqli_query($dbc, $insertQuery);
    // mysqli_close($dbc);
    
?>