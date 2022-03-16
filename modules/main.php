<style>
    body {
        background-image: url("/img/fon.jpg");
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
        $sql = "SELECT products.id AS product_id,
        products.name AS product_name,
        products.description AS product_description,
        products.image AS product_image,
        categories.id AS category_id,
        categories.name AS category_name 
        FROM products LEFT JOIN categories ON categories.id=products.category_id";
        $query = mysqli_query($connect, $sql);
        while ($result = mysqli_fetch_array($query)) { ?>
            <div class="product__item">
                <div class="product__image">
                    <img src="/uploaded_files/<?= $result['product_image'] ?>" alt="">
                </div>
                <div class="product__name">
                    <?= $result['product_name'] ?>
                </div>
                <div class="product__desc">
                    <?= $result['product_description'] ?>
                </div>
                <div class="product__category">
                    Ктегория: <?= $result['category_name'] ?>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</div>