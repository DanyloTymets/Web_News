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
                <?php
                    $event_id = $_GET['view_event_members'];
                    $get_event = "select * from events where event_id='$event_id'"; 
                    $run_event = mysqli_query($con, $get_event); 
                    $row_event = mysqli_fetch_array($run_event); 
                    $event_title = $row_event['event_title']; 
                    echo "
                        <h3 class='panel-title'>
                            $event_title
                        </h3>  
                    ";
                ?>
            </div>
            <div class="panel-body"> 
                <div class="table-responsive"> 
                    <table class="table table-striped table-bordered table-hover">
                        <thead> 
                            <tr> 
                                <th> №: </th>
                                <th> Ім'я: </th>
                                <th> Email: </th>
                                <th> Група: </th>
                            </tr> 
                        </thead>
                        <tbody> 
                            
                            <?php
                                $i=0; 
                                $event_id = $_GET['view_event_members'];
                                $get_events = "select * from customer_events where event_id = '$event_id'"; 
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
                                    $customer_name = $row_customer['customer_name'];
                                    $customer_group = $row_customer['customer_group'];
                                    $i++; 
                            ?>
                            
                            <tr> 
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customer_name; ?> </td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td> <?php echo $customer_group; ?> </td>
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