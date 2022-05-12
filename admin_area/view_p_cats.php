<?php 
    if(!isset($_SESSION['admin_email'])){ 
        echo "<script>window.open('login.php','_self')</script>";   
    }else{ 
?> 
<div class="row"> 
    <div class="col-lg-12"> 
        <!--<ol class="breadcrumb"> 
            <li> 
                <i class="fa fa-dashboard"></i> Dashboard / View Product Categories 
            </li>
        </ol>--> 
    </div> 
</div> 
<div class="row"> 
    <div class="col-lg-12"> 
        <div class="panel panel-default"> 
            <div class="panel-heading"> 
                <h3 class="panel-title"> 
                    <i class="fa fa-tags fa-fw"></i> Перегляд котегорій новин
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
                                $get_p_cats = "select * from event_categories"; 
                                $run_p_cats = mysqli_query($con,$get_p_cats); 
                                while($row_p_cats=mysqli_fetch_array($run_p_cats)){ 
                                    $e_cat_id = $row_p_cats['e_cat_id']; 
                                    $e_cat_title = $row_p_cats['e_cat_title']; 
                                    $e_cat_desc = $row_p_cats['e_cat_desc']; 
                                    $i++; 
                            ?> 
                            <tr> 
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $e_cat_title; ?> </td>
                                <td width="300"> <?php echo $e_cat_desc; ?> </td>
                                <td> 
                                    <a href="index.php?edit_p_cat= <?php echo $e_cat_id; ?> ">
                                        <i class="fa fa-pencil"></i> Змінити
                                    </a>
                                </td>
                                <td> 
                                    <a href="index.php?delete_p_cat= <?php echo $e_cat_id; ?> ">
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