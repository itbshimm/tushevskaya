<div class="table__content__item" data-dashboard-content="applications">
    <?php
    include('./modules/connect.php');
    $applicationsQuerySql =
        "SELECT a.id,
        a.name,
        a.phone,
        a.email,
        a.comment,
        a.product_id,
        p.name AS p_name 
        FROM applications a
        INNER JOIN products p ON a.product_id=p.id";
    $applicationsQueryList = mysqli_query($connect, $applicationsQuerySql);
    ?>
    <a class="add__btn" href="/dashboard/applications/add">
        Добавить
    </a>
    <table class="table__sorter">
        <thead>
            <tr>
                <td>id</td>
                <td>Имя</td>
                <td>Телефон</td>
                <td>Email</td>
                <td>Комментарий</td>
                <td>Товар</td>
                <td>Редактировать</td>
                <td>Удалить</td>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($applicationsArrayList = mysqli_fetch_array($applicationsQueryList)) { ?>
                <tr>
                    <td><?= $applicationsArrayList['id'] ?></td>
                    <td><?= $applicationsArrayList['name'] ?></td>
                    <td><?= $applicationsArrayList['phone'] ?></td>
                    <td><?= $applicationsArrayList['email'] ?></td>
                    <td><?= $applicationsArrayList['comment'] ?></td>
                    <td><?= $applicationsArrayList['p_name'] ?></td>
                    <td class="edit_block"><a href="/dashboard/applications/edit?<?= $applicationsArrayList['id'] ?>"><i class="bi bi-gear-fill"></i></a></td>
                    <td class="del_block"><a href="/actions/del/applicationsDelController.php?<?= $applicationsArrayList['id'] ?>"><i class="bi bi-trash-fill"></i></a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>