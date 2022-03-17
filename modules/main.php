<style>
    body {
        background-image: url("/img/fon.webp");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center center;
        background-size: cover;
    }
</style>
<div class="blur">
    <div class="header">
        <div class="account">

        </div>
        <div class="address">
            Г. ОРЕНБУРГ, УЛ. КОМСОМОЛЬСКАЯ 26
        </div>
        <div class="company_name">
            NIT
        </div>
        <div class="company_years">
            12 YEARS
        </div>
        <div class="company_slogan">
            КОМПАНИЯ НИТ ВО ВСЕ ВРЕМЕНА - ЭТО, ПРЕЖДЕ ВСЕГО, КОМАНДА ПРОФФЕСИОНАЛОВ СВОЕГО ДЕЛА
        </div>
        <div class="company_contacts">
            +7(3532)-300-500
            <br><br>
            INFO.NITSHOP.RU
        </div>
    </div>
    <div>
    </div>
    <div class="products">
        <?php
        include('./modules/connect.php');
        ?>
        <div class="products__filter">
            <div class="products__filter__category">
                <div class="filter__item" data-filter-category="all">
                    Все
                </div>
                <?php
                $filterCategoryQuery = mysqli_query($connect, "SELECT * FROM categories");
                while ($result = mysqli_fetch_array($filterCategoryQuery)) { ?>
                    <div class="filter__item" data-filter-category="<?= $result['id'] ?>">
                        <?= $result['name'] ?>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="products__filter__brend">
                <div class="products__filter__category">
                    <div class="filter__item" data-filter-brend="all">
                        Все
                    </div>
                    <?php
                    $filterBrendQuery = mysqli_query($connect, "SELECT * FROM brends");
                    while ($result = mysqli_fetch_array($filterBrendQuery)) { ?>
                        <div class="filter__item" data-filter-brend="<?= $result['name'] ?>">
                            <?= $result['name'] ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="product__items__list">
            <?php

            $sql = "SELECT p.id, 
        p.category_id,
        b.name AS brend_name, 
        p.name, 
        c.id AS category_id,
        c.name AS category_name, 
        p.description, 
        p.image FROM categories c 
        LEFT JOIN products p ON c.id=p.category_id 
        INNER JOIN brends b ON b.id=p.brend_id";
            $queryProductsMain = mysqli_query($connect, $sql);
            while ($resultProductsMain = mysqli_fetch_array($queryProductsMain)) { ?>
                <div class="product__item" data-item-category="<?= $resultProductsMain['category_id'] ?>" data-item-brend="<?= $resultProductsMain['brend_name'] ?>">
                    <div class="product__image">
                        <img src="/uploaded_files/<?= $resultProductsMain['image'] ?>" alt="">
                    </div>
                    <div class="product__brand">
                        <?= $resultProductsMain['brend_name'] ?>
                    </div>
                    <div class="product__name">
                        <?= $resultProductsMain['name'] ?>
                    </div>
                    <div class="product__desc">
                        <?= $resultProductsMain['description'] ?>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
        <div class="filters_test">
            Нет товаров
        </div>


    </div>
</div>