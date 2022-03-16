<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('modules/head.php');
  ?>
</head>

<body>
  <?php
  $url = $_SERVER['REQUEST_URI'];
  $url = explode('?', $url);
  $url = $url[0];
  if ($url == "/") {
    include('modules/main.php');
  } elseif ($url == "/login") {
    include('modules/login.php');
  } elseif ($url == "/dashboard") {
    include('modules/dashboard.php');

    // товары
  } elseif ($url == "/dashboard/product/add") {
    include('modules/add/productsAddView.php');
  } elseif ($url == "/dashboard/product/edit") {
    include('modules/edit/productsEditView.php');
    // товары

    // категории
  } elseif ($url == "/dashboard/categories/add") {
    include('modules/add/categoriesAddView.php');
  } elseif ($url == "/dashboard/categories/edit") {
    include('modules/edit/categoriesEditView.php');
    // категории

    // бренды
  } elseif ($url == "/dashboard/brends/add") {
    include('modules/add/brendsAddView.php');
  } elseif ($url == "/dashboard/brends/edit") {
    include('modules/edit/brendsEditView.php');
    // бренды

  } else {
    include('modules/404.php');
  }

  ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="/script.js"></script>
</body>

</html>