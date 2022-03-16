
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
$imageArray = explode(".", $imageFile);
$imageName = strtolower(array_shift($imageArray));
$imageExtention = strtolower(end($imageArray));
$newFileName = md5(time() . $imageName) . '.' . $imageExtention;
$uploadFileDir = '../../uploaded_files/';
$dest_path = $uploadFileDir . $newFileName;
$sql = "INSERT INTO products (name, description, image, category_id) VALUES ('$name', '$description', '$newFileName','$category')";
move_uploaded_file($fileTmpPath, $dest_path);
mysqli_query($connect, $sql);
header("Location: /dashboard");
?>