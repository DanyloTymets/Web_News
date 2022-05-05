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
                       <li >
                           <a href="index.php">Головна</a>
                       </li>
                       <li class="active">
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
   
    <?php
    if(isset($_GET['event_id'])){
        $event_id= $_GET['event_id'];
        $get_event = "select * from events where event_id='$event_id'";
        $run_event = mysqli_query($con,$get_event);
        $row_event = mysqli_fetch_array($run_event);
        $event_category = $row_event['event_keywords'];
        $event_title = $row_event['event_title'];
        $event_date = date('Y-m-d', strtotime($row_event['date']));
        $event_desc = $row_event['event_desc'];
        $event_img1 = $row_event['event_img1'];
        $event_e_cat_id = $row_event['e_cat_id'];
        $get_e_cat_id = "select * from event_categories where e_cat_id='$event_e_cat_id'"; 
        $run_e_cat_id = mysqli_query($con,$get_e_cat_id);
        while($row_e_cat_id = mysqli_fetch_array($run_e_cat_id)){
            $event_category = $row_e_cat_id['e_cat_title'];
        }
    }

    ?>
   <div id="wrapper">
        <section class="section single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area text-center">
                                <!--<ol class="breadcrumb hidden-xs-down">
                                    <li class="breadcrumb-item"><a href="index.php">Головна</a></li>
                                    <li class="breadcrumb-item"><a href="shop.php">Новини</a></li>
                                    <li class="breadcrumb-item active"></li>
                                </ol>-->
                                <h1 class="text-center"><?php echo $event_title; ?></h1>
                                <h4><?php echo $event_category; ?></h4>
                                <!--<?php sendToCart(); ?>
                                <form action="details.php?add_cart=<?php echo $event_id; ?>" class="form-horizontal" method="post">
                                    <p class="text-center buttons"><button class="btn btn-primary"> Записатися</button></p>
                                </form>-->
                                <div class="blog-meta big-meta">
                                    <small><a href="#" title=""><?php echo $event_date; ?></a></small>
                                </div>
                                </br>
                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="single-post-media">
                            <img class="img-responsive" src="admin_area/product_images/<?php echo $event_img1; ?>" alt="Event">
                                <!--<img src="images/test.jpg" alt="" class='img-responsive center-block'>-->
                            </div>
                            </br>
                            </br>
                            <div class="blog-content">  
                                <div class="pp">
                                    <!--<p><?php echo $event_desc; ?></p>-->
                                    <h4><?php echo $event_desc; ?></h4>
                                </div>
                            </div>
                            </br>
                            </br>
                            <?php sendToCart(); ?>
                            <!--<form action="details.php?add_cart=<?php echo $event_id; ?>" class="form-horizontal" method="post">
                                <p class="text-center buttons"><button class="btn btn-primary"> Записатися</button></p>
                            </form>-->
                            <?php 
                                if($event_category == 'Події'){
                                    echo "
                                        <form action='details.php?add_cart=$event_id' class='form-horizontal' method='post'>
                                            <p class='text-center buttons'><button class='btn btn-primary'> Записатися</button></p>
                                        </form>
                                    ";
                                }
                            ?>
                            <div class="custombox clearfix">
                                <h3 >Можливо Вас теж зацікавить:</h3>
                                <?php
                                    $get_event = "select * from events order by rand() DESC LIMIT 0,3";
                                    $run_event = mysqli_query($con,$get_event);
                                while($row_event=mysqli_fetch_array($run_event)){
                                    $event_id = $row_event['event_id'];
                                    $event_title = $row_event['event_title'];
                                    $event_img1 = $row_event['event_img1'];
                                    echo "
                                        <div class='col-md-4 col-sm-4 center-responsive'>
                                            <div class='product same-height'>
                                                <a href='details.php?event_id=$event_id'>
                                                    <img class='img-responsive' src='admin_area/product_images/$event_img1'>
                                                </a>
                                                <div class='text' align='center'>
                                                    <h4> <a href='details.php?event_id=$event_id'> $event_title </a> </h3>
                                                </div>
                                            </div>
                                        </div>
                                    ";
                                }
                                ?>
                            </div>
                            </br>
                            </br>

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">3 Коментарі</h4>
                                </br>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comments-list">
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="upload/author.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name">Amanda Martines <small>5 days ago</small></h4>
                                                    <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus, Marfa eiusmod Pinterest in do umami readymade swag. Selfies iPhone Kickstarter, drinking vinegar jean.</p>
                                                    <a href="#" class="btn btn-primary btn-sm">Відпоісти</a>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="upload/author_01.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">

                                                    <h4 class="media-heading user_name">Baltej Singh <small>5 days ago</small></h4>

                                                    <p>Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                                    <a href="#" class="btn btn-primary btn-sm">Відпоісти</a>
                                                </div>
                                            </div>
                                            <div class="media last-child">
                                                <a class="media-left" href="#">
                                                    <img src="upload/author_02.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">

                                                    <h4 class="media-heading user_name">Marie Johnson <small>5 days ago</small></h4>
                                                    <p>Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                                    <a href="#" class="btn btn-primary btn-sm">Відпоісти</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">Залиште свій відгук:</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-wrapper">
                                            <input type="text" class="form-control" placeholder="Ім'я">
                                            </br>
                                            <input type="text" class="form-control" placeholder="Email">
                                            </br>
                                            <input type="text" class="form-control" placeholder="Website">
                                            </br>
                                            <textarea class="form-control" placeholder="Коментар:"></textarea>
                                            </br>
                                            <button type="submit" class="btn btn-primary">Надіслати</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
    </div>
   
   <?php 
    
    include("footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>