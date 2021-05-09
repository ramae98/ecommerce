<!--from shop-grid.php-->


<?php
session_start();
$itemcode=$_GET['name'];
if(isset($_SESSION['email']))
{
    include "commonHeader.php";
}
else
{
   include "commonheaderwithoutlogin.php";

}
$minimum_range = 0;
$maximum_range = 1000;
?>

<!DOCTYPE html>
<html lang="zxx">



<body>
   
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="images/banner-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shop here</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html">Vegetables</a>
                            <span>Vegetable’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <?php 
                                 $connect = mysqli_connect("localhost", "root", "123456789", "shopping") or die ("Please, check the server connection.");
                                $sql="SELECT * FROM products where item_code='$itemcode'";
                                $res=mysqli_query($connect, $sql) or die(mysql_error());
                                
                                while ($row=mysqli_fetch_array($res)) 
                                {
                                    $weight=$row['weight'];
                                    $description=$row['description'];
                                    $price=$row['price'];

                                 ?>
                          <a href="shop-details.php?name=$row['item_code']"> <img class="product__details__pic__item--large"
                                src="<?php echo $row['imagename'];?>" alt=""></a>
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="img/product/details/product-details-2.jpg"
                                src="img/product/details/thumb-1.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-3.jpg"
                                src="img/product/details/thumb-2.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-5.jpg"
                                src="img/product/details/thumb-3.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-4.jpg"
                                src="img/product/details/thumb-4.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                    

                        <h3><?php echo $row['item_name'];?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price"><?php echo $price;?></div>
                        <p><?php echo $description;?></p>
                        
                        <a href="cart.php?name=<?php echo $row['item_code'];?>" class="primary-btn">ADD TO CART</a>
                         <a href="checkout.php?name=<?php echo $row['item_code'];?>" class="primary-btn">BUY</a>
                        
                        <ul>
                            <?php  
                            if($row['quantity'] >0)
                            {
                                $stock="In Stock";
                            }
                            else
                            {
                                $stock="Out of Stock";
                                    }
                             ?>
                            <li><b>Availability</b> <span><?php echo $stock;?></span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span><?php echo $weight;?></span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=shop-details.php" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="whatsapp://send?text=www.google.com"><i class="fa fa-whatsapp" aria-hidden="true"></i>

                                </div>
                            </li>
                        </ul>
                   
                    </div>
                </div>
                
                            
                           
                           
                             <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
  
    <!-- Related Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>