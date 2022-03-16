<?php
include('./modules/connect.php');
$sql = "SELECT products.id AS product_id,
products.name AS product_name,
products.description AS product_description,
products.image AS product_image,
categories.id AS category_id,
categories.name AS category_name 
FROM products LEFT JOIN categories ON categories.id=products.category_id";
$query = mysqli_query($connect, $sql);

?>
<a class="add__btn" href="/dashboard/product/add">
    Добавить
</a>
<div class="table__content__item" data-dashboard-content="products">
    <table>
        <tr>
            <td>id</td>
            <td>Наименование</td>
            <td>Описание</td>
            <td>Изображение</td>
            <td>Категория</td>
            <td>Редактировать</td>
            <td>Удалить</td>
        </tr>
        <?php
        while ($result = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?= $result['product_id'] ?></td>
                <td><?= $result['product_name'] ?></td>
                <td><?= $result['product_description'] ?></td>
                <td><a target="_blank" href="/uploaded_files/<?= $result['product_image'] ?>"><?= $result['product_image'] ?></a></td>
                <td><?= $result['category_name'] ?></td>
                <td class="edit_block"><a href="/dashboard/product/edit?<?= $result['product_id'] ?>"><i class="bi bi-gear-fill"></i></a></td>
                <td class="del_block"><a href="/actions/del/productsDelController.php?<?= $result['product_id'] ?>"><i class="bi bi-trash-fill"></i></a></td>
            </tr>
        <?php
        }
        ?>

    </table>
</div>