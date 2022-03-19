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
        <a class="login__btn" href="/login">
            Войти
        </a>
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
    <div class="main">
        <div class="main__tabs">
            <div class="main__tab active" data-main-tab="products">
                Товары
            </div>
            <div class="main__tab" data-main-tab="reviews">
                Отзывы
            </div>
        </div>
        <div class="products main__tab__content" data-main-content="products">
            <?php
            include('./modules/connect.php');
            ?>
            <div class="products__filter">
                <div class="products__filter__block products__filter__category">
                    <div style="text-align: center; margin-bottom:10px">Категория</div>
                    <div class="filter__item filterCategory" data-filter-category="all">
                        Все
                    </div>
                    <?php
                    $filterCategoryQuery = mysqli_query($connect, "SELECT * FROM categories");
                    while ($result = mysqli_fetch_array($filterCategoryQuery)) { ?>
                        <div class="filter__item filterCategory" data-filter-category="<?= $result['id'] ?>">
                            <?= $result['name'] ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="products__filter__block products__filter__brend">
                    <div class="products__filter__category">
                        <div style="text-align: center; margin-bottom:10px">Бренд</div>
                        <div class="filter__item filterBrend" data-filter-brend="all">
                            Все
                        </div>
                        <?php
                        $filterBrendQuery = mysqli_query($connect, "SELECT * FROM brends");
                        while ($result = mysqli_fetch_array($filterBrendQuery)) { ?>
                            <div class="filter__item filterBrend" data-filter-brend="<?= $result['name'] ?>">
                                <?= $result['name'] ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="product__items__list">
                <div class="search__filter">
                    <div class="search__filter__title">Поиск</div>
                    <input type="text">
                </div>
                <div class="filters_test">
                    Нет товаров
                </div>
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
        </div>
        <div class="main__tab__content" data-main-content="reviews" style="display: none;">
            <div class="review__content">
                <div class="review__add">
                    <div>
                        <h2>Оставьте ваш отзыв</h2>
                    </div>
                    <form action="../actions/reviewAdd.php" method="post">
                        <div class="review__add__name">
                            <input type="text" name="userName" placeholder="Ваше имя" required="required">
                        </div>
                        <div class="review__add__email">
                            <input type="email" name="userEmail" placeholder="Ваш Email" required="required">
                        </div>
                        <div class="review__add__text">
                            <textarea name="reviewText" id="" cols="30" rows="10" placeholder="Введите текст отзыва" required="required"></textarea>
                        </div>
                        <div class="review__add__btn">
                            <input type="submit">
                        </div>
                    </form>
                </div>
                <div class="reviews__list">
                    <?php
                    $queryReviewsList = mysqli_query($connect, "SELECT * FROM reviews");
                    while ($resultReviewsList = mysqli_fetch_array($queryReviewsList)) {
                    ?>
                        <div class="review__item">
                            <div class="review__user__name">
                                <?= $resultReviewsList['user_name'] ?>
                            </div>
                            <div class="review__text">
                                <?= $resultReviewsList['review_text'] ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>