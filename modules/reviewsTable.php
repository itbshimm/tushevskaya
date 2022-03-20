<div class="table__content__item" data-dashboard-content="reviews">
    <?php
    include('./modules/connect.php');

    $reviewsQueryList = mysqli_query($connect, "SELECT * FROM reviews");

    ?>
    <a class="add__btn" href="/dashboard/reviews/add">
        Добавить
    </a>
    <table class="table__sorter">
        <thead>
            <tr>
                <td>id</td>
                <td>Имя</td>
                <td>Email</td>
                <td>Отзыв</td>
                <td>Редактировать</td>
                <td>Удалить</td>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($reviewResultList = mysqli_fetch_array($reviewsQueryList)) { ?>
                <tr>
                    <td><?= $reviewResultList['id'] ?></td>
                    <td><?= $reviewResultList['user_name'] ?></td>
                    <td><?= $reviewResultList['user_email'] ?></td>
                    <td><?= $reviewResultList['review_text'] ?></td>
                    <td class="edit_block"><a href="/dashboard/reviews/edit?<?= $reviewResultList['id'] ?>"><i class="bi bi-gear-fill"></i></a></td>
                    <td class="del_block"><a href="/actions/del/reviewsDelController.php?<?= $reviewResultList['id'] ?>"><i class="bi bi-trash-fill"></i></a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>
</div>