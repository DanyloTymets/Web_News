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
                   <i class="fa fa-tags"></i>  Перегляд адміністраторів 
               </h3>  
            </div>
            <div class="panel-body"> 
                <div class="table-responsive"> 
                    <table class="table table-striped table-bordered table-hover">
                        <thead> 
                            <tr> 
                                <th> No: </th>
                                <th> Ім'я: </th>
                                <th> Телефон: </th>
                                <th> E-Mail: </th>
                                <th> Країна: </th>
                                <th> Робота: </th> 
                                <th> Змінити: </th>
                                <th> Видалити: </th>
                            </tr> 
                        </thead>
                        <tbody>
                            <?php
                                $i=0; 
                                $get_users = "select * from admins"; 
                                $run_users = mysqli_query($con,$get_users); 
                                while($row_users=mysqli_fetch_array($run_users)){ 
                                    $user_id = $row_users['admin_id']; 
                                    $user_name = $row_users['admin_name'];
                                    $user_phone = $row_users['admin_phone']; 
                                    $user_email = $row_users['admin_email'];
                                    $user_country = $row_users['admin_country']; 
                                    $user_job = $row_users['admin_job']; 
                                    $i++; 
                            ?> 
                            <tr> 
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $user_name; ?> </td>
                                <td> <?php echo $user_phone ?> </td>
                                <td> <?php echo $user_email; ?> </td>
                                <td> <?php echo $user_country; ?></td>
                                <td> <?php echo $user_job; ?> </td> 
                                <td>
                                 <a href="index.php?user_profile=<?php echo $user_id; ?>">
                                    <i class="fa fa-pencil"></i> Змінити 
                                 </a>  
                                </td>
                                <td>  
                                 <a href="index.php?delete_user=<?php echo $user_id; ?>"> 
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