<?php
$photo =$_FILES['photo'];
//var_dump($Photo);
$photo_name = basename($photo['name']);
$photo_path = '../public/product_images/' . $photo_name; 
//var_dump($Photo_path);

$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];  //dozvoljeni nastavci
$ext = pathinfo($photo_name, PATHINFO_EXTENSION);  //exstenzija mog file

if(in_array($ext, $allowed_ext) && $photo ['size'] < 2000000){
    move_uploaded_file($photo['tmp_name'],$photo_path);

    echo json_encode(['success' => true, 'photo_path' => $photo_name]);
    }
    else{
        echo json_encode(['success' => false, 'error' => 'Invalid file']);
    }
?>
