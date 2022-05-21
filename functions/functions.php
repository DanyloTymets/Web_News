<?php
$db = mysqli_connect("localhost","root","","lnu-news");
function getProduct(){ 
    global $db; 
    $get_events = "select * from events order by 1 DESC LIMIT 0,5"; 
    $run_events = mysqli_query($db,$get_events); 
    while($row_events=mysqli_fetch_array($run_events)){ 
        $event_id = $row_events['event_id']; 
        $event_title = $row_events['event_title']; 
        $event_keyword = $row_events['event_keywords']; 
        $event_desc = $row_events['event_desc']; 
        $event_img1 = $row_events['event_img1']; 
        $event_date = date('Y-m-d', strtotime($row_events['date']));
        $event_e_cat_id = $row_events['e_cat_id'];
        $get_e_cat_id = "select * from event_categories where e_cat_id='$event_e_cat_id'"; 
        $run_e_cat_id = mysqli_query($db,$get_e_cat_id);
        while($row_e_cat_id = mysqli_fetch_array($run_e_cat_id)){
            $event_category = $row_e_cat_id['e_cat_title'];
        }
        echo " 
        <section class='section'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class='page-wrapper'>
                            <div class='blog-list clearfix'>
                                <div class='blog-box row'>
                                    <div class='col-md-4'>
                                        <div class='post-media'>
                                            <a href='details.php?event_id=$event_id' title=''>
                                                <img src='admin_area/product_images/$event_img1' alt='' class='img-responsive'>
                                                <div class='hovereffect'></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class='blog-meta big-meta col-md-8 event-information'>
                                        <h4><a href='details.php?event_id=$event_id'>$event_title</a></h4>
                                        <div class='event-description'>$event_desc</div>
                                        <div class='event-characteristics'>
                                            <small class='firstsmall'><a class='bg-orange' href='details.php?event_id=$event_id'>$event_category</a></small>
                                            <small><a href='details.php?event_id=$event_id'>$event_date</a></small>
                                        </div>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->

                                <hr class='invis'>
                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->  
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        "; 
    } 
}
function getPCategories(){
    global $db;
    $get_p_cats = "select * from event_categories";
    $run_p_cats = mysqli_query($db,$get_p_cats);
    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        $e_cat_id = $row_p_cats['e_cat_id'];
        $e_cat_title = $row_p_cats['e_cat_title'];
        echo "
            <li>
                <a href='shop.php?p_cat=$e_cat_id'> $e_cat_title </a>
            </li>
        
        "; 
    }
}
function getCategories(){
    global $db;
    $get_cats = "select * from event_categories";
    $run_cats = mysqli_query($db,$get_cats);
    while($row_p_cats=mysqli_fetch_array($run_cats)){
        $cat_id = $row_p_cats['e_cat_id'];
        $cat_title = $row_p_cats['e_cat_title'];
        echo "
            <li>
                <a href='shop.php?cat=$cat_id'> $cat_title </a>
            </li>
        
        "; 
    }
}
function getPCategoriesProduct(){
    global $db;
    if(isset($_GET['p_cat'])){
        $p_cat_id = $_GET['p_cat'];
        $get_p_cat ="select * from product_categories where p_cat_id='$p_cat_id'";
        $run_p_cat = mysqli_query($db,$get_p_cat);
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        $p_cat_title = $row_p_cat['p_cat_title'];
        $p_cat_desc = $row_p_cat['p_cat_desc'];
        $get_products ="select * from products where p_cat_id='$p_cat_id'";
        $run_products = mysqli_query($db,$get_products);
        $count = mysqli_num_rows($run_products);
        
        while($row_products=mysqli_fetch_array($run_products)){
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_price = $row_products['product_price'];
            $pro_img1 = $row_products['product_img1'];
            echo "
                <div class='col-md-4 col-sm-6 center-responsive'>
                    <div class='product'>
                        <a href='details.php?pro_id=$pro_id'>
                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                        </a>
                        <div class='text'>
                            <h3>
                                <a href='details.php?pro_id=$pro_id'>
                                    $pro_title
                                </a>
                            </h3>
                            <p class='price'>
                                $ $pro_price
                            </p>
                            <p class='button'>
                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                    View Details
                                </a>
                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                    <i class='fa fa-shopping-cart'> Add to Cart </i> 
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            ";
        }
    } 
}

