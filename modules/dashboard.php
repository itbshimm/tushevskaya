<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header("Location: /login");
} else { ?>
    <div class="on__main">
        <a class="on__main__btn" href="/">На главню сайта</a>
    </div>
    <div class="table__tabs">
        <div class="table__tab" data-dashboard-tab="products">
            Товары
        </div>
        <div class="table__tab" data-dashboard-tab="categories">
            Категории
        </div>
        <div class="table__tab" data-dashboard-tab="applications">
            Заявки
        </div>
        <div class="table__tab" data-dashboard-tab="reviews">
            Отзывы
        </div>
    </div>
    <div class="table__content">
        <?php
        include('productsTable.php')
        ?>
    </div>
<?php
}
?>