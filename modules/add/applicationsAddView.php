<?php
include('./modules/connect.php');
$productsQuery = mysqli_query($connect, "SELECT * FROM products");
?>
<div class="form__block">
    <form action="/actions/add/applicationsAddController.php" method="post">
        <div class="form__block__item">
            <input type="text" name="name" placeholder="Имя" required="required">
        </div>
        <div class="form__block__item">
            <input type="email" name="email" placeholder="Email" required="required">
        </div>
        <div class="form__block__item">
            <input type="tel" class="product__form__tel" name="phone" placeholder="Телефон" required="required">
        </div>
        <div class="form__block__item">
            <textarea name="comment" required="required" cols="30" rows="10" placeholder="Комментарий к заявке"></textarea>
        </div>
        <div class="form__block__item">
            <label for="products">Товар</label>
            <select id="products" name="product_name" id="" required="required">
                <option selected disabled>Выбрать</option>
                <?php
                while ($productsResult = mysqli_fetch_array($productsQuery)) { ?>
                    <option value="<?= $productsResult['id'] ?>"><?= $productsResult['name'] ?></option>
                <?
                }
                ?>
            </select>
        </div>
        <div class="form__block__item">
            <input type="submit" value="Добавить">
        </div>
    </form>
</div>