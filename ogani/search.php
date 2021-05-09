<?php 
session_start();
if(isset($_SESSION['email']))
{
    include "commonHeader.php";
}
else
{
   include "commonheaderwithoutlogin.php";

}
 ?>


<!DOCTYPE html>
<html lang="zxx">

<body>

    <!-- Hero Section End -->

  
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                 <?php
                       $search=$_GET['search'];
                       $connect = mysqli_connect("localhost", "root", "123456789", "shopping") or die ("Please, check the server connection.");
                        $sql="SELECT * FROM products where brand_name LIKE '%".$search."%'AND item_name LIKE '%".$search."%'";
                        $res=mysqli_query($connect, $sql) or die(mysql_error());
                      //  echo $sql;
                        
                          while($row1=mysqli_fetch_array($res))
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
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">ADD TO CARD</a>
                        <a href="fav_page.php" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                           
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
                  <?php }?>  
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