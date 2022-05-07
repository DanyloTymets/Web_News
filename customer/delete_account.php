<center>
  <h1 align="center"> Ви впевнені, що хочете видалити аккаунт?</h1>
  <form action="" method="post" > 
    <input type="submit" class="btn btn-primary" name="Ні" value="Ні">
    <input type="submit" class="btn btn-danger" name="Так" value="Так">   
  </form>
</center>


<?php
$c_email = $_SESSION['customer_email'];
if(isset($_POST['Так'])){
    $delete_customer = "delete from customers where customer_email='$c_email'";
    $run_delete_customer = mysqli_query($con,$delete_customer);
    if($run_delete_customer){
        session_destroy();
        echo "<script>alert('Account was deleted')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    } 
}
if(isset($_POST['Ні'])){ 
    echo "<script>window.open('account.php?edit_acc','_self')</script>";   
}
?>