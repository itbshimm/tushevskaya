<div class="table__content__item" data-dashboard-content="products">
    <?php
    include('./modules/connect.php');
    $sql = "SELECT p.id, 
p.category_id,
b.name AS brend_name, 
p.name, 
c.name AS category_name, 
p.description, 
p.image FROM categories c 
LEFT JOIN products p ON c.id=p.category_id 
INNER JOIN brends b ON b.id=p.brend_id";

    $query = mysqli_query($connect, $sql);
    // echo "<pre>";
    // print_r(mysqli_fetch_array($query));
    // echo "</pre>";
    ?>
    <a class="add__btn" href="/dashboard/product/add">
        Добавить
    </a>
    <table>
        <tr>
            <td>id</td>
            <td>Бренд</td>
            <td>Наименование</td>
            <td>Категория</td>
            <td>Описание</td>
            <td>Изображение</td>
            <td>Редактировать</td>
            <td>Удалить</td>
        </tr>
        <?php
        while ($result = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?= $result['id'] ?></td>
                <td><?= $result['brend_name'] ?></td>
                <td><?= $result['name'] ?></td>
                <td><?= $result['category_name'] ?></td>
                <td><?= $result['description'] ?></td>
                <td><a target="_blank" href="/uploaded_files/<?= $result['image'] ?>"><?= $result['image'] ?></a></td>
                <td class="edit_block"><a href="/dashboard/product/edit?<?= $result['id'] ?>"><i class="bi bi-gear-fill"></i></a></td>
                <td class="del_block"><a href="/actions/del/productsDelController.php?<?= $result['id'] ?>"><i class="bi bi-trash-fill"></i></a></td>
            </tr>
        <?php
        }
        ?>

    </table>
</div>