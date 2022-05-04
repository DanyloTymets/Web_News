<?php
$db = mysqli_connect("localhost","root","","TD-Shop");
function getPro2(){ 
    global $db; 
    $get_products = "select * from products order by 1 DESC LIMIT 0,6"; 
    $run_products = mysqli_query($db,$get_products); 
    while($row_products=mysqli_fetch_array($run_products)){ 
        $pro_id = $row_products['product_id']; 
        $pro_title = $row_products['product_title']; 
        $pro_price = $row_products['product_price']; 
        $pro_img1 = $row_products['product_img1']; 
        echo " 
        <div class='col-md-4 col-sm-6 single'> 
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
                            <i class='fa fa-shopping-cart'></i> Add to Cart 
                        </a> 
                    </p> 
                </div> 
            </div> 
        </div> 
        "; 
    } 
}
function getPCategories1(){
    global $db;
    $get_p_cats = "select * from product_categories";
    $run_p_cats = mysqli_query($db,$get_p_cats);
    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        $p_cat_id = $row_p_cats['p_cat_id'];
        $p_cat_title = $row_p_cats['p_cat_title'];
        echo "
            <li>
                <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a>
            </li>
        
        "; 
    }
}
function getCategories1(){
    global $db;
    $get_cats = "select * from customer_categories";
    $run_cats = mysqli_query($db,$get_cats);
    while($row_p_cats=mysqli_fetch_array($run_cats)){
        $cat_id = $row_p_cats['cat_id'];
        $cat_title = $row_p_cats['cat_title'];
        echo "
            <li>
                <a href='shop.php?cat=$cat_id'> $cat_title </a>
            </li>
        
        "; 
    }
}
function getPCategoriesProduct1(){
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
?>

<!--<ul class="pagination">
                   <?php  
                      $query = "select * from products";
                      $result = mysqli_query($con,$query);
                      $total_records = mysqli_num_rows($result);
                      $total_pages = ceil($total_records / $per_page);
                          echo "
                              <li>
                                  <a href='shop.php?page=1'> ".'First Page'." </a>
                              </li>
                          ";
                          for($i=1; $i<=$total_pages; $i++){
                                echo "
                              <li>
                                  <a href='shop.php?page=".$i."'> ".$i." </a>
                              </li>
                          ";  
                          };  
                          echo "
                              <li>
                                  <a href='shop.php?page=$total_pages'> ".'Last Page'." </a>
                              </li>
                          ";
                      ?>
               </ul>-->