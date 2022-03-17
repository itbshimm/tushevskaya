<?php
include('./modules/connect.php');
$categoriesQuery = mysqli_query($connect, "SELECT * FROM categories");
$brendsQuery = mysqli_query($connect, "SELECT * FROM brends");
?>
<div class="form__block">
    <form action="/actions/add/productsAddController.php" method="post" enctype="multipart/form-data">
        <div class="form__block__item">
            <input type="text" name="name" placeholder="Наименование" required="required">
        </div>
        <div class="form__block__item">
            <label for="category">Категория</label>
            <select id="category" name="category" id="" required="required">
                <option selected disabled>Выбрать</option>
                <?php
                while ($categoriesResult = mysqli_fetch_array($categoriesQuery)) { ?>
                    <option value="<?= $categoriesResult['id'] ?>"><?= $categoriesResult['name'] ?></option>
                <?
                }
                ?>
            </select>
        </div>
        <div class="form__block__item">
            <label for="brend">Бренд</label>
            <select id="brend" name="brend" id="" required="required">
                <option selected disabled>Выбрать</option>
                <?php
                while ($brendsResult = mysqli_fetch_array($brendsQuery)) { ?>
                    <option value="<?= $brendsResult['id'] ?>"><?= $brendsResult['name'] ?></option>
                <?
                }
                ?>
            </select>
        </div>
        <div class="form__block__item">
            <textarea name="description" id="" rows="10" placeholder="Описание" required="required"></textarea>
        </div>
        <div class="form__block__item">
            <input type="file" name="image" required="required">
        </div>
        <div class="form__block__item">
            <input type="submit" value="Добавить">
        </div>
    </form>
</div>