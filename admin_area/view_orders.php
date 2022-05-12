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
                   <i class="fa fa-tags"></i>  Переглянути записи 
               </h3>  
            </div>
            <div class="panel-body"> 
                <div class="table-responsive"> 
                    <table class="table table-striped table-bordered table-hover">
                        <thead> 
                            <tr> 
                                <th> No: </th>
                                <th> Email: </th>
                                <th> Назва: </th>
                                <th> Дата: </th>
                                <th> Видалити: </th>
                            </tr> 
                        </thead>
                        <tbody> 
                            
                            <?php
                                $i=0; 
                                $get_events = "select * from customer_events"; 
                                $run_events = mysqli_query($con,$get_events); 
                                while($row_events=mysqli_fetch_array($run_events)){ 
                                    $events_id = $row_events['event_id']; 
                                    $c_id = $row_events['customer_id'];
                                    $get_events1 = "select * from events where event_id='$events_id'"; 
                                    $run_events1 = mysqli_query($con,$get_events1); 
                                    $row_events1 = mysqli_fetch_array($run_events1); 
                                    $events_title = $row_events1['event_title']; 
                                    $get_customer = "select * from customers where customer_id='$c_id'"; 
                                    $run_customer = mysqli_query($con,$get_customer); 
                                    $row_customer = mysqli_fetch_array($run_customer); 
                                    $customer_email = $row_customer['customer_email']; 
                                    $get_e_sub = "select * from customer_events where event_id='$events_id'"; 
                                    $run_e_sub = mysqli_query($con,$get_e_sub); 
                                    $row_e_sub = mysqli_fetch_array($run_e_sub); 
                                    $event_date = $row_e_sub['sub_date'];
                                    $i++; 
                            ?>
                            
                            <tr> 
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td> <?php echo $events_title; ?> </td>
                                <td> <?php echo $event_date; ?> </td>
                                <td>   
                                     <a href="index.php?delete_order=<?php echo $events_id; ?>"> 
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