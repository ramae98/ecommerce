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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="images/banner-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $email=$_SESSION['email'];
                               
                                  $firstsql="SELECT * FROM cart where cart_email='$email' ";
                                  $firstres=mysqli_query($connect, $firstsql);
                                  while($firstrow=mysqli_fetch_array($firstres))
                                  {
                                    $d=$firstrow['cart_itemcode'];
                                   $secondsql="SELECT * FROM products where item_code='$d'";
                                    $secondres=mysqli_query($connect, $secondsql);
                                    $secondrow=mysqli_fetch_array($secondres);
                                    $carttotal=$firstrow['cart_price'];
                                    $itemtotal=0;
                                    $itemtotal=$firstrow['cart_quantity'] * $secondrow['price'];
                                   ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="<?php echo $secondrow['imagename'];?>" alt="">
                                        <h5><a href="shop-details.php?name=<?php echo $firstrow['cart_itemcode'];?>"><?php echo $firstrow['cart_item_name'];?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <?php echo $secondrow['price'];?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                      <form action="updatecartqty.php">

                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" name="qty" id="quant" value=<?php echo $firstrow['cart_quantity'];?>>

                                                 </div>
                                                <input type="hidden"  name="code" value=<?php echo $firstrow['cart_itemcode'];?>>

                                                <button type="submit" ><span><i class="fa fa-edit" style="font-size:27px;color:green"></i></span></button>



                                       
                                     </div>
                                   </form>
                                 </td>

                              <td class="shoping__cart__total">
                                     <?php echo $itemtotal;?>
                                    </td>
                                   
                                    <td class="shoping__cart__item__close">
                                       <a href="deleteoneitemcart.php?name=<?php echo $firstrow['cart_itemcode'];?>" class="primary-btn">Remove</a>
                                    </td>
                                </tr>
                                <?php }  
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <?php 
                        $cart="SELECT * FROM CART";
                        $cartres=mysqli_query($connect,$cart);
                         
                        ?>
                        <a href="index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="deletecart.php" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Empty Cart</a>
                    </div>
                </div>
              <div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            
                            <li>Total <span><?php echo $pricecal_count; ?></span></li>
                        </ul>
                        <a href="totalcheckout.php" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
           
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