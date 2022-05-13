<?php
    if(!isset($_SESSION['admin_email'])){ 
        echo "<script>window.open('login.php','_self')</script>"; 
    }else{ 
?> 
<?php 

    if(isset($_GET['edit_product'])){ 
        $edit_id = $_GET['edit_product']; 
        $get_p = "select * from events where event_id='$edit_id'"; 
        $run_edit = mysqli_query($con,$get_p); 
        $row_edit = mysqli_fetch_array($run_edit); 
        $event_id = $row_edit['event_id']; 
        $e_cat = $row_edit['e_cat_id']; 
        $cat = $row_edit['cat_id'];
        $event_title = $row_edit['event_title'];
        $event_img1 = $row_edit['event_img1']; 
        $event_keywords = $row_edit['event_keywords']; 
        $event_desc = $row_edit['event_desc']; 
    }
        
        $get_p_cat = "select * from event_categories where e_cat_id='$e_cat'"; 
        $run_p_cat = mysqli_query($con,$get_p_cat); 
        $row_p_cat = mysqli_fetch_array($run_p_cat); 
        $p_cat_title = $row_p_cat['e_cat_title']; 
        $get_cat = "select * from customer_categories where cat_id='$cat'"; 
        $run_cat = mysqli_query($con,$get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        $cat_title = $row_cat['cat_group'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Додати новину </title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body> 
<div class="row">
    <div class="col-lg-12">
        <!--<ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert Products 
            </li>
        </ol>-->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
           <div class="panel-heading">
               <h3 class="panel-title">
                   <i class="fa fa-pencil fa-fw"></i> Налаштування новини
               </h3> 
           </div>
           <div class="panel-body">
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Заголовок новини </label>
                      <div class="col-md-6">
                          <input name="event_title" type="text" class="form-control" required value="<?php echo $event_title; ?>"> 
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Категорія новини </label>  
                      <div class="col-md-6">
                          <select name="product_cat" class="form-control">
                              <option value="<?php echo $e_cat; ?>"> <?php echo $p_cat_title; ?> </option>
                              <?php 
                              $get_p_cats = "select * from event_categories where e_cat_title!='$p_cat_title'";
                              $run_p_cats = mysqli_query($con,$get_p_cats); 
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){ 
                                  $p_cat_id = $row_p_cats['e_cat_id'];
                                  $p_cat_title = $row_p_cats['e_cat_title']; 
                                  echo " 
                                  <option value='$p_cat_id'> $p_cat_title </option> 
                                  "; 
                              } 
                              ?> 
                          </select>
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Категорія користувача </label>
                      <div class="col-md-6">
                          <select name="cat" class="form-control">
                              <option value="<?php echo $cat; ?>"> <?php echo $cat_title; ?> </option> 
                              <?php
                              $get_cat = "select * from customer_categories where cat_group!='$cat_title'";
                              $run_cat = mysqli_query($con,$get_cat); 
                              while ($row_cat=mysqli_fetch_array($run_cat)){ 
                                  $cat_id = $row_cat['cat_id'];
                                  $cat_title = $row_cat['cat_group']; 
                                  echo " 
                                  <option value='$cat_id'> $cat_title </option> 
                                  "; 
                              } 
                              ?> 
                          </select>
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Зображення </label>
                      <div class="col-md-6">
                          <input name="event_img1" type="file" class="form-control" required>
                          <br>
                          <img width="70" height="70" src="product_images/<?php echo $event_img1; ?>" alt="<?php echo $event_img1; ?>"> 
                      </div>
                   </div>
                   <!--<div class="form-group">
                      <label class="col-md-3 control-label"> Ключові слова </label>
                      <div class="col-md-6">
                          <input name="product_keywords" type="text" class="form-control" required value="<?php echo $event_keywords; ?>"> 
                      </div>
                   </div>-->>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Опис новини </label>
                      <div class="col-md-6">
                          <textarea name="event_desc" cols="19" rows="6" class="form-control">
                            <?php echo $event_desc; ?>
                          </textarea> 
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"></label>    
                      <div class="col-md-6">
                          <input name="submit" value="Edit Product" type="submit" class="btn btn-primary form-control"> 
                      </div>
                   </div>
               </form>
           </div>
        </div>
    </div>
</div>  
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script> 
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>

<?php 

if(isset($_POST['submit'])){
    
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $event_title = $_POST['event_title'];
    #$product_keywords = $_POST['product_keywords'];
    $event_desc = $_POST['event_desc'];
    $event_img1 = $_FILES['event_img1']['name'];
    $temp_name1 = $_FILES['event_img1']['tmp_name'];
    
    move_uploaded_file($temp_name1,"product_images/$event_img1");
  
    $update_product = "update events set e_cat_id='$product_cat',cat_id='$cat',date=NOW(),event_title='$event_title',event_img1='$event_img1',event_desc='$event_desc' where event_id='$event_id'";
    $run_product = mysqli_query($con,$update_product);
    if($run_product){
       echo "<script>alert('Product was updated')</script>";
       echo "<script>window.open('index.php?view_products','_self')</script>";  
    }
}
?>

<?php } ?>