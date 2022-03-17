<?php
include('../modules/connect.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
if (isset($_POST['login']) && isset($_POST['password'])) {
    //немного профильтруем логин
    $login = $_POST['login'];
    //хешируем пароль т.к. в базе именно хеш
    $password = $_POST['password'];
    // проверяем введенные данные
    $query = "SELECT *
            FROM users
            WHERE user_log= '$login' AND user_pass = '$password'
            LIMIT 1";
    $sql = mysqli_query($connect, $query);
    // если такой пользователь есть
    if (mysqli_num_rows($sql) == 1) {
        $row = mysqli_fetch_assoc($sql);
        setcookie("User", $row['user_log'], time() + 86400);
        header('Refresh: 0; url=/dashboard');
    } else {
        //если пользователя нет, то пусть пробует еще
        header('Refresh: 0; url=/login');
    }
}
