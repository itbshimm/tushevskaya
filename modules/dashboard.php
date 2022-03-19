<?php
/*
if (!isset($_COOKIE['User'])) {
    header('Refresh: 0; url=/login');
} else { 
*/
?>
<div class="on__main">
    <a class="on__main__btn" href="/">На главную сайта</a>
</div>
<div class="table__tabs">
    <div class="table__tab" data-dashboard-tab="products">
        Товары
    </div>
    <div class="table__tab" data-dashboard-tab="categories">
        Категории
    </div>
    <div class="table__tab" data-dashboard-tab="brends">
        Бренды
    </div>
    <div class="table__tab" data-dashboard-tab="reviews">
        Отзывы
    </div>
    <div class="table__tab" data-dashboard-tab="applications">
        Заявки
    </div>
</div>
<div class="table__content">
    <?php
    include('productsTable.php');
    include('categoriesTable.php');
    include('brendsTable.php');
    include('reviewsTable.php');
    ?>
</div>
<?php
//} 
?>