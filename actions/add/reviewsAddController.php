<?php
include('../../modules/connect.php');
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
$userName = $_POST['user_name'];
$userEmail = $_POST['user_email'];
$reviewText = $_POST['review_text'];
mysqli_query($connect, "INSERT INTO reviews (user_name, user_email, review_text) VALUES ('$userName', '$userEmail', '$reviewText')");
header("Location: /dashboard");
