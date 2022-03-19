<?php
include('../../modules/connect.php');
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[1];
$name = $_POST['name'];
$description = $_POST['description'];
$category = $_POST['category'];
$brend = $_POST['brend'];
$oldImage = $_POST['oldImage'];
$imageFile = $_FILES['image']['name'];
if ($imageFile != '') {
    // echo "изображение загружено";
    $fileTmpPath = $_FILES['image']['tmp_name'];
    $imageArray = explode(".", $imageFile);
    $imageName = strtolower(array_shift($imageArray));
    $imageExtention = strtolower(end($imageArray));
    $newFileName = md5(time() . $imageName) . '.' . $imageExtention;
    $uploadFileDir = '../../uploaded_files/';
    $dest_path = $uploadFileDir . $newFileName;
    $sql = "UPDATE products SET name='$name', description='$description', image='$newFileName', category_id='$category', brend_id='$brend' WHERE id='$url'";
    move_uploaded_file($fileTmpPath, $dest_path);
    mysqli_query($connect, $sql);
} else {
    // echo "изображение не загружено";
    $sql = "UPDATE products SET name='$name', description='$description', image='$oldImage', category_id='$category', brend_id='$brend' WHERE id='$url'";
    mysqli_query($connect, $sql);
}
header("Location: /dashboard");
