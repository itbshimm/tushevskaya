<!-- <div class="login__form">
    <form action='actions/login.php' method='POST'>
        <input name='login' placeholder="Логин" required="required">
        <input name='password' type='password' placeholder="Пароль" required="required">
        <input type='submit' value='Отправить'>
    </form>
</div> -->
<?php
if (isset($_COOKIE['User'])) {
    header('Refresh: 0; url=/dashboard');
} else {
    //простая формочка
    print "<div class='login__form'>
    <form action='../actions/login.php' method='POST'>
        <input name='login' placeholder='Логин' required='required'>
        <input name='password' type='password' placeholder='Пароль' required='required'>
        <input type='submit' value='Отправить'>
    </form>
</div>";
}
?>