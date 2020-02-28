<?php ob_start(); ?>
<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="../vendors/bootstrap-4.4.1-dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="../vendors/fontawesome-free-5.12.1-web/css/all.min.css">
    <meta charset="UTF-8">
        <title>Document</title>
</head>
<body>

<?php require_once "../includes/db.php"; ?>

  
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <div class="container">
          <a href="" class="navbar-brand">
              MyBoxSystem
          </a>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarNav" >
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a href="discount_read_list_view.php" class="nav-link">Discounts</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a href="user_read_list_view.php" class="nav-link">Users</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a href="payment_method_read_list_view.php" class="nav-link">Payment Methods</a>
                  </li>

              </ul>
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <a href="" class="nav-link">Discounts</a>
                  </li>
                  <li class="nav-item">
                      <a href="" class="nav-link">Users</a>
                  </li>
                  
              </ul>
          </div>
      </div>
  </nav>

  <div class="container mt-3">
      <div class="row">
          <div class="col">
          
     
