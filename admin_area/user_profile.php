<?php
    if(!isset($_SESSION['admin_email'])){ 
        echo "<script>window.open('login.php','_self')</script>"; 
    }else{ 
?>   
<?php
    if(isset($_GET['user_profile'])){
        
        $edit_user = $_GET['user_profile']; 
        $get_user = "select * from admins where admin_id='$edit_user'"; 
        $run_user = mysqli_query($con,$get_user); 
        $row_user = mysqli_fetch_array($run_user); 
        $user_id = $row_user['admin_id']; 
        $user_name = $row_user['admin_name'];
        $user_phone = $row_user['admin_phone']; 
        $user_email = $row_user['admin_email'];
        $user_country = $row_user['admin_country']; 
        $user_pass = $row_user['admin_pass'];
        $user_job = $row_user['admin_job'];
        $user_about = $row_user['admin_about'];  
    } 
?>   
<div class="row"> 
    <div class="col-lg-12">  
    </div>  
</div>  
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
           <div class="panel-heading">
               <h3 class="panel-title">
                   <i class="fa fa-money fa-fw"></i> Налаштування профілю 
               </h3>
           </div>
           <div class="panel-body">
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Ім'я </label>
                      <div class="col-md-6">
                          <input value="<?php echo $user_name; ?>" name="admin_name" type="text" class="form-control" required> 
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Телефон </label>
                      <div class="col-md-6">
                          <input value="<?php echo $user_phone; ?>"  name="admin_phone" type="text" class="form-control" required> 
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> E-mail </label>
                      <div class="col-md-6">
                          <input value="<?php echo $user_email; ?>"  name="admin_email" type="text" class="form-control" required> 
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Країна </label>
                      <div class="col-md-6">
                          <input value="<?php echo $user_country; ?>"  name="admin_country" type="text" class="form-control" required> 
                      </div>
                   </div> 
                   <div class="form-group"> 
                      <label class="col-md-3 control-label"> Пароль </label> 
                      <div class="col-md-6"> 
                          <input value="<?php echo $user_pass; ?>"  name="admin_pass" type="text" class="form-control" required> 
                      </div> 
                   </div> 
                   
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Робота </label>
                      <div class="col-md-6">
                          <input value="<?php echo $user_job; ?>"  name="admin_job" type="text" class="form-control" required> 
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Інформація </label>
                      <div class="col-md-6">
                          <textarea  name="admin_about" class="form-control" rows="3"> <?php echo $admin_about; ?></textarea> 
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"></label>
                      <div class="col-md-6">
                          <input name="update" value="Update User" type="submit" class="btn btn-primary form-control"> 
                      </div>
                   </div>
               </form>
           </div>
        </div>
    </div>
</div>
<?php 

if(isset($_POST['update'])){
    
    $user_name = $_POST['admin_name'];
    $user_phone = $_POST['admin_phone'];
    $user_email = $_POST['admin_email'];
    $user_country = $_POST['admin_country'];
    $user_pass = $_POST['admin_pass']; 
    $user_job = $_POST['admin_job'];
    $user_about = $_POST['admin_about']; 
    
    $update_user = "update admins set admin_name='$user_name',admin_phone='$user_phone',admin_email='$user_email',admin_country='$user_country',admin_pass='$user_pass',admin_job='$user_job',admin_about='$user_about' where admin_id='$user_id'";
    $run_user = mysqli_query($con,$update_user); 
    if($run_user){ 
        echo "<script>alert('User was updated')</script>";
        echo "<script>window.open('login.php','_self')</script>"; 
        session_destroy();  
    } 
} 
?> 
<?php } ?>