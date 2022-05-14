<?php
session_start();
if(!isset($_SESSION['customer_email'])){
    echo "<script>window.open('../checkout.php','_self')</script>";
}else{
include("includes/db.php");
include("functions/functions.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LNU News</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style1.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 
    <link href="styles/version/tech.css" rel="stylesheet">
</head>
<body> 
    <div id="top">
       <div class="container">
           <div class="col-md-6 offer">
            <a href="#" class="btn btn-success btn-primary">
                   <?php
                   if(!isset($_SESSION['customer_email'])){
                       echo "Вітаємо: Гість";
                   }else{
                       echo "Вітаємо: " . $_SESSION['customer_email'] . "";
                   }
                   ?>
               </a>
           </div>
           <div class="col-md-6">
               
               <ul class="menu">
                    <?php 
                        if(isset($_SESSION['customer_email'])){
                            echo"<li><a href='cart.php'>Події</a></li>";
                        }
                    ?>
                    <li>
                       <a href="account.php">Аккаунт</a>
                   </li> 
                   <li>
                     <a href="../checkout.php">
                     <?php
                     if(!isset($_SESSION['customer_email'])){
                          echo "<a href='../checkout.php'> Увійти </a>";
                         }else{
                          echo " <a href='logout.php'> Вийти </a> ";
                         }
                     ?>
                     </a>
                   </li>
                   <li>
                       <a href="../register.php">Реєстрація</a>
                   </li> 
               </ul>
           </div>
       </div>
   </div>
   <div id="navbar" class="navbar navbar-default">
       <div class="container">
           <div class="navbar-header">
               <a href="../index.php" class="navbar-brand home">
                   <img src="images/news-logo.png" alt="News Logo" class="hidden-xs">
                   <img src="images/news-logo-mobile.png" alt="News Logo Mobile" class="visible-xs"> 
               </a>
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i> 
               </button> 
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search"> 
                   <span class="sr-only">Toggle Search</span> 
                   <i class="fa fa-search"></i> 
               </button> 
           </div>
           
           <div class="navbar-collapse collapse" id="navigation">
               <div class="padding-nav">
                   <ul class="nav navbar-nav left">
                       <li >
                           <a href="../index.php">Головна</a>
                       </li>
                       <li >
                           <a href="../shop.php">Новини</a>
                       </li>
                       <li>
                           <a href="../cart.php">Записатися</a>
                       </li>
                       <li>
                           <a href="../contact.php">Контакти</a>
                       </li>
                        <li class="active">
                          <?php
                           if(!isset($_SESSION['customer_email'])){
                               echo"<a href='../checkout.php'>Аккаунт</a>";
                           }else{
                              echo"<a href='account.php?orders'>Аккаунт</a>";
                           }
                           ?>
                       </li> 
                   </ul>
               </div>
               <div class="navbar-collapse collapse right">
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                       <span class="sr-only">Toggle Search</span> 
                       <i class="fa fa-search"></i> 
                   </button>
               </div>
               
               <div class="collapse clearfix" id="search">
                   <form method="get" action="results.php" class="navbar-form">
                       <div class="input-group">
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required> 
                           <span class="input-group-btn"> 
                           <button type="submit" name="search" value="Search" class="btn btn-primary">
                               <i class="fa fa-search"></i> 
                           </button>
                           </span> 
                       </div>
                   </form>   
               </div>
           </div>
       </div> 
   </div>
   <div id="content">
       <div class="container">
           <!--<div class="col-md-12">
               <ul class="breadcrumb">
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Shop
                   </li>
               </ul>
           </div> -->
           <div class="col-md-3">
           <?php 
            
            include("sidebar1.php");
            ?>
               
           </div>
           <div class="col-md-9">
               <div class="box"> 
                 <?php
                 if (isset($_GET['edit_acc'])){
                     include("edit_acc.php");
                 }
                 ?>
                 <?php
                 if (isset($_GET['change_pass'])){
                     include("change_pass.php");
                 }
                 ?>
                 <?php
                 if (isset($_GET['orders'])){
                     include("orders.php");
                 }
                 ?>
                 <?php
                 if (isset($_GET['delete_account'])){
                     include("delete_account.php");
                 }
                 ?>
               </div>
           </div>
       </div>
   </div>
   
   <?php 
    
    include("footer1.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>
