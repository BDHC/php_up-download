<?php

if(isset($_post['upload'])){
    $conn = mysqli_connect("localhost","root","","updown");
    $filename=$_FILES['image']['name'];
    $destination = 'uploads/'.$filename;
    $extension=pathinfo($filename,PATHINFO_EXTENSION);
    $file=$_FILES['image']['tmp_name'];
    $size=$_FILES['image']['size'];
    if(move_uploaded_file($file, $destination)) {
        echo "Image uploaded successfully";
        $sql="INSERT INTO images (name, size) VALUES('$filename','$size',0)";
        if(mysqli_query($conn,$sql)){
            echo "Image uploaded successfully";
        }else{
            echo "error";
        }
        
    }else{
         echo "There was error";
    }

}

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div clas="row">
            <form action="udfiles.php" method="post" enctype="multipart/form-data">

                <h2>UPLOAD HERE</h2>

                <div class="box">     
                 <input type="file" name="image"> 
                 <button type="submit" name="upload">Submit</button> 
                </div> 



            </form>
        </div>
    </div>
</body>
</html>