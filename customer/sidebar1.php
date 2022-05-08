<div class="panel panel-default sidebar-menu"> 
    <div class="panel-heading">
        <?php
        $customer_session = $_SESSION['customer_email'];
        $get_customer = "select * from customers where customer_email='$customer_session'";
        $run_customer = mysqli_query($con,$get_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_name = $row_customer['customer_name'];
        if(!isset($_SESSION['customer_email'])){  
        }else{
            echo "
                <h3 class='panel-title' align='center'>
                    Ім'я: $customer_name
                </h3>
            ";   
        }
        ?>
    </div>
    <div class="panel-body">
        <ul class="nav-pills nav-stacked nav category-menu"> 
            <li class="<?php if(isset($_GET['edit_acc'])){ echo "active"; } ?>">
                <a href="account.php?edit_acc">
                    <i class="fa fa-pencil"></i> Налаштування аккаунту
                </a>
            </li>
            <li class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">
                <a href="account.php?change_pass">
                    <i class="fa fa-user"></i> Зміна паролю
                </a>
            </li>
            <li class="<?php if(isset($_GET['orders'])){ echo "active"; } ?>">
                <a href="account.php?orders">
                    <i class="fa fa-list"></i> Події
                </a>
            </li>
            <li class="<?php if(isset($_GET['delete_account'])){ echo "active"; } ?>">
                
                <a href="account.php?delete_account">
                    <i class="fa fa-trash-o"></i> Видалити аккаунт
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fa fa-sign-out"></i> Вийти
                </a>
            </li>
        </ul>
    </div>
</div>