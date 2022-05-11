<?php
    if(!isset($_SESSION['admin_email'])){ 
        echo "<script>window.open('login.php','_self')</script>"; 
    }else{ 
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
                   <i class="fa fa-money fa-fw"></i> Додати адміністратора  
               </h3>
           </div>
           <div class="panel-body">
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Ім'я </label>
                      <div class="col-md-6">
                          <input name="admin_name" type="text" class="form-control" required> 
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Телефон </label>
                      <div class="col-md-6">
                          <input name="admin_phone" type="text" class="form-control" required> 
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> E-mail </label>
                      <div class="col-md-6">
                          <input name="admin_email" type="text" class="form-control" required> 
                      </div> 
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Країна </label>
                      <div class="col-md-6">
                          <input name="admin_country" type="text" class="form-control" required> 
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Пароль </label>
                      <div class="col-md-6">
                          <input name="admin_pass" type="password" class="form-control" required>  
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Робота </label>
                      <div class="col-md-6">
                          <input name="admin_job" type="text" class="form-control" required> 
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Інформація </label>
                      <div class="col-md-6">
                          <textarea name="admin_about" class="form-control" rows="3"></textarea> 
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"></label>
                      <div class="col-md-6">
                          <input name="submit" value="Create Account" type="submit" class="btn btn-primary form-control"> 
                      </div>
                   </div> 
               </form>
           </div>
        </div>
    </div>
</div>
<?php
if(isset($_POST['submit'])){ 
    $user_name = $_POST['admin_name'];
    $user_phone = $_POST['admin_phone'];
    $user_email = $_POST['admin_email'];
    $user_country = $_POST['admin_country'];
    $user_pass = $_POST['admin_pass']; 
    $user_job = $_POST['admin_job'];
    $user_about = $_POST['admin_about']; 
     
    $insert_user = "insert into admins (admin_name,admin_phone,admin_email,admin_country,admin_pass,admin_job,admin_about) values ('$user_name','$user_phone','$user_email','$user_country','$user_pass','$user_job','$user_about')"; 
    $run_user = mysqli_query($con,$insert_user); 
    if($run_user){ 
        echo "<script>alert('Admin account was created')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>"; 
    } 
} 
?> 
<?php } ?>