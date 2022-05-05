<?php
include("db.php");
include_once("functions/functions.php");
?>
<?php
if(isset($_GET['c_id'])){ 
    $customer_id = $_GET['c_id'];  
} 
$ip_add = getIpFunc();
$status = "pending"; 
$invoice_no = mt_rand(); 
$select_cart = "select * from cart where ip_add='$ip_add'"; 
$run_cart = mysqli_query($con,$select_cart); 
while($row_cart = mysqli_fetch_array($run_cart)){ 
    $pro_id = $row_cart['p_id']; 
    $get_products = "select * from events where event_id='$pro_id'"; 
    $run_products = mysqli_query($con,$get_products); 
    while($row_products = mysqli_fetch_array($run_products)){ 
        $insert_customer_order = "insert into customer_events (event_id,customer_id,sub_date) values ('$pro_id','$customer_id',NOW())";
        $run_customer_order = mysqli_query($con,$insert_customer_order); 
        $insert_pending_order = "insert into pending_events (customer_id,event_id) values ('$customer_id','$pro_id')";
        $run_pending_order = mysqli_query($con,$insert_pending_order); 
        $delete_cart = "delete from cart where ip_add='$ip_add'"; 
        $run_delete = mysqli_query($con,$delete_cart); 
        echo "<script>alert('Orders has been submitted')</script>";
        echo "<script>window.open('customer/account.php?orders','_self')</script>";
    } 
} 
?>