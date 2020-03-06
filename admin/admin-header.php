<?php ob_start(); ?>
<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
  
   <link rel="stylesheet" href="../vendors/bootstrap-4.4.1-dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="../vendors/fontawesome-free-5.12.1-web/css/all.min.css">
   <link rel="stylesheet" href="css/styles.css">
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
                  <li class="nav-item dropdown">
                      <a href="modality_read_list_view.php" class="nav-link">Modality</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a href="modality_class_read_list_view.php" class="nav-link">Classes</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a href="email_template_read_list_view.php" class="nav-link">Email</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a href="sms_template_read_list_view.php" class="nav-link">SMS</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a href="class_access_template_read_list_view.php" class="nav-link">Class Templates</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a href="periodic_service_read_list_view.php" class="nav-link">Periodic Services</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a href="coach_profile_read_list_view.php" class="nav-link">Coach Profiles</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a href="membership_read_list_view.php" class="nav-link">Memberships</a>
                  </li>



              </ul>
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <a href="" class="nav-link">Profile</a>
                  </li>
                  <li class="nav-item">
                      <a href="" class="nav-link">Logout</a>
                  </li>
                  
              </ul>
          </div>
      </div>
      
    
      
      
  </nav>
  
 
<div class="container-fluid">
  <div class="row">
    <div class="col-1  navbar-dark bg-dark" style="min-width:120px;" id="sidebar">
      
<!--
       <div id="MainMenu">
        <div class="list-group panel">
          <a href="#" class="list-group-item list-group-item-success" data-parent="#MainMenu">Item 1</a>
          <a href="#" class="list-group-item list-group-item-success" data-parent="#MainMenu">Item 2</a>
          <a href="#demo3" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Item 3 <i class="fa fa-caret-down"></i></a>
          <div class="collapse" id="demo3">
            <a href="#SubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Subitem 1 <i class="fa fa-caret-down"></i></a>
            <div class="collapse list-group-submenu" id="SubMenu1">
              <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 1 a</a>
              <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 2 b</a>
              <a href="#SubSubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubSubMenu1">Subitem 3 c <i class="fa fa-caret-down"></i></a>
              <div class="collapse list-group-submenu list-group-submenu-1" id="SubSubMenu1">
                <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 1</a>
                <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 2</a>
              </div>
              <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 4 d</a>
            </div>
            <a href="javascript:;" class="list-group-item">Subitem 2</a>
            <a href="javascript:;" class="list-group-item">Subitem 3</a>
          </div>
          <a href="#demo4" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Item 4  <i class="fa fa-caret-down"></i></a>
          <div class="collapse" id="demo4">
            <a href="" class="list-group-item">Subitem 1</a>
            <a href="" class="list-group-item">Subitem 2</a>
            <a href="" class="list-group-item">Subitem 3</a>
          </div>
        </div>
      </div>
-->
   
           
            <div class="list-group panel">
                <a href="#menu1" class="list-group-item collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-dashboard"></i> <span class="hidden-sm-down">Item 1</span> </a>
                <div class="collapse" id="menu1">
                    <a href="#menu1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 1 </a>
                    <div class="collapse" id="menu1sub1">
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem 1 a</a>
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem 2 b</a>
                        <a href="#menu1sub1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 3 c </a>
                        <div class="collapse" id="menu1sub1sub1">
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub1">Subitem 3 c.1</a>
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub1">Subitem 3 c.2</a>
                        </div>
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem 4 d</a>
                        <a href="#menu1sub1sub2" class="list-group-item" data-toggle="collapse"  aria-expanded="false">Subitem 5 e </a>
                        <div class="collapse" id="menu1sub1sub2">
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub2">Subitem 5 e.1</a>
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub2">Subitem 5 e.2</a>
                        </div>
                    </div>
                    <a href="#" class="list-group-item" data-parent="#menu1">Subitem 2</a>
                    <a href="#" class="list-group-item" data-parent="#menu1">Subitem 3</a>
                </div>
                <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-film"></i> <span class="hidden-sm-down">Item 2</span></a>
                <a href="#menu3" class="list-group-item collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-book"></i> <span class="hidden-sm-down">Item 3 </span></a>
                <div class="collapse" id="menu3">
                    <a href="#" class="list-group-item" data-parent="#menu3">3.1</a>
                    <a href="#menu3sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">3.2 </a>
                    <div class="collapse" id="menu3sub2">
                        <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 a</a>
                        <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 b</a>
                        <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 c</a>
                    </div>
                    <a href="#" class="list-group-item" data-parent="#menu3">3.3</a>
                </div>
                <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-heart"></i> <span class="hidden-sm-down">Item 4</span></a>
                <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-list"></i> <span class="hidden-sm-down">Item 5</span></a>
                <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-clock-o"></i> <span class="hidden-sm-down">Link</span></a>
                <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-th"></i> <span class="hidden-sm-down">Link</span></a>
                <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-gear"></i> <span class="hidden-sm-down">Link</span></a>
                <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-calendar"></i> <span class="hidden-sm-down">Link</span></a>
                <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-envelope"></i> <span class="hidden-sm-down">Link</span></a>
                <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-bar-chart-o"></i> <span class="hidden-sm-down">Link</span></a>
                <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-star"></i> <span class="hidden-sm-down">Link</span></a>
            </div>
        
   
   
   
    </div>
    
<div class="col">
     


