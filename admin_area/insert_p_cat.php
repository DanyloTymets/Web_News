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
                    <i class="fa fa-money fa-fw"></i> Додати категорію новин 
                </h3> 
            </div>
            <div class="panel-body"> 
                <form action="" class="form-horizontal" method="post"> 
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">
                            Назва категорії
                        </label>
                        <div class="col-md-6">
                            <input name="e_cat_title" type="text" class="form-control"> 
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">
                            Опис категорії
                        </label>
                        <div class="col-md-6">
                            <textarea type='text' name="e_cat_desc" id="" cols="30" rows="10" class="form-control"></textarea> 
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">
                        </label>
                        <div class="col-md-6">
                            <input value="Add Category" name="submit" type="submit" class="form-control btn btn-primary"> 
                        </div>
                    </div> 
                </form> 
            </div> 
            
        </div> 
    </div> 
</div> 

<?php 
      if(isset($_POST['submit'])){
          $e_cat_title = $_POST['e_cat_title'];
          $e_cat_desc = $_POST['e_cat_desc'];
          $insert_p_cat = "insert into event_categories (e_cat_title,e_cat_desc) values ('$e_cat_title','$e_cat_desc')";
          $run_p_cat = mysqli_query($con,$insert_p_cat);
          if($run_p_cat){
              echo "<script>alert(' New event category was added')</script>";
              echo "<script>window.open('index.php?view_p_cats','_self')</script>";
          }
      }
?> 
<?php } ?> 