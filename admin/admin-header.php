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


  <div class="container">
      <div class="row">
          <div class="col">
          
       <?php displayMessages(); ?>
