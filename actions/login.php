<?php
include('../modules/connect.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start(); //не забываем во всех файлах писать session_start
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
        //ставим метку в сессии 
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['userLog'] = $row['user_log'];
        //ставим куки и время их хранения 10 дней
        setcookie("CookieMy", $row['user_log'], time() + 60 * 60 * 24 * 10);
        header("Location: /dashboard");
    } else {
        //если пользователя нет, то пусть пробует еще
        header("Location: /login");
    }
}
