<h1 align="center">Зміна паролю</h1>
<form action="" method="post" enctype="multipart/form-data"> 
    <div class="form-group">
       <label>Старий пароль</label> 
       <input type="password" class="form-control" name="old_pass" required> 
    </div>
    <div class="form-group">
       <label>Новий пароль</label> 
       <input type="password" class="form-control" name="new_pass" required> 
    </div>
    <div class="form-group">
       <label>Підтвердіть пароль</label> 
       <input type="password" class="form-control" name="c_new_pass" required> 
    </div>
    <div class="text-center"> 
       <button type="submit" name="submit" class="btn btn-primary"> 
       <i class="fa fa-user-md"></i> Зберегти 
       </button> 
   </div> 
</form>

<?php
if(isset($_POST['submit'])){
    $c_email = $_SESSION['customer_email'];
    $c_old_pass = $_POST['old_pass'];
    $c_new_pass = $_POST['new_pass'];
    $c_new_pass_again = $_POST['c_new_pass'];
    $sel_c_old_pass = "select * from customers where customer_pass='$c_old_pass'";
    $run_c_old_pass = mysqli_query($con,$sel_c_old_pass);
    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);
    if($check_c_old_pass==0){
        echo "<script>alert('Wrong password, try again')</script>";
        exit(); 
    }
    if($c_new_pass!=$c_new_pass_again){
        echo "<script>alert('Mistake in confirming password')</script>";
        exit();  
    }
    $update_c_pass = "update customers set customer_pass='$c_new_pass' where customer_email='$c_email'";
    $run_c_pass = mysqli_query($con,$update_c_pass);
    if($run_c_pass){
        echo "<script>alert('Password has been changed')</script>";
        echo "<script>window.open('account.php?orders','_self')</script>";
    } 
}
?>