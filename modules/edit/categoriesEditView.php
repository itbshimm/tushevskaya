<?php
include('./modules/connect.php');
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$categoryId = $url[1];
$categoryQuery = mysqli_query(
    $connect,
    "SELECT * FROM categories WHERE id='$categoryId'"
);
$categoryItem = mysqli_fetch_assoc($categoryQuery);
?>
<div class="form__block">
    <form action="/actions/edit/categoriesEditController.php?<?= $categoryItem['id'] ?>" method="post">
        <div class="form__block__item">
            <input type="text" name="name" placeholder="Наименование" required="required" value="<?= $categoryItem['name'] ?>">
        </div>
        <div class="form__block__item">
            <input type="submit" value="Изменить">
        </div>
    </form>
</div>