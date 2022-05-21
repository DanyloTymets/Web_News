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
                   
                    <?php 
                        if(isset($_SESSION['customer_email'])){
                            echo"<li><a href='cart.php'>Події</a></li>";
                        }
                    ?>
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
                       <li>
                           <a href="shop.php">Новини</a>
                       </li>
                       <li class="active">
                           <a href="cart.php">Записатися</a>
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
                   <form method="post" class="navbar-form">
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
               <?php
                    if(isset($_POST['search'])){
                        $user_search = $_POST['user_query'];
                        echo "<script>window.open('shop.php?search=$user_search','_self')</script>";
                    }
                ?>
           </div>
       </div> 
   </div>
   <div id="content">
       <div class="container">
           <div class="col-md-12">
               <!-- <ul class="breadcrumb">
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Cart
                   </li>
               </ul> -->
           </div>
           
           <div id="cart" class="col-md-9">
               <div class="box">
                   <form action="cart.php" method="post" enctype="multipart/form-data">
                       <h1>Shopping Cart</h1>
                       <?php 
                       $ip_add = getIpFunc();
                       $select_cart = "select * from cart where ip_add='$ip_add'";
                       $run_cart = mysqli_query($con,$select_cart);
                       $count = mysqli_num_rows($run_cart);
                       ?>
                       <p class="text-muted">You have <?php echo $count; ?> item(s) in your cart</p> 
                       <div class="table-responsive">
                           <table class="table">
                               <thead>
                                   <tr>
                                       <th colspan="2">Event</th>
                                       <th>Date</th>
                                       <th colspan="1">Delete</th>
                                   </tr>
                               </thead>
                               <tbody>
                                 <?php 
                                 $total = 0;
                                 while($row_cart = mysqli_fetch_array($run_cart)){
                                     $pro_id = $row_cart['p_id'];
                                     $get_products = "select * from events where event_id='$pro_id'";
                                     $run_products = mysqli_query($con,$get_products);
                                     while($row_products = mysqli_fetch_array($run_products)){
                                         $product_title = $row_products['event_title'];
                                         $product_img1 = $row_products['event_img1'];
                                         $event_date = $row_products['date'];
                                   ?>
                                   <tr>
                                       <td>
                                           <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product 1">
                                       </td>
                                       <td>
                                           <a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $product_title; ?> </a>
                                       </td>
                                       <td>
                                           <?php echo $event_date; ?>
                                       </td>
                                       <td>
                                           <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                                       </td>
                                       
                                   </tr>
                                   <?php } } ?> 
                               </tbody> 
                           </table>
                       </div>
                       <div class="box-footer">
                           <div class="pull-left">
                               <a href="index.php" class="btn btn-default">
                                   <i class="fa fa-chevron-left"></i> Return to the home 
                               </a>
                           </div>
                           <div class="pull-right">
                               <button type="submit" name="update" value="Update Cart" class="btn btn-default">
                                   <i class="fa fa-refresh"></i> Update
                               </button>
                               <a href="checkout.php" class="btn btn-primary"> 
                                   Continue Checkout <i class="fa fa-chevron-right"></i> 
                               </a> 
                           </div> 
                       </div> 
                   </form> 
               </div>
               <?php
                function UpdateC(){
                    global $con;
                    if(isset($_POST['update'])){
                        foreach($_POST['remove'] as $remove_id){
                            $delete_product = "delete from cart where p_id='$remove_id'";
                            $run_delete = mysqli_query($con,$delete_product);
                            if($run_delete){
                                echo "<script>window.open('cart.php','_self')</script>"; 
                            }  
                        } 
                    }
                }
               echo @$up_cart = UpdateC();
               ?> 
               <div id="row same-heigh-row">
                   
               </div>
           </div>
           
       </div><
   </div>
   
   <?php 
    
    include("footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>