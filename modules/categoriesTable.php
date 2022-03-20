<div class="table__content__item" data-dashboard-content="categories">
    <?php
    include('./modules/connect.php');

    $categoriesQueryList = mysqli_query($connect, "SELECT * FROM categories");

    ?>
    <a class="add__btn" href="/dashboard/categories/add">
        Добавить
    </a>
    <table class="table__sorter">
        <thead>
            <tr>
                <td>id</td>
                <td>Название</td>
                <td>Редактировать</td>
                <td>Удалить</td>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($result = mysqli_fetch_array($categoriesQueryList)) { ?>
                <tr>
                    <td><?= $result['id'] ?></td>
                    <td><?= $result['name'] ?></td>
                    <td class="edit_block"><a href="/dashboard/categories/edit?<?= $result['id'] ?>"><i class="bi bi-gear-fill"></i></a></td>
                    <td class="del_block"><a href="/actions/del/categoriesDelController.php?<?= $result['id'] ?>"><i class="bi bi-trash-fill"></i></a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>