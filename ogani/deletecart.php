<?php 
$email=$_GET['name'];
$connect = mysqli_connect("localhost", "root", "123456789", "shopping") or die ("Please, check the server connection.");

$sql="DELETE FROM cart ";
$res=mysqli_query($connect, $sql) or die(mysql_error());


header("Location:shoping-cart.php");

?>