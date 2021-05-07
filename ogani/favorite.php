<?php 
$connect = mysqli_connect("localhost", "root", "123456789", "shopping") or die ("Please, check the server connection.");
 $itemcode=$_GET["name"];
 //echo $itemcode;
 $select="SELECT *  FROM favorites where item_code='$itemcode'";
 $res=mysqli_query($connect, $select) or die(mysql_error());
 echo $select;
 if(mysqli_num_rows($res)>0)
 {
  

 echo '<script>alert("already exists")</script>';
 }
 else
 {
 	$sql="INSERT INTO favorites VALUES('$itemcode')";
 	 $res1=mysqli_query($connect, $sql) or die(mysql_error());
     echo $sql;
 }
 
 
header("Location:shop-grid.php");
?>

