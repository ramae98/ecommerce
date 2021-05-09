<?php
session_start();
$connect = mysqli_connect("localhost", "root", "123456789", "shopping") or die ("Please, check the server connection.");

$cat_range=$_SESSION['cat_range'];

$sql5="SELECT * FROM products where price BETWEEN '".$_POST["minimum_range"]."' AND '".$_POST["maximum_range"]."' AND category='$cat_range' ORDER BY price ASC";
$res5=mysqli_query($connect, $sql5) or die(mysql_error());

 while($row5 = mysqli_fetch_array($res5))
 {
  
  $output .= '  <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg='.$row5['imagename'].'  style="background-image: url('.$row5['imagename'].');">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="favorite.php?name='.$row5['item_code'].'"><i class="fa fa-heart"></i></a></li>
                                        
                                        <li><a href="cart.php?name='.$row5['item_code'].'"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="shop-details.php?name='.$row5['item_code'].'">'.$row5['item_name'].'</a></h6>
                                    <h5>'.$row5['price'].'</h5>
                                </div>
                            </div>
                        </div>';
 }

 echo $output;

?>


