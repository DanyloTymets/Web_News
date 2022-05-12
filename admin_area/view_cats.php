<?php 
    if(!isset($_SESSION['admin_email'])){  
        echo "<script>window.open('login.php','_self')</script>";    
    }else{ 
?> 
<div class="row"> 
    <div class="col-lg-12"> 
        <!--<ol class="breadcrumb"> 
            <li> 
                <i class="fa fa-dashboard"></i> Dashboard / View Categories 
            </li>
        </ol>--> 
    </div> 
</div>  
<div class="row"> 
    <div class="col-lg-12"> 
        <div class="panel panel-default"> 
            <div class="panel-heading"> 
                <h3 class="panel-title"> 
                    <i class="fa fa-tags fa-fw"></i> Перегляд категорій
                </h3> 
            </div> 
            <div class="panel-body"> 
                <div class="table-responsive"> 
                    <table class="table table-hover table-striped table-bordered"> 
                        <thead> 
                            <tr> 
                                <th> ID категорії </th>
                                <th> Назва категорії </th>
                                <th> Опис категорії </th>
                                <th> Змінити </th>
                                <th> Видалити </th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            <?php 
                                $i=0; 
                                $get_cats = "select * from customer_categories"; 
                                $run_cats = mysqli_query($con,$get_cats); 
                                while($row_cats=mysqli_fetch_array($run_cats)){ 
                                    $cat_id = $row_cats['cat_id']; 
                                    $cat_title = $row_cats['cat_group']; 
                                    $cat_desc = $row_cats['cat_desc']; 
                                    $i++; 
                            ?> 
                            <tr> 
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $cat_title; ?> </td>
                                <td width="300"> <?php echo $cat_desc; ?> </td>
                                <td> 
                                    <a href="index.php?edit_cat= <?php echo $cat_id; ?> ">
                                        <i class="fa fa-pencil"></i> Змінити
                                    </a>
                                </td>
                                <td> 
                                    <a href="index.php?delete_cat= <?php echo $cat_id; ?> ">
                                        <i class="fa fa-trash"></i> Видалити
                                    </a>
                                </td>
                            </tr> 
                            <?php } ?> 
                        </tbody> 
                    </table> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
<?php } ?>