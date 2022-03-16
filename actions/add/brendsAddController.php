<?php
include('../../modules/connect.php');
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
$name = $_POST['name'];
mysqli_query($connect, "INSERT INTO brends (name) VALUES ('$name')");

header("Location: /dashboard");
