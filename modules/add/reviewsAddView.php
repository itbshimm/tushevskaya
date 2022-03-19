<?php
include('./modules/connect.php');
?>
<div class="form__block">
    <form action="/actions/add/reviewsAddController.php" method="post">
        <div class="form__block__item">
            <input type="text" name="user_name" placeholder="Имя" required="required">
        </div>
        <div class="form__block__item">
            <input type="email" name="user_email" placeholder="Email" required="required">
        </div>
        <div class="form__block__item">
            <textarea name="review_text" placeholder="Напишите отзыв" required="required"></textarea>
        </div>
        <div class="form__block__item">
            <input type="submit" value="Добавить">
        </div>
    </form>
</div>