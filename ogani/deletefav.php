<?php 
session_start();
$email=$_SESSION['email'];
$itemcode=$_GET['name'];
echo 
$connect = mysqli_connect("localhost", "root", "123456789", "shopping") or die ("Please, check the server connection.");

$sql="DELETE FROM favorites where item_code='$itemcode' AND fav_email='$email'";
$res=mysqli_query($connect, $sql) or die(mysql_error());

echo $sql;
header("Location:fav_page.php");


?>