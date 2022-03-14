<?php
include('../modules/connect.php');
$login = $_POST['login'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE login=$login AND password = $password";
$result = mysqli_query($connect, $sql);
$currentUser = mysqli_num_rows($result);
if (!$currentUser) {
    echo 'warning';
} else {
    echo "Получено $currentUser записей";
}

die();
// if ($result) {
//     echo "вы авторизовались";
// } else {
//     echo "неверный логин или пароль";
// }
