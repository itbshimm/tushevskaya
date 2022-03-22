<?php
include('./modules/connect.php');
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$applicationsId = $url[1];
$applicationsQuery = mysqli_query(
    $connect,
    "SELECT a.id,
        a.name,
        a.phone,
        a.email,
        a.comment,
        a.product_id,
        p.name AS p_name 
        FROM applications a
        INNER JOIN products p ON a.product_id=p.id
        WHERE a.id='$applicationsId'"
);
$applicationsItem = mysqli_fetch_assoc($applicationsQuery);
$productsQuery = mysqli_query($connect, "SELECT * FROM products");
?>
<div class="form__block">
    <form action="/actions/edit/applicationsEditController.php?<?= $applicationsItem['id'] ?>" method="post">
        <div class="form__block__item">
            <input type="text" name="name" placeholder="Имя" required="required" value="<?= $applicationsItem['name'] ?>">
        </div>
        <div class="form__block__item">
            <input type="tel" name="phone" placeholder="Телефон" required="required" value="<?= $applicationsItem['phone'] ?>">
        </div>
        <div class="form__block__item">
            <input type="email" name="email" placeholder="Email" required="required" value="<?= $applicationsItem['email'] ?>">
        </div>
        <div class="form__block__item">
            <textarea name="comment" required="required" cols="30" rows="10" placeholder="Комментарий к заявке"><?= $applicationsItem['comment'] ?></textarea>
        </div>
        <div class=" form__block__item">
            <label for="product">Товар</label>
            <select name="product_name" id="" required="required">
                <?php
                while ($productsResult = mysqli_fetch_array($productsQuery)) { ?>
                    <option <?php if ($applicationsItem['product_id'] == $productsResult['id']) { ?> selected<?php } ?> value="<?= $productsResult['id'] ?>"><?= $productsResult['name'] ?></option>
                <?
                }
                ?>
            </select>
        </div>
        <div class="form__block__item">
            <input type="submit" value="Изменить">
        </div>
    </form>
</div>