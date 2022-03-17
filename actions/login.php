<?php
include('../modules/connect.php');
if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $queryLogin = mysqli_query($connect, "SELECT *
            FROM users
            WHERE user_log= '$login' AND user_pass = '$password'
            LIMIT 1");
    if (mysqli_num_rows($queryLogin) == 1) {
        $userLogin = mysqli_fetch_assoc($queryLogin);
        setcookie("user_log", $userLogin['user_log'], time() + 86400, "/");
        header('Location: /dashboard');
        exit();
    } else {
        header('Location: /login');
        exit();
    }
}
