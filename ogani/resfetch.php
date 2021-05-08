<?php
session_start();

$connect = mysqli_connect("localhost", "root", "123456789", "shopping") or die ("Please, check the server connection.");
$sql="SELECT * FROM products where price BETWEEN '".$_POST["minimum_range"]."' AND '".$_POST["maximum_range"]."' ORDER BY price ASC";
$res=mysqli_query($connect, $sql) or die(mysql_error());
 while($row = mysqli_fetch_array($res))
 {
  $output .= '  <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg='.$row['imagename'].'  style="background-image: url('.$row['imagename'].');">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="favorite.php?name='.$row['item_code'].'"><i class="fa fa-heart"></i></a></li>
                                        
                                        <li><a href="cart.php?name='.$row['item_code'].'"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">'.$row['item_name'].'</a></h6>
                                    <a href="shop-details.php?name='.$row['item_code'].'">'.$row['item_code'].'</a>
                                    <h5>'.$row['price'].'</h5>
                                </div>
                            </div>
                </div>';
 }
 echo $output;

?>

