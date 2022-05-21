<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
               <h4>Сторінки</h4>
                <ul>
                    <li><a href="shop.php">Новини</a></li>
                    <li>
                        <?php
                           if(!isset($_SESSION['customer_email'])){
                               echo"<a href='checkout.php'>Записатися</a>";
                           }else{
                              echo"<a href='cart.php'>Записатися</a>";
                           }
                        ?>
                       </li>
                    <li><a href="contact.php">Контакти</a></li>
                    <li>
                        <?php
                           if(!isset($_SESSION['customer_email'])){
                               echo"<a href='checkout.php'>Аккаунт</a>";
                           }else{
                              echo"<a href='customer/account.php?orders'>Аккаунт</a>";
                           }
                        ?>
                    </li>
                </ul>               
                <hr class="hidden-md hidden-lg hidden-sm">
            </div>
            <div class="com-sm-6 col-md-3">
                 <h4>Користувач</h4>
                <ul>
                    <li>
                    <a href="checkout.php">
                     <?php
                     if(!isset($_SESSION['customer_email'])){
                          echo "<a href='checkout.php'> Увійти </a>";
                         }else{
                          echo " <a href='logout.php'> Вийти </a> ";
                         }
                     ?>
                     </a>
                    </li>
                    <li>
                        <?php
                           if(!isset($_SESSION['customer_email'])){
                               echo"<a href='register.php'> Реєстрація </a>";
                           }else{
                              echo"<a href='customer/account.php?edit_acc'> Налаштування аккаунту </a>";
                           }
                           ?>
                    </li>
                </ul>
                <hr class="hidden-md hidden-lg">
            </div>
            <div class="col-sm-6 col-md-3">
                <h4>Контакти</h4>
                <p>
                    <a>LNU News</a>
                    <br/><a>Університетська, 1</a>
                    <br/><a>webnewslnu@gmail.com</a>
                    <br/><a>+298 485 254</a>
                </p>
                <hr class="hidden-md hidden-lg">   
            </div>
            <div class="col-sm-6 col-md-3">  
                <h4>Keep In Touch</h4>
                <p class="social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a> 
                    <a href="#" class="fa fa-google-plus"></a> 
                </p>
            </div>
        </div>
    </div>
</div>
<div id="copyright">
    <div class="container">
        <div class="footer-copyright text-center py-3 mdb-color indigo lighten-3 ">© 2022 Copyright:
            <a href="https://upload.wikimedia.org/wikipedia/commons/b/bf/%D0%A3%D0%BD%D1%96%D0%B2%D0%B5%D1%80%D1%81%D0%B8%D1%82%D0%B5%D1%82%D1%81%D1%8C%D0%BA%D0%B0%2C_1_%D0%91%D1%83%D0%B4%D0%B8%D0%BD%D0%BE%D0%BA_%D0%B3%D0%B0%D0%BB%D0%B8%D1%86%D1%8C%D0%BA%D0%BE%D0%B3%D0%BE_%D1%81%D0%B5%D0%B9%D0%BC%D1%83.JPG"> LNU News</a>
        </div>
    </div>
</div> 