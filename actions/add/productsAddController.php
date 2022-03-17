<?php
include('../../modules/connect.php');
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
$name = $_POST['name'];
$description = $_POST['description'];
$fileTmpPath = $_FILES['image']['tmp_name'];
$imageFile = $_FILES['image']['name'];
$category = $_POST['category'];
$brend = $_POST['brend'];
$imageArray = explode(".", $imageFile);
$imageName = strtolower(array_shift($imageArray));
$imageExtention = strtolower(end($imageArray));
$newFileName = md5(time() . $imageName) . '.' . $imageExtention;
$uploadFileDir = '../../uploaded_files/';
$dest_path = $uploadFileDir . $newFileName;
$sql = "INSERT INTO products (name, description, image, category_id, brend_id) VALUES ('$name', '$description', '$newFileName','$category', '$brend')";
if (move_uploaded_file($fileTmpPath, $dest_path)) {
header("Location: /dashboard");
exit;
} else {
    echo "photo not uploaded" . "<br>";
    print_r($_FILES);
    error_reporting(E_ALL);
}
?>