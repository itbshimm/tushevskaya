<?php
include('../../modules/connect.php');
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$productName = $_POST['product_name'];
$sql = "INSERT INTO applications (name, phone, email, product_id) VALUES ('$name', '$phone', '$email', '$productName')";
if (mysqli_query($connect, $sql)) {
    header("Location: /dashboard");
    exit;
} else {
    error_reporting(E_ALL);
}