function getCCategoriesProduct(){
    global $db;
    if(isset($_GET['cat'])){
        $cat_id = $_GET['cat'];
        $get_cat = "select * from customer_categories where cat_id='$cat_id'";
        $run_cat = mysqli_query($db,$get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        $cat_title = $row_cat['cat_title'];
        $cat_desc = $row_cat['cat_desc'];
        $get_cat = "select * from products where cat_id='$cat_id'";
        $run_products = mysqli_query($db,$get_cat);
        $count = mysqli_num_rows($run_products);
        
        
        while($row_products=mysqli_fetch_array($run_products)){
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_price = $row_products['product_price'];
            $pro_desc = $row_products['product_desc'];
            $pro_img1 = $row_products['product_img1'];
            echo "
                <div class='col-md-4 col-sm-6 center-responsive'>
                    <div class='product'>
                        <a href='details.php?pro_id=$pro_id'>
                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                        </a>             
                        <div class='text'>   
                            <h3>            
                                <a href='details.php?pro_id=$pro_id'> $pro_title </a>
                            </h3>           
                        <p class='price'>
                            $$pro_price
                        </p>
                            <p class='buttons'>
                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                View Details
                                </a>
                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                <i class='fa fa-shopping-cart'></i> Add To Cart
                                </a>
                            </p>             
                        </div>             
                    </div>              
                </div>
            ";
        } 
    }
}

function getIpFunc(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
}

function sendToCart(){
    
    global $db;
    
    if(isset($_GET['add_cart'])){
        $ip_add = getIpFunc();
        $p_id = $_GET['add_cart'];
        $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
        $run_check = mysqli_query($db,$check_product);
        if(mysqli_num_rows($run_check)>0){
            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('details.php?event_id=$p_id','_self')</script>";
        }else{
            $query = "insert into cart (p_id,ip_add) values ('$p_id','$ip_add')";
            $run_query = mysqli_query($db,$query);
            echo "<script>window.open('details.php?event_id=$p_id','_self')</script>";
            
        }
        
    }
    
}

function items(){
    global $db;
    $ip_add = getIpFunc();
    $get_items = "select * from cart where ip_add='$ip_add'";
    $run_items = mysqli_query($db,$get_items);
    $count_items = mysqli_num_rows($run_items);
    echo $count_items;
}

function total_price(){
    global $db;
    $ip_add = getIpFunc();
    $total = 0;
    $select_cart = "select * from cart where ip_add='$ip_add'";
    $run_cart = mysqli_query($db,$select_cart);
    while($record=mysqli_fetch_array($run_cart)){
        $pro_id = $record['p_id'];
        $pro_qty = $record['qty'];
        $get_price = "select * from products where product_id='$pro_id'";
        $run_price = mysqli_query($db,$get_price);
        while($row_price=mysqli_fetch_array($run_price)){
            $sub_total = $row_price['product_price']*$pro_qty;
            $total += $sub_total;
        }
    }
    echo "$" . $total;
}

function getPagination(){
    global $db;
    $per_page=6;
    $aWhere = array();
    $aPath = '';
    if(isset($_REQUEST['e_cat'])&&is_array($_REQUEST['e_cat'])){
        foreach($_REQUEST['e_cat'] as $sKey=>$sVal){
            if((int)$sVal!=0){
                $aWhere[] = 'e_cat_id='.(int)$sVal;
                $aPath .= 'e_cat[]='.(int)$sVal.'&';
            }
        }
    }
    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
        foreach($_REQUEST['cat'] as $sKey=>$sVal){
            if((int)$sVal!=0){
                $aWhere[] = 'cat_id='.(int)$sVal;
                $aPath .= 'cat[]='.(int)$sVal.'&';
            }
        }
    }

    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');
    if (isset($_REQUEST['search'])) {
        $search_input = $_REQUEST['search']; 
        $query = "select * from events WHERE LOCATE('$search_input', event_title) > 0 OR LOCATE('$search_input', event_desc)".$sWhere;
    } else {
        $query = "select * from events ".$sWhere;
    }
    $result = mysqli_query($db,$query);
    $total_records = mysqli_num_rows($result);
    $total_pages = ceil($total_records / $per_page);
    echo "<li> <a href='shop.php?page=1";
    if(!empty($aPath)){
        echo "&".$aPath;
    }
    echo "'>".'Перша сторінка'."</a></li>";
    for($i=1; $i<=$total_pages; $i++){
        echo "<li> <a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."'>".$i."</a></li>";
    };
    echo "<li> <a href='shop.php?page=$total_pages";
    if(!empty($aPath)){
        echo "&".$aPath;
    }
    echo "'>".'Остання сторінка'."</a></li>";
}

