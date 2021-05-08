
<?php
session_start();
$minimum_range = 0;
$maximum_range = 1000;
if(isset($_SESSION['email']))
{
    include "commonHeader.php";
}
else
{
   include "commonheaderwithoutlogin.php";

}
$connect = mysqli_connect("localhost", "root", "123456789", "shopping") or die ("Please, check the server connection.");
$brandname=$_GET['name'];
$_SESSION['brand_range']=$_GET['name'];
echo $_SESSION['brandcount'];

?>
<!DOCTYPE html>
<html lang="zxx">



<body>
    
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Brand Name</h4>
                            <ul>
                                 <?php 
                                 $connect = mysqli_connect("localhost", "root", "123456789", "shopping") or die ("Please, check the server connection.");
                                $sql="SELECT DISTINCT brand_name FROM products";
                                $res=mysqli_query($connect, $sql) or die(mysql_error());
                                while ($row=mysqli_fetch_array($res)) 
                                {
                                 ?>                                
                                <li><a href="brandname.php?name=<?php echo $row['brand_name'];?>"><?php echo $row['brand_name'];?></a></li>
                               
                                 <?php }  ?>

                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                 <div id="price_range" >
                                        

                                    </div>
                                <!--<div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount" name="minamount">
                                        <input type="text" id="maxamount" name="maxamount">
                                    </div>
                                </div>-->
                            </div>
                        </div>
                       
                        
                        <div class="sidebar__item">
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div id="rangefind" class="filter__found">
                                    <h6>Products found</h6>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div id="result" class="row">
                

                        
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

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
<script>  
$(document).ready(function(){  
    
    $( "#price_range" ).slider({
        range: true,
        min: 0,
        max:5000,
        values: [ <?php echo $minimum_range; ?>, <?php echo $maximum_range; ?> ],
        slide:function(event, ui){
            $("#minimum_range").val(ui.values[0]);
            $("#maximum_range").val(ui.values[1]);
            load_product(ui.values[0], ui.values[1]);
            load_product1(ui.values[0], ui.values[1]);

        }
    });
    
    load_product(<?php echo $minimum_range; ?>, <?php echo $maximum_range; ?>);
    
    function load_product(minimum_range, maximum_range)
    {
        $.ajax({
            url:"resfetchbrand.php ",
            method:"POST",
            data:{minimum_range:minimum_range, maximum_range:maximum_range},
            success:function(data)
            {
                $('#result').fadeIn('slow').html(data);
            }
        });
    }
load_product1(<?php echo $minimum_range; ?>,<?php echo $maximum_range; ?>);
    function load_product1(minimum_range, maximum_range)
    {
        $.ajax({
            url:"resfetchrangebrandcount.php ",
            method:"POST",
            data:{minimum_range:minimum_range, maximum_range:maximum_range},
            success:function(data1)
            {
                $('#rangefind').fadeIn('slow').html(data1);
            }
        });
    }
    
});  
</script>

</html>