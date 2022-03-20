<?php
include('../../modules/connect.php');
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[1];
$sql = "DELETE FROM applications WHERE id='$url'";
mysqli_query($connect, $sql);
header("Location: /dashboard");
