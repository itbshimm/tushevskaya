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
                <?php
                $filterCategoryQuery = mysqli_query($connect, "SELECT * FROM categories");
                while ($result = mysqli_fetch_array($filterCategoryQuery)) { ?>
                <div class="filter__item" dada-filter-category="<?= $result['id']?>">
                    <?= $result['name']?>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="products__filter__brend">

            </div>
        </div>
        <div class="product__items__list">
            <?php
            
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
            while ($result = mysqli_fetch_array($query)) { ?>
                <div class="product__item" data-item-category="<?= $result['category_name'] ?>" data-item-brend="<?= $result['brend_name'] ?>">
                    <div class="product__image">
                        <img src="/uploaded_files/<?= $result['image'] ?>" alt="">
                    </div>
                    <div class="product__brand">
                        <?= $result['brend_name'] ?>
                    </div>
                    <div class="product__name">
                        <?= $result['name'] ?>
                    </div>
                    <div class="product__desc">
                        <?= $result['description'] ?>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>


    </div>
</div>