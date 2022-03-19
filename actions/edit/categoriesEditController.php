<?php
include('../../modules/connect.php');
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[1];
$name = $_POST['name'];
mysqli_query($connect, "UPDATE categories SET name='$name' WHERE id='$url'");
header("Location: /dashboard");
