<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "123456789", "shopping") or die ("Please, check the server connection.");
 $itemcode=$_GET["name"];
 //echo $itemcode;
 $email=$_SESSION['email'];
//echo $email;

 if($email=='')
 {
 echo '<script>alert("Please login to continue")</script>';
 }
 else
 {
 echo "asda";
 $select="SELECT * FROM cart where cart_itemcode='$itemcode' AND cart_email='$email' ";
 $res=mysqli_query($connect, $select) or die(mysql_error());
 $rowcount=mysqli_fetch_array($res); 
 $a=$rowcount['cart_itemcode'];
 echo $a;
 $b=$rowcount['cart_email'];
 echo $b;
 echo $select;
 if($a==$itemcode && $b==$email)
 {
 echo '<script>alert("already exists")</script>';
 }
 else
 {
 	$prodsql="SELECT * FROM products where item_code='$itemcode'";


    $prodres=mysqli_query($connect, $prodsql) or die(mysql_error());
   

    $prodrow=mysqli_fetch_array($prodres);
	$price=$prodrow['price'];
	$itemname=$prodrow['item_name'];

	

 	$sql="INSERT INTO cart VALUES('$email','$itemcode',1,'$itemname','$price')";
 	$res1=mysqli_query($connect, $sql) or die(mysql_error());
     //echo $sql;
 }
 
 }
header("Location:shoping-cart.php");

?>
