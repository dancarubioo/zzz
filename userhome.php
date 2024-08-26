<?php
session_start();
if(!isset($_SESSION["username"]))
 {
    header("location:Login.php");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            margin-top: 10%;
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Lokal ka sa Hood</h1>
    <?php echo$_SESSION["username"] ?> <a href="logout.php">Logout</a>

    <div class="container mt-5">
        <div>
            
        </div>
    <?php
    include_once("connect.php");
    $query = "SELECT * FROM images";
    $result = mysqli_query($data, $query);
    echo "<a class='btn btn-info mb-4' href='create.php'>Add New</a>";
    if($result->num_rows>0) {
        while($row = mysqli_fetch_array($result)){
            $name = $row["name"];
            $price = $row["price"];
            $fileName = $row["filename"];
            $imageUrl = "uploads/".$fileName;
            echo"<div class='profile mt-4'>";
            echo"<img src='$imageUrl'><br>";
            echo"<h6>$name</h6>";
            echo"<h6>$price</h6>";
            echo"</div>";
        }
    }   
    ?>
    </div>
    
</body>
</html>