<center>
    <h1>Події </h1> 
</center>
<hr> 
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th> №: </th>
                <th> Назва:</th>
                <th> Дата: </th>       
            </tr>
        </thead>
        <tbody>
            <?php
            $customer_session = $_SESSION['customer_email'];
            $get_customer = "select * from customers where customer_email='$customer_session'";
            $run_customer = mysqli_query($con,$get_customer);
            $row_customer = mysqli_fetch_array($run_customer);
            $customer_id = $row_customer['customer_id'];
            $get_orders = "select * from customer_events where customer_id='$customer_id'";
            $run_orders = mysqli_query($con,$get_orders);
            $i = 0;
            while($row_orders = mysqli_fetch_array($run_orders)){
                $event_id = $row_orders['event_id'];
                $get_event = "select * from events where event_id='$event_id'";
                $run_event = mysqli_query($con,$get_event);
                $row_event = mysqli_fetch_array($run_event);
                $event_title = $row_event['event_title'];
                $event_date = date('Y-m-d', strtotime($row_event['date']));
                $i++;

            ?>
            <tr><!--  tr Begin  -->
                
                <th> <?php echo $i; ?> </th>
                <td> <?php echo $event_title; ?> </td>
                <td> <?php echo $event_date; ?> </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>