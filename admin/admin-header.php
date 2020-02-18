<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="../vendors/bootstrap-4.4.1-dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="../vendors/fontawesome-free-5.12.1-web/css/all.min.css">
    <meta charset="UTF-8">
        <title>Document</title>
</head>
<body>
<?php session_start(); ?>
<?php require_once "../includes/db.php"; ?>


  <div class="container">
      <div class="row">
          <div class="col">
          
       <?php if(isError()): ?>
        <div class="alert alert-danger" role="alert">
           <?php  echo getError(); ?>
        </div>
        <?php endif; ?>
    
      
      <?php if(isSuccess()): ?>
       <div class="alert alert-success" role="alert">
           <?php  echo getSuccess(); ?>
        </div>
        <?php endif; ?>
