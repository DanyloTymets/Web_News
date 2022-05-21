<?php 

    session_start();
    include("includes/db.php");
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>"; 
    }else{
        $admin_session = $_SESSION['admin_email'];
        $get_admin = "select * from admins where admin_email='$admin_session'";
        $run_admin = mysqli_query($con,$get_admin);
        $row_admin = mysqli_fetch_array($run_admin);
        $admin_id = $row_admin['admin_id'];
        $admin_name = $row_admin['admin_name'];
        $admin_phone = $row_admin['admin_phone'];
        $admin_email = $row_admin['admin_email'];
        $admin_country = $row_admin['admin_country'];
        $admin_job = $row_admin['admin_job'];
        $admin_about = $row_admin['admin_about'];
        $get_events = "select * from events";
        $run_events = mysqli_query($con,$get_events);
        $count_events = mysqli_num_rows($run_events);
        $get_customers = "select * from customers";
        $run_customers = mysqli_query($con,$get_customers);
        $count_customers = mysqli_num_rows($run_customers);
        $get_e_categories = "select * from event_categories";
        $run_e_categories = mysqli_query($con,$get_e_categories);
        $count_e_categories = mysqli_num_rows($run_e_categories);
        $get_pending_events = "select * from pending_events";
        $run_pending_events = mysqli_query($con,$get_pending_events);
        $count_pending_events = mysqli_num_rows($run_pending_events);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LNU News Admin Page</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style1.css">
</head> 
    <div id="wrapper"> 
       <?php include("includes/sidebar.php"); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php
                    if(isset($_GET['dashboard'])){ 
                        include("dashboard.php");
                }   if(isset($_GET['insert_product'])){
                        include("insert_product.php"); 
                }   if(isset($_GET['view_products'])){  
                        include("view_products.php");
                }   if(isset($_GET['delete_product'])){ 
                        include("delete_product.php");
                }   if(isset($_GET['edit_product'])){
                        include("edit_product.php");
                }
                if(isset($_GET['insert_p_cat'])){
                        include("insert_p_cat.php");
                }   if(isset($_GET['view_p_cats'])){   
                        include("view_p_cats.php");
                }   if(isset($_GET['delete_p_cat'])){
                        include("delete_p_cat.php");
                }   if(isset($_GET['edit_p_cat'])){
                        include("edit_p_cat.php");
                }
                if(isset($_GET['insert_cat'])){ 
                        include("insert_cat.php"); 
                }   if(isset($_GET['view_cats'])){    
                        include("view_cats.php"); 
                }   if(isset($_GET['edit_cat'])){  
                        include("edit_cat.php");      
                }   if(isset($_GET['delete_cat'])){  
                        include("delete_cat.php");      
                }
                if(isset($_GET['insert_slide'])){ 
                        include("insert_slide.php"); 
                }   if(isset($_GET['view_slides'])){     
                        include("view_slides.php");  
                }   if(isset($_GET['delete_slide'])){  
                        include("delete_slide.php");  
                }   if(isset($_GET['edit_slide'])){       
                        include("edit_slide.php");        
                }
                if(isset($_GET['view_customers'])){
                        include("view_customers.php");
                }   if(isset($_GET['delete_customer'])){
                        include("delete_customer.php"); 
                }   
                if(isset($_GET['view_orders'])){
                        include("view_orders.php");
                }   if(isset($_GET['delete_order'])){ 
                        include("delete_order.php");       
                }
                 if(isset($_GET['view_payments'])){ 
                        include("view_payments.php");   
                }   if(isset($_GET['delete_payment'])){
                        include("delete_payment.php"); 
                }   if(isset($_GET['view_users'])){  
                        include("view_users.php");
                }   if(isset($_GET['delete_user'])){
                        include("delete_user.php");
                }   if(isset($_GET['insert_user'])){
                        include("insert_user.php");
                }   if(isset($_GET['user_profile'])){  
                        include("user_profile.php");    
                }
                if(isset($_GET['view_event_members'])){ 
                        include("view_event_members.php");   
                }
                ?>
            </div>
        </div>
    </div>
<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>           
</body>
</html>
<?php } ?>