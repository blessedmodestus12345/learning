<?php
$target_dir="uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk=1;
$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//to check if the image file is an actual image or fake image
if(isset($_POST["submit"])){
    $check=getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check!==false){
        echo "File is an image-" . $check["mime"]. ".";
    $uploadOk=1;
    }else{
        echo "File is not an image.";
        $uploadOk=0;
    } 
}
//To check if the file already existing in the dir
if(file_exists($target_file)){
    echo "file already exist.";
    $uploadOk=0;
}
// To check file size
if($_FILES["fileToUpload"]["size"] > 500000){
    echo "file is too large";
    $uploadOk=0;
}
//To check check the file type/format: jpg,jpeg,png na gif
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
    echo "only JPG, JPEG, PNG & GIF files are allowed";
    $uploadOk=0;
}
//to check if $uploadOk is set to 0 by an error
if(move_uploaded_file($_FILEs["fileToUpload"]["tmp_name"], $target_file)){
    echo "The file" . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). "has been uploaded.";    
}
else{
        echo "There was an error uploading your file";
    }