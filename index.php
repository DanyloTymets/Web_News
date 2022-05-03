<?php 
session_start();
include("db.php");
include_once("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LNU News</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
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
                   
                   <li>
                       <a href="cart.php">Події</a>
                   </li>
                    <li>
                        <?php
                         if(!isset($_SESSION['customer_email'])){
                             echo"<a href='checkout.php'>Аккаунт</a>";
                         }else{
                            echo"<a href='customer/account.php?edit_acc'>Аккаунт</a>";
                         }
                         ?>
                  </li> 
                   <li>
                     <a href="checkout.php">
                     <?php
                     if(!isset($_SESSION['customer_email'])){
                          echo "<a href='checkout.php'> Увійти </a>";
                         }else{
                          echo " <a href='logout.php'> Вийти </a> ";
                         }
                     ?>
                     </a>
                   </li>
                   <li>
                       <a href="register.php">Реєстрація</a>
                   </li> 
               </ul>
           </div>
       </div>
   </div>
   <div id="navbar" class="navbar navbar-default">
       <div class="container">
           <div class="navbar-header">
               <a href="index.php" class="navbar-brand home">
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
                       <li class="active">
                           <a href="index.php">Головна</a>
                       </li>
                       <li>
                           <a href="shop.php">Новини</a>
                       </li>
                       <li>
                        <?php
                           if(!isset($_SESSION['customer_email'])){
                               echo"<a href='checkout.php'>Записатися</a>";
                           }else{
                              echo"<a href='cart.php'>Записатися</a>";
                           }
                        ?>
                       </li>
                       <li>
                           <a href="contact.php">Контакти</a>
                       </li>
                        <li>
                          <?php
                           if(!isset($_SESSION['customer_email'])){
                               echo"<a href='checkout.php'>Аккаунт</a>";
                           }else{
                              echo"<a href='customer/account.php?edit_acc'>Аккаунт</a>";
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
   <div class="container" id="slider">
       <div class="col-md-12">
           <div class="carousel slide" id="myCarousel" data-ride="carousel">
               <ol class="carousel-indicators">
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   
               </ol>
               <div class="carousel-inner">
                   <?php
                   $get_slides = "select * from slider LIMIT 0,1";
                   $run_slides = mysqli_query($con,$get_slides);
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       echo "
                       <div class='item active'>
                       <img src='admin_area/slides_images/$slide_image'>
                       </div>
                       ";
                   }
                   $get_slides = "select * from slider LIMIT 1,3";
                   $run_slides = mysqli_query($con,$get_slides);
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       echo "
                       <div class='item'>
                       <img src='admin_area/slides_images/$slide_image'>
                       </div>
                       ";
                   }
                   ?>
               </div>
               <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span> 
               </a>
               <a href="#myCarousel" class="right carousel-control" data-slide="next">
                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span> 
               </a>   
           </div>
       </div>
       
   </div>
   <div id="hot">
       <div class="box">
           <div class="container">
               <div class="col-md-12">
                   <h2>
                   Головні новини та події:
                   </h2>
               </div>
           </div>
       </div>
   </div>

   <div id="advantages">
        <!--<div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>
                        Головні новини та події:
                    </h2>
                </div>
            </div>
        </div>-->
       <div class="container">
           <div class="same-height-row">
               <div class="col-sm-4">
                   <div class="box same-height">
                       <div class="icon">
                           <i class="fa fa-universal-access"></i> 
                       </div>
                       <h3><a href="#">Спортивні</a></h3>
                       <p>Наш університет регулярно проводить змагання з різних спортивних дисциплін, у Вас буде можливість показати свої вміння та спритність, а також позмагатися за призи. </p>
                   </div>
               </div>
               
               <div class="col-sm-4">
                   <div class="box same-height">
                       <div class="icon">
                           <i class="fa fa-users"></i>
                       </div>
                       <h3><a href="#">Студентські вечори</a></h3>
                       <p>У такі вечори Ви маєте можливість краще познайомитися із іншими студентами граючи в настільні ігри, проходячи квести або показуючи свої таланти.</p>
                   </div>
               </div>
               
               <div class="col-sm-4">
                   <div class="box same-height">
                       <div class="icon">
                           <i class="fa fa-graduation-cap"></i>
                       </div>
                       <h3><a href="#">Наукові заходи</a></h3>
                       <p>Ви можете побувати на лекції або семінарі на якій будуть виступати не лише представники університету а й громадські активісти та випускнин нашого університету.</p>
                   </div>
               </div>
           </div>
       </div>
   </div>
   
   <div id="hot">
       <div class="box">
           <div class="container">
               <div class="col-md-12">
                   <h2>
                       Останні новини:
                   </h2>
               </div>
           </div>
       </div>
   </div>
   
   <div id="content" class="container"> 
       <div class="row">
           <?php
           getProduct();
           ?>     
       </div>       
   </div>
  
  <?php 
    
    include("footer.php");
    
  ?>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>  
</body>
</html>