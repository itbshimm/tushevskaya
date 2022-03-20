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

    // отзывы
  } elseif ($url == "/dashboard/reviews/add") {
    include('modules/add/reviewsAddView.php');
  } elseif ($url == "/dashboard/reviews/edit") {
    include('modules/edit/reviewsEditView.php');
    // отзывы

    // заявки
  } elseif ($url == "/dashboard/applications/add") {
    include('modules/add/applicationsAddView.php');
  } elseif ($url == "/dashboard/applications/edit") {
    include('modules/edit/applicationsEditView.php');
    // заявки

  } else {
    include('modules/404.php');
  }

  ?>
  <script src="/script.js"></script>
  <script>
    $(function() {
      $(".table__sorter").tablesorter({
        sortList: [
          [0, 0],
          [1, 0]
        ]
      });
    });
  </script>
</body>

</html>