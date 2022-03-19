<?php
include('../modules/connect.php');
$userName = $_POST["userName"];
$userEmail = $_POST["userEmail"];
$reviewText = $_POST["reviewText"];
$reviewAddQuery = mysqli_query($connect, "INSERT INTO reviews (user_name, user_email, review_text) VALUES ('$userName', '$userEmail', '$reviewText')");
header('Location: /');
