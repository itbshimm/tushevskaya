<?php
include('./modules/connect.php');
?>
<div class="form__block">
    <form action="/actions/add/categoriesAddController.php" method="post">
        <div class="form__block__item">
            <input type="text" name="name" placeholder="Наименование" required="required">
        </div>
        <div class="form__block__item">
            <input type="submit" value="Добавить">
        </div>
    </form>
</div>