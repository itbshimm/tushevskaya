<?php
include('./modules/connect.php');
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$productId = $url[1];
$categoriesQuery = mysqli_query($connect, "SELECT products.id AS product_id,
products.name AS product_name,
products.description AS product_description,
products.image AS product_image,
categories.id AS category_id,
categories.name AS category_name 
FROM products LEFT JOIN categories ON categories.id=products.category_id
WHERE products.id='$productId'");
$productItem = mysqli_fetch_assoc($categoriesQuery);
$categoriesQuery = mysqli_query($connect, "SELECT * FROM categories");
?>
<div class="form__block">
    <form action="/actions/edit/productsEditController.php?<?= $productItem['product_id'] ?>" method="post" enctype="multipart/form-data">
        <div class="form__block__item">
            <input type="text" name="name" placeholder="Наименование" required="required" value="<?= $productItem['product_name'] ?>">
        </div>
        <div class="form__block__item">
            <textarea name="description" id="" rows="10" placeholder="Описание" required="required"><?= $productItem['product_description'] ?></textarea>
        </div>
        <div class="form__block__item">
            <img src="/uploaded_files/<?= $productItem['product_image'] ?>" alt="" style="width: 100%;">
        </div>
        <div class="form__block__item">
            <input type="file" name="image"><span><?= $productItem['product_image'] ?></span>
            <input name="oldImage" type="text" hidden value="<?= $productItem['product_image'] ?>">
        </div>
        <div class=" form__block__item">
            <select name="category" id="" required="required">
                <?php
                while ($categoriesResult = mysqli_fetch_array($categoriesQuery)) { ?>
                    <option <?php if ($productItem['category_id'] == $categoriesResult['id']) { ?> selected<?php } ?> value="<?= $categoriesResult['id'] ?>"><?= $categoriesResult['name'] ?></option>
                <?
                }
                ?>
            </select>
        </div>
        <div class="form__block__item">
            <input type="submit" value="Изменить">
        </div>
    </form>
</div>