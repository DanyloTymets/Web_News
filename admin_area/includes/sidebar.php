<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('../login.php','_self')</script>";
        
    }else{

?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span> 
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
        </button>
        <a href="index.php?dashboard" class="navbar-brand">Admin Page</a> 
    </div>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i></i> <?php echo $admin_name;  ?><b class="caret"></b> 
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="index.php?user_profile=<?php echo $admin_id; ?>">
                        <i class="fa fa-fw fa-user"></i> Профіль
                    </a> 
                </li> 
                <li>
                    <a href="index.php?view_products">
                        <i class="fa fa-fw fa-envelope"></i> Новини 
                        <!--<span class="badge"><?php echo $count_products; ?></span>--> 
                    </a>
                </li>
                <li>
                    <a href="index.php?view_customers">
                        <i class="fa fa-fw fa-users"></i> Користувачі 
                        <span class="badge"><?php echo $count_customers; ?></span> 
                    </a>
                </li>
                <li>
                    <a href="index.php?view_cats">
                        <i class="fa fa-fw fa-archive"></i> Види новин
                        <!--<span class="badge"><?php echo $count_p_categories; ?></span> -->
                    </a>
                </li>
                <li class="divider"></li> 
                <li>
                    <a href="logout.php">
                        <i class="fa fa-fw fa-power-off"></i> Вийти 
                    </a> 
                </li>  
            </ul> 
        </li> 
    </ul> 
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard">
                    <i class="fa fa-fw fa-th-list"></i> Панель Управління 
                </a> 
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#users">
                    <i class="fa fa-fw fa-user "></i> Адміністратори
                    <i class="fa fa-fw fa-caret-down"></i>     
                </a>
                <ul id="users" class="collapse">
                    <li>
                        <a href="index.php?insert_user"> Додати адміністратора </a>
                    </li>
                    <li>
                        <a href="index.php?view_users"> Переглянути адміністраторів </a>
                    </li>
                    <li>
                        <a href="index.php?user_profile=<?php echo $admin_id; ?>"> Налаштування профілю </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index.php?view_orders">
                    <i class="fa fa-fw fa-book"></i> Записи
                </a>
            </li> 
            <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                        <i class="fa fa-fw fa-tag"></i> Новини 
                        <i class="fa fa-fw fa-caret-down"></i> 
                </a>
                <ul id="products" class="collapse"> 
                    <li> 
                        <a href="index.php?insert_product"> Додати новину </a>
                    </li> 
                    <li> 
                        <a href="index.php?view_products"> Переглянути новини </a>
                    </li> 
                </ul> 
             </li> 
            <li>
                <a href="#" data-toggle="collapse" data-target="#p_cat">
                        <i class="fa fa-fw fa-archive"></i> Категорії новин
                        <i class="fa fa-fw fa-caret-down"></i>     
                </a> 
                <ul id="p_cat" class="collapse">
                    <li>
                        <a href="index.php?insert_p_cat"> Додати категорію новин </a>
                    </li>
                    <li>
                        <a href="index.php?view_p_cats"> Переглянути категорії новин </a>
                    </li>
                </ul> 
            </li> 
            <li>
                <a href="#" data-toggle="collapse" data-target="#cat"> 
                        <i class="fa fa-fw fa-archive"></i> Категорії користувачів
                        <i class="fa fa-fw fa-caret-down"></i> 
                </a> 
                <ul id="cat" class="collapse">
                    <li>
                        <a href="index.php?insert_cat"> Додати категорію користувачів</a>
                    </li>
                    <li>
                        <a href="index.php?view_cats"> Переглянути категорії користувачів </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index.php?view_customers">
                    <i class="fa fa-fw fa-users"></i> Переглянути користувачів
                </a>
            </li>
            <!--<li>
                <a href="index.php?view_payments">
                    <i class="fa fa-fw fa-money"></i> View Payments
                </a>
            </li>-->
            <li>
                <a href="#" data-toggle="collapse" data-target="#slides">
                        <i class="fa fa-fw fa-gear"></i> Слайди
                        <i class="fa fa-fw fa-caret-down"></i>  
                </a>
                <ul id="slides" class="collapse">
                    <li>
                        <a href="index.php?insert_slide"> Додати слайд </a>
                    </li>
                    <li>
                        <a href="index.php?view_slides"> Переглянути слайди </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Вийти
                </a>
            </li>
        </ul>
    </div>
</nav>

<?php } ?>