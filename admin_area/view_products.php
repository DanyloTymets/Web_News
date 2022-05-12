<?php
    if(!isset($_SESSION['admin_email'])){ 
        echo "<script>window.open('login.php','_self')</script>"; 
    }else{ 
?> 
<div class="row"> 
    <div class="col-lg-12"> 
        <!--<ol class="breadcrumb"> 
            <li class="active"> 
                <i class="fa fa-dashboard"></i> Dashboard / View Products 
            </li> 
        </ol>--> 
    </div> 
</div>
<div class="row"> 
    <div class="col-lg-12"> 
        <div class="panel panel-default"> 
            <div class="panel-heading"> 
               <h3 class="panel-title">
                   <i class="fa fa-tags"></i>  Перегляд новин 
               </h3>  
            </div>
            <div class="panel-body"> 
                <div class="table-responsive"> 
                    <table class="table table-striped table-bordered table-hover">
                        <thead> 
                            <tr> 
                                <th> ID новини: </th>
                                <th> Дата новини: </th>
                                <th> Назва новини: </th>
                                <th> Зображення: </th>
                                <th> Категорія: </th>
                                <th> Змінити: </th>
                                <th> Видалити: </th>
                            </tr> 
                        </thead>
                        <tbody>
                            <?php
                                $i=0; 
                                $get_pro = "select * from events"; 
                                $run_pro = mysqli_query($con,$get_pro); 
                                while($row_pro=mysqli_fetch_array($run_pro)){ 
                                    $event_id = $row_pro['event_id'];
                                    $event_date = $row_pro['date'];
                                    $event_title = $row_pro['event_title'];
                                    $event_img1 = $row_pro['event_img1']; 
                                    $event_keywords = $row_pro['event_keywords']; 
                                    $event_desc = $row_pro['event_desc']; 
                                    $event_e_cat_id = $row_pro['e_cat_id'];
                                    $get_e_cat_id = "select * from event_categories where e_cat_id='$event_e_cat_id'"; 
                                    $run_e_cat_id = mysqli_query($con,$get_e_cat_id);
                                    while($row_e_cat_id = mysqli_fetch_array($run_e_cat_id)){
                                        $event_category = $row_e_cat_id['e_cat_title'];
                                    }
                                    $i++; 
                            ?> 
                            <tr> 
                                <td> <?php echo $event_id; ?> </td>
                                <td> <?php echo $event_date ?> </td>
                                <td> <?php echo $event_title; ?> </td>
                                <td> <img src="product_images/<?php echo $event_img1; ?>" width="60" height="60"></td>
                                <td> <?php echo $event_category; ?> </td>
                                <td>
                                     <a href="index.php?edit_product=<?php echo $event_id; ?>">
                                        <i class="fa fa-pencil"></i> Змінити
                                     </a>
                                </td>
                                <td>
                                     <a href="index.php?delete_product=<?php echo $event_id; ?>">
                                        <i class="fa fa-trash-o"></i> Видалити
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