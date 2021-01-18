<?php
    echo "";
    if(isset($_POST['upload'])) {
        $target="uploads/".basename($_FILES['image']['name']);
        $db=mysqli_connect("localhost","root","","photos");
        $image=$_FILES['image']['name'];
        $text=$_POST['text'];

        $sql="INSERT INTO images (image, text) VALUES ('$image','$text')";
        mysqli_query($db, $sql);

        if(move_uploaded_file($_FILES['image']['tmp_name'], "$target")){
            echo "Image uploaded successfully";
        }else{
             echo "There was error";
        }
    }

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Upload</title>
    </head>
    <body>
        <div id="content">
            <form method="post" action="uploads.php" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                <div>
                    <input type="file" name="image">
                </div>
                <div>
                    <textarea name="text" cols="40" rows="4" placeholder="say something about"></textarea> 
                </div>
                <div>
                    <input type="submit" name="upload" value="upload image">
                </div>
            </form>
        </div>
    </body>
</html>

<?php

  $files = scandir("uploads");
  for($a = 2; $a < count($files); $a++) {
    ?>
    <p>
      <a download="<?php echo $files[$a] ?>" href = "uploads/<?php echo $files[$a] ?>"><?php echo $files[$a] ?></a>
    </p>
    
    <?php
  }
