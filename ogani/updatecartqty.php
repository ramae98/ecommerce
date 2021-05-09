<?php
session_start();
$email=$_SESSION['email'];
$itemcode=$_GET['code'];
$qty=$_GET['qty'];
echo "i am in";
 
$connect = mysqli_connect("localhost", "root", "123456789", "shopping") or die ("Please, check the server connection.");
$sql1="SELECT cart_price from cart where cart_itemcode='$itemcode' AND cart_email='$email' ";
echo $sql1;

$res1=mysqli_query($connect, $sql1) or die(mysql_error());
$row=mysqli_fetch_array($res1);


$sql="SELECT price from products where item_code='$itemcode'";
$res=mysqli_query($connect, $sql) or die(mysql_error());
$row1=mysqli_fetch_array($res);

echo $sql;


$cart_price=$qty*$row1['price'];
echo $cart_price;
$sql2="UPDATE  cart set cart_quantity=$qty,cart_price=$cart_price where cart_itemcode='$itemcode' AND cart_email='$email' ";
$res2=mysqli_query($connect, $sql2) or die(mysql_error());
 
echo $sql2;
header("Location:shoping-cart.php");


?>