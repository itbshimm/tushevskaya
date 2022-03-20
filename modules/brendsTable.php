<div class="table__content__item" data-dashboard-content="brends">
    <?php
    include('./modules/connect.php');

    $brendsQueryList = mysqli_query($connect, "SELECT * FROM brends");

    ?>
    <a class="add__btn" href="/dashboard/brends/add">
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
            while ($result = mysqli_fetch_array($brendsQueryList)) { ?>
                <tr>
                    <td><?= $result['id'] ?></td>
                    <td><?= $result['name'] ?></td>
                    <td class="edit_block"><a href="/dashboard/brends/edit?<?= $result['id'] ?>"><i class="bi bi-gear-fill"></i></a></td>
                    <td class="del_block"><a href="/actions/del/brendsDelController.php?<?= $result['id'] ?>"><i class="bi bi-trash-fill"></i></a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>