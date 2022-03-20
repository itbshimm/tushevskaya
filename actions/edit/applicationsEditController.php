<?php
include('../../modules/connect.php');
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[1];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$product = $_POST['product_name'];

$sql = "UPDATE applications SET name='$name', phone='$phone', email='$email', product_id='$product' WHERE id='$url'";
mysqli_query($connect, $sql);
header("Location: /dashboard");
