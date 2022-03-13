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
  if ($url == "/") {
    include('modules/main.php');
  } elseif ($url == "/login") {
    include('modules/login.php');
  } elseif ($url == "/dashboard") {
    include('modules/dashboard.php');
  } else {
    include('modules/404.php');
  }

  ?>
</body>

</html>