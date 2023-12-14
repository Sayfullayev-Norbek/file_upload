<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_FILES["photo"]) &&  $_FILES["photo"]["error"] == 0){
        $allowed = [
            "jpg"=>"image/jpg",
            "png"=>"image/png",
            "jpeg"=>"image/jpeg",
        ];

        $filename = $_POST["photo"]["name"];
        $filetype = $_POST["photo"]["type"];
        $filesize = $_POST["photo"]["size"];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if(array_key_exists($ext, $allowed)) die("ERROR: mavjud farmatda yuklang");

        $maxsize = 50*1024*1024;

        if($filename > $maxsize) die("ERROR: ruxsat etilgan hajimdan oshib ketdi");

        if(! in_array($filetype, $allowed)){
            if(file_exists("upload/" . $filename)){
                echo $filename . "bu file mavjud";
            }
            else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
                echo "File yuklandi";
            }
        }
        else{
            echo "xato da";
        }
    }
    else{
        echo "ERROR: " . $_FILES["photo"]["error"];
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filie yuklash</title>
</head>
<body>
    <form action="<?PHP ECHO $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <label for="fileSelect">Fayl yuklash</label>
        <input type="file" name="photo" id="fileSelect">

        <input type="submit" name="submit" value="Upload">

        <p>
            eslatma: jpg, png, jpeg
        </p>
    </form>
</body>
</html>
