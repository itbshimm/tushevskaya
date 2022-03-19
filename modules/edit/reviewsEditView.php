<?php
include('./modules/connect.php');
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$reviewsdId = $url[1];
$reviewsEditQuery = mysqli_query(
    $connect,
    "SELECT * FROM reviews WHERE id='$reviewsdId'"
);
$reviewsEditItem = mysqli_fetch_assoc($reviewsEditQuery);
?>
<div class="form__block">
    <form action="/actions/edit/reviewsEditController.php?<?= $reviewsEditItem['id'] ?>" method="post">
        <div class="form__block__item">
            <input type="text" name="user_name" placeholder="Название" required="required" value="<?= $reviewsEditItem['user_name'] ?>">
        </div>
        <div class="form__block__item">
            <input type="text" name="user_email" placeholder="Название" required="required" value="<?= $reviewsEditItem['user_email'] ?>">
        </div>
        <div class="form__block__item">
            <textarea name="review_text" placeholder="Напишите отзыв" required="required"><?= $reviewsEditItem['review_text'] ?></textarea>
        </div>
        <div class="form__block__item">
            <input type="submit" value="Изменить">
        </div>
    </form>
</div>