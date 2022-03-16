<!-- <div class="login__form">
    <form action='actions/login.php' method='POST'>
        <input name='login' placeholder="Логин" required="required">
        <input name='password' type='password' placeholder="Пароль" required="required">
        <input type='submit' value='Отправить'>
    </form>
</div> -->
<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: /dashboard");
} else {
    $login = '';
    //проверяем куку, может он уже заходил сюда
    if (isset($_COOKIE['CookieMy'])) {
        $login = htmlspecialchars($_COOKIE['CookieMy']);
    }
    //простая формочка
    print "<div class='login__form'>
    <form action='actions/login.php' method='POST'>
        <input name='login' placeholder='Логин' required='required'>
        <input name='password' type='password' placeholder='Пароль' required='required'>
        <input type='submit' value='Отправить'>
    </form>
</div>";
}
