<?php
include('./modules/connect.php');
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$productId = $url[1];
$productsQuery = mysqli_query(
    $connect,
    "SELECT p.id, 
p.category_id,
p.brend_id,
b.name AS brend_name, 
p.name, 
c.name AS category_name, 
p.description, 
p.image FROM categories c 
LEFT JOIN products p ON c.id=p.category_id 
INNER JOIN brends b ON b.id=p.brend_id
WHERE p.id='$productId'"
);
$productItem = mysqli_fetch_assoc($productsQuery);
$categoriesQuery = mysqli_query($connect, "SELECT * FROM categories");
$brendsQuery = mysqli_query($connect, "SELECT * FROM brends");
?>
<div class="form__block">
    <form action="/actions/edit/productsEditController.php?<?= $productItem['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="form__block__item">
            <input type="text" name="name" placeholder="Наименование" required="required" value="<?= $productItem['name'] ?>">
        </div>
        <div class=" form__block__item">
            <select name="category" id="" required="required">
                <?php
                $productItem['category_id'];
                while ($categoriesResult = mysqli_fetch_array($categoriesQuery)) { ?>
                    <option <?php if ($productItem['category_id'] == $categoriesResult['id']) { ?> selected<?php } ?> value="<?= $categoriesResult['id'] ?>"><?= $categoriesResult['name'] ?></option>
                <?
                }
                ?>
            </select>
        </div>
        <div class=" form__block__item">
            <select name="brend" id="" required="required">
                <?php
                while ($brendsResult = mysqli_fetch_array($brendsQuery)) { ?>
                    <option <?php if ($productItem['brend_id'] == $brendsResult['id']) { ?> selected<?php } ?> value="<?= $brendsResult['id'] ?>"><?= $brendsResult['name'] ?></option>
                <?
                }
                ?>
            </select>
        </div>
        <div class="form__block__item">
            <textarea name="description" id="" rows="10" placeholder="Описание" required="required"><?= $productItem['description'] ?></textarea>
        </div>
        <div class="form__block__item">
            <img src="/uploaded_files/<?= $productItem['image'] ?>" alt="" style="width: 100%;">
        </div>
        <div class="form__block__item">
            <input type="file" name="image"><span><?= $productItem['image'] ?></span>
            <input name="oldImage" type="text" hidden value="<?= $productItem['image'] ?>">
        </div>

        <div class="form__block__item">
            <input type="submit" value="Изменить">
        </div>
    </form>
</div>