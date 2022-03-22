<?php
include('../modules/connect.php');
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$comment = $_POST['comment'];
$serverName =  $_SERVER['SERVER_NAME'];
$productId = $_POST['product_id'];
$productMailQuery = mysqli_query($connect, "SELECT * FROM products WHERE id = '$productId'");
$productMailData = mysqli_fetch_assoc($productMailQuery);

$to = "$email";
$subject = 'Заявка на заказ ООО "НИТ"';
$message = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        padding: 20px;
    }

    .product__item {
        display: flex;
    }

    .product__info {
        padding: 0 10px;
    }

    .product__image {
        max-width: 400px;
    }

    .product__image img {
        width: 100%;
        border-radius: 10px;
    }

    .product__name {
        font-size: 20pt;
        font-weight: 500;
        margin-bottom: 20px;
    }

    .product__desc {
        font-size: 16pt;
        color: gray;
    }
</style>

<body>
    <h2>Большое спасибо вам за заказ</h2>
    <h4>Мы перезвоним вам в ближайшее время</h4>
    <div class="product__item">
        <div class="product__image">
            <img src="' . $serverName . '/' . $productMailData['image'] . '" alt="">
        </div>
        <div class="product__info">
            <div class="product__name">
               ' . $productMailData['brend'] . ' ' . $productMailData['name'] . '
            </div>
            <div class="product__desc">
                ' . $productMailData['description'] . '
            </div>
            <div class="product__desc">
                <h4>Комментарий к заявке:</h4>
                ' . $productMailData['comment'] . '
            </div>
        </div>
    </div>
</body>

</html>';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
// ; //отправляет получателю на емайл значения переменных

error_reporting(E_ALL);
mail($to, $subject, $message, $headers);

mysqli_query($connect, "INSERT INTO applications (name, phone, email, comment, product_id) VALUES ('$name', '$phone', '$email', '$comment', '$productId')");
header('Location: /');
