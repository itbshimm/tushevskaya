<?php
//Если форма авторизации отправлена...
if (!empty($_REQUEST['password']) and !empty($_REQUEST['login'])) {
    //Пишем логин и пароль из формы в переменные (для удобства работы):
    $login = $_REQUEST['login'];
    $password = $_REQUEST['password'];
    include('../modules/connect.php');
    $query = 'SELECT *  FROM users WHERE login="' . $login . '" AND password="' . $password . '"';
    $result = mysqli_query($connect, $query); //ответ базы запишем в переменную $result. 
    $user = mysqli_fetch_assoc($result); //преобразуем ответ из БД в нормальный массив PHP

    //Если база данных вернула не пустой ответ - значит пара логин-пароль правильная
    if (!empty($user)) {

        //Стартуем сессию:
        session_start();

        //Пишем в сессию информацию о том, что мы авторизовались:
        $_SESSION['auth'] = true;

        //Пишем в сессию логин и id пользователя (их мы берем из переменной $user!):
        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['login'];
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/dashboard');
    } else {
        $_SERVER['HTTP_REFERER'];
    }
}
