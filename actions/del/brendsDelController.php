<?php
include('../../modules/connect.php');
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[1];
mysqli_query($connect, "DELETE FROM brends WHERE id='$url'");
header("Location: /dashboard");
