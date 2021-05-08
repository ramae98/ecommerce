<?php
session_start();
$cat_range=$_SESSION['cat_range'];
$connect = mysqli_connect("localhost", "root", "123456789", "shopping") or die ("Please, check the server connection.");
$sql="SELECT count(*) as count FROM products where price BETWEEN '".$_POST["minimum_range"]."' AND '".$_POST["maximum_range"]."' AND category='$cat_range' ORDER BY price ASC";
$res=mysqli_query($connect, $sql) or die(mysql_error());
 $datatotal=mysqli_fetch_array($res);
 
 echo $datatotal['count']."  Products found";

?>

