<?php
include_once("connect.php");
if($_POST["submit"]){
    $fullName = $_POST["fullname"];
    $fileName = $_FILES["image"]["name"];
    $price = $_POST["price"];

    $ext = pathinfo ($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "uploads/".$fileName;
    
    if(in_array($ext, $allowedTypes)){
        if(move_uploaded_file($tempName, $targetPath)){
            $query = "INSERT INTO images (name, filename, price) VALUES ('$fullName', '$fileName', $price)";
            if(mysqli_query($data, $query)){
                echo"your image is inserted"."<br>";
                echo"<a href='userhome.php'>";
                echo"click here to go to homepage"; 
                
            }
            else{
                echo"something is wrong";
            }
        }
        else{
            echo"file is not uploaded";
        }
    }
    else{
        echo"your files are not allowed";
    }
}
?>