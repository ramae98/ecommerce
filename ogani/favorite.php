<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "123456789", "shopping") or die ("Please, check the server connection.");
 $itemcode=$_GET["name"];
 //echo $itemcode;
  $email=$_SESSION['email'];

 $select="SELECT *  FROM favorites where item_code='$itemcode' AND fav_email='$email' ";
 $res=mysqli_query($connect, $select) or die(mysql_error());
  $row=mysqli_fetch_array($res); 

 $a=$row['item_code'];
 $b=$row['fav_email'];
 echo $select;
 if($email=='')
 {

 echo '<script>alert("Please login to continue")</script>';
 }
 else
 {  
 	if($a==$itemcode&&$b==$email)
 	{
 	echo '<script>alert("already exists")</script>';
 	}
 	else
 	{

 	$sql="INSERT INTO favorites VALUES('$itemcode','$email')";
 	 $res1=mysqli_query($connect, $sql) or die(mysql_error());
     echo $sql;
 	}
 }
 
header("Location:shop-grid.php");

?>