function getProducts(){
    global $db;
    $aWhere = array();
    if(isset($_REQUEST['e_cat'])&&is_array($_REQUEST['e_cat'])){
        foreach($_REQUEST['e_cat'] as $sKey=>$sVal){
            if((int)$sVal!=0){
                $aWhere[] = 'e_cat_id='.(int)$sVal;
            }
        }
    }
    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
        foreach($_REQUEST['cat'] as $sKey=>$sVal){
            if((int)$sVal!=0){
                $aWhere[] = 'cat_id='.(int)$sVal;
            }
        }
    } 
    $per_page=6;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page=1;
    }
    $start_from = ($page-1) * $per_page;
    $sLimit = " order by 1 DESC LIMIT $start_from,$per_page";
    $sWhere = (count($aWhere) > 0 ? ' WHERE '.implode(' or ',$aWhere) : '').$sLimit;
    if (isset($_REQUEST['search'])) {
        $size = 12;
        $search_input = $_REQUEST['search']; 
        $get_events = "select * from events WHERE LOCATE('$search_input', event_title) > 0 OR LOCATE('$search_input', event_desc)".$sWhere;
    } else {
        $size = 9;
        $get_events = "select * from events ".$sWhere;
    }
    $run_events = mysqli_query($db, $get_events);
    while($row_events=mysqli_fetch_array($run_events)){
        $event_id = $row_events['event_id']; 
        $event_title = $row_events['event_title']; 
        $event_keyword = $row_events['event_keywords']; 
        $event_desc = $row_events['event_desc']; 
        $event_img1 = $row_events['event_img1']; 
        $event_date = date('Y-m-d', strtotime($row_events['date']));
        $event_e_cat_id = $row_events['e_cat_id'];
        $get_e_cat_id = "select * from event_categories where e_cat_id='$event_e_cat_id'"; 
        $run_e_cat_id = mysqli_query($db,$get_e_cat_id);
        while($row_e_cat_id = mysqli_fetch_array($run_e_cat_id)){
            $event_category = $row_e_cat_id['e_cat_title'];
        }
        echo "
        <section class='section'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-$size col-md-12 col-sm-12 col-xs-12'>
                        <div class='page-wrapper'>
                            <div class='blog-list clearfix'>
                                <div class='blog-box row'>
                                    <div class='col-md-4'>
                                        <div class='post-media'>
                                            <a href='details.php?event_id=$event_id'>
                                                <img src='admin_area/product_images/$event_img1' alt='' class='img-responsive'>
                                                <div class='hovereffect'></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class='blog-meta big-meta col-md-8 event-information'>
                                        <h4><a href='details.php?event_id=$event_id'>$event_title</a></h4>
                                        <div class='event-description'>$event_desc</div>
                                        <div class='event-characteristics'>
                                            <small class='firstsmall'><a class='bg-orange' href='details.php?event_id=$event_id'>$event_category</a></small>
                                            <small><a href='details.php?event_id=$event_id'>$event_date</a></small>
                                        </div>
                                    </div>
                                </div><!-- end blog-box -->

                                <hr class='invis'>
                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->  
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        ";  
    }
}

?>