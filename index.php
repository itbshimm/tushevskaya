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
  } elseif ($url == "/dashboard/product/add") {
    include('modules/add/productsAddView.php');
  } elseif ($url == "/dashboard/product/edit") {
    include('modules/edit/productsEditView.php');
  } else {
    include('modules/404.php');
  }

  ?>
</body>

</html>