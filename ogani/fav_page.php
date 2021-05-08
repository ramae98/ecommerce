<?php 
session_start();
$email=$_SESSION['email'];

if($email='')
{
   include "commonheaderwithoutlogin.php";
 
}
else
{
    include "commonHeader.php";

}
 ?>


<!DOCTYPE html>
<html lang="zxx">

<body>
    <!-- Page Preloder -->
  
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Favourites</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Favourites</span>
                            
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
                 <?php
                       $connect = mysqli_connect("localhost", "root", "123456789", "shopping") or die ("Please, check the server connection.");
                        $sql="SELECT * FROM favorites";
                        $res=mysqli_query($connect, $sql) or die(mysql_error());
                      //  echo $sql;
                        while ($row=mysqli_fetch_array($res)) 
                        {
                          $z=$row['item_code'];
                          $sql1="SELECT * FROM products where item_code='$z'";
                          $res1=mysqli_query($connect, $sql1) or die(mysql_error());

                          while($row1=mysqli_fetch_array($res1))
                          {
                           ?>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="<?php echo $row1['imagename'];?>" alt="">
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $row1['item_name'];?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">$50.00</div>
                        <p><?php echo $row1['description'];?></p>
                        
                        <a href="cart.php?name=<?php echo $row['item_code'];?>" class="primary-btn">ADD TO CART</a>
                        <a href="fav_page.php" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            
                            <?php  
                            if($row1['quantity'] >0)
                            {
                                $stock="In Stock";
                            }
                            else
                            {
                                $stock="Out of Stock";
                            }
                             ?>

                            <li><b>Availability</b> <span><?php echo $stock;?></span></li>
                           
                            <li><b>Share on</b>



                                <?php
 $title=urlencode($row1['item_name']);
 $url=urlencode('http://www.facebook.com/wordpressdesign');
 $summary=urlencode($row1['description']);
   $image=urlencode($row1['imagename']);
     ?>
   


                                <div class="share">
                                    <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&  amp;p[title]=<?php  echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;p[images][0]=<?php echo $image;?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                  <?php } }?>  
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->

    <!-- Related Product Section End -->

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