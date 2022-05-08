<?php 

$customer_session = $_SESSION['customer_email'];
$get_customer = "select * from customers where customer_email='$customer_session'";
$run_customer = mysqli_query($con,$get_customer);
$row_customer = mysqli_fetch_array($run_customer);
$customer_id = $row_customer['customer_id'];
$customer_name = $row_customer['customer_name'];
$customer_phone = $row_customer['customer_phone'];
$customer_email = $row_customer['customer_email'];
$customer_address = $row_customer['customer_address'];
$customer_city = $row_customer['customer_city'];
$customer_group = $row_customer['customer_group'];
?>

<h1 align="center">Налаштування аккаунту</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
       <label>Ім'я</label> 
       <input type="text" class="form-control" name="c_name" value="<?php echo $customer_name; ?>" required> 
    </div>
    <div class="form-group">
       <label>Телефон</label> 
       <input type="text" class="form-control" name="c_phone" value="<?php echo $customer_phone; ?>" required> 
    </div>
    <div class="form-group">
       <label>Email</label> 
       <input type="text" class="form-control" name="c_email" value="<?php echo $customer_email; ?>" required> 
    </div>
    <div class="form-group">
       <label>Адреса</label> 
       <input type="text" class="form-control" name="c_address" value="<?php echo $customer_address; ?>" required> 
    </div>
    <div class="form-group">
       <label>Місто</label> 
       <input type="text" class="form-control" name="c_city" value="<?php echo $customer_city; ?>" required> 
    </div>
    <div class="form-group">
       <label>Група</label> 
       <input type="text" class="form-control" name="c_group" value="<?php echo $customer_group; ?>" required> 
    </div>
    <!--<div class="form-group">
       <label>Password</label> 
       <input type="password" class="form-control" name="c_password" required> 
    </div>-->
    <div class="text-center"> 
       <button type="submit" name="update" class="btn btn-primary"> 
       <i class="fa fa-user-md"></i> Зберегти
       </button> 
   </div> 
</form>

<?php 

if(isset($_POST['update'])){
    $update_id = $customer_id;
    $c_name = $_POST['c_name'];
    $c_phone = $_POST['c_phone'];
    $c_email = $_POST['c_email'];
    $c_address = $_POST['c_address'];
    $c_city = $_POST['c_city'];
    $c_group = $_POST['c_group'];
    
    $update_customer = "update customers set customer_name='$c_name',customer_phone='$c_phone',customer_email='$c_email',customer_address='$c_address',customer_city='$c_city',customer_group='$c_group' where customer_id='$update_id' ";
    $run_customer = mysqli_query($con,$update_customer);
    if($run_customer){
        echo "<script>alert('Аккаунт оновлений,  перезайдіть!')</script>";
        echo "<script>window.open('logout.php','_self')</script>";
    }
}

?>