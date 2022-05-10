<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?> 
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Панель Управління </h1> 
        <!--<ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-th-list"></i> Dashboard 
            </li>
        </ol>-->
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-color">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i> 
                    </div>
                    <div class="col-xs-9 text-right">
                        <!--<div class="huge"> <?php echo $count_products; ?> </div> -->
                        <div> Новини </div> 
                    </div>
                </div>
            </div>
            <a href="index.php?view_products">
                <div class="panel-footer">
                    <span class="pull-left">
                        Переглянути деталі 
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    <div class="clearfix"></div> 
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-color">
            <div class="panel-heading"> 
                <div class="row"> 
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i> 
                    </div>
                    <div class="col-xs-9 text-right"> 
                        <!--<div class="huge"> <?php echo $count_customers; ?>  </div> -->
                        <div> Користувачі </div> 
                    </div>
                </div> 
            </div>
            <a href="index.php?view_customers"> 
                <div class="panel-footer">
                    <span class="pull-left"> 
                    Переглянути деталі 
                    </span>
                    <span class="pull-right">  
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    <div class="clearfix"></div> 
                </div> 
            </a> 
        </div> 
    </div>
    <div class="col-lg-3 col-md-6"> 
        <div class="panel panel-color">
            <div class="panel-heading"> 
                <div class="row"> 
                    <div class="col-xs-3">
                        <i class="fa fa-tags fa-5x"></i> 
                    </div>
                    <div class="col-xs-9 text-right"> 
                        <!--<div class="huge"> <?php echo $count_p_categories; ?> </div>--> 
                        <div> Категорії новин </div> 
                    </div>
                </div> 
            </div>
            <a href="index.php?view_p_cats"> 
                <div class="panel-footer">
                    <span class="pull-left"> 
                    Переглянути деталі 
                    </span>
                    <span class="pull-right">  
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    <div class="clearfix"></div> 
                </div> 
            </a>
        </div> 
    </div>
    <div class="col-lg-3 col-md-6"> 
        <div class="panel panel-color">
            <div class="panel-heading"> 
                <div class="row"> 
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i> 
                    </div>
                    <div class="col-xs-9 text-right"> 
                        <!--<div class="huge"> <?php echo $count_pending_orders; ?> </div>--> 
                        <div> Записи </div> 
                    </div>
                </div> 
            </div>
            <a href="index.php?view_orders"> 
                <div class="panel-footer">
                    <span class="pull-left"> 
                    Переглянути деталі
                    </span>
                    <span class="pull-right">  
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    <div class="clearfix"></div> 
                </div> 
            </a>
        </div> 
    </div>
</div>
</br>
</br>
<div class="row"> 
    <div class="col-lg-8"> 
        <div class="panel panel-color"> 
            <div class="panel-heading"> 
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Нові Записи 
                </h3> 
            </div>
            <div class="panel-body"> 
                <div class="table-responsive"> 
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <<th> No: </th>
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
                <div class="text-right"> 
                    <a href="index.php?view_orders"> 
                        Переглянути усі записи <i class="fa fa-arrow-circle-right"></i>  
                    </a>
                </div>
            </div>
        </div> 
    </div>
    <div class="col-md-4"> 
        <div class="panel"> 
            <div class="panel-body"> 
                <div class="mb-md thumb-info">
                    <!--<div class="thumb-info-title">
                        <span class="thumb-info-inner"> <?php echo $admin_name; ?> </span>
                        <span class="thumb-info-type"> <?php echo $admin_job; ?> </span> 
                    </div>-->
                </div>
                <div class="mb-md"> 
                    <div class="widget-content-expanded"> 
                        <i class="fa fa-user"></i> <span> Email: </span> <?php echo $admin_email; ?> <br/>
                        <i class="fa fa-flag"></i> <span> Country: </span> <?php echo $admin_country; ?> <br/>
                        <i class="fa fa-envelope"></i> <span> Contact: </span> <?php echo $admin_phone; ?> <br/>
                    </div>
                    <hr class="dotted short"> 
                    <h5 class="text-muted"> About Me</h5> 
                    <p>
                        <?php echo $admin_about; ?> 
                    </p> 
                </div>
            </div> 
        </div> 
    </div>
</div> 
<?php } ?><?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?> 
 
<?php } ?>