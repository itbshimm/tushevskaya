<?php
include('./modules/connect.php');
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$brendId = $url[1];
$brendQuery = mysqli_query(
    $connect,
    "SELECT * FROM brends WHERE id='$brendId'"
);
$brendItem = mysqli_fetch_assoc($brendQuery);
?>
<div class="form__block">
    <form action="/actions/edit/brendsEditController.php?<?= $brendItem['id'] ?>" method="post">
        <div class="form__block__item">
            <input type="text" name="name" placeholder="Название" required="required" value="<?= $brendItem['name'] ?>">
        </div>
        <div class="form__block__item">
            <input type="submit" value="Изменить">
        </div>
    </form>
</div>