<?php
include('../../modules/connect.php');
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[1];
$userName = $_POST['user_name'];
$userEmail = $_POST['user_email'];
$reviewText = $_POST['review_text'];
mysqli_query($connect, "UPDATE reviews SET user_name='$userName', user_email='$userEmail', review_text='$reviewText' WHERE id='$url'");
header("Location: /dashboard");
