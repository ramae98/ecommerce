<?php
session_start();

$connect = mysqli_connect("localhost", "root", "123456789", "shopping") or die ("Please, check the server connection.");
$sql="SELECT count(*) as count FROM products where price BETWEEN '".$_POST["minimum_range"]."' AND '".$_POST["maximum_range"]."' ORDER BY price ASC";
$res=mysqli_query($connect, $sql) or die(mysql_error());
 $datatotal1=mysqli_fetch_array($res);
 
 echo $datatotal1['count'];

?>
