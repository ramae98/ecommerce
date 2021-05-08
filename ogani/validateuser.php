<html>
<head>
</head>
<body>
<?php
session_start();

	$connect = mysqli_connect("localhost", "root", "123456789", "shopping") or die("Please, check your server connection.");
	$query = "SELECT email_address, password, complete_name FROM customers WHERE email_address like '" . $_POST['emailaddress'] . "' " .
          	 "AND password like (PASSWORD('" . $_POST['password'] . "'))";
	$result = mysqli_query($connect, $query) or die(mysql_error()); 
	if (mysqli_num_rows($result) == 1) {
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  			extract($row);
			echo "Welcome " . $complete_name . " to our Shopping Mall <br>"; 
			$_SESSION['name']= $complete_name ;
			$_SESSION['email']= $_POST['emailaddress'];
			echo $_SESSION['name'];
			header("Location:index.php");
		}
	}
   	else {
?>
  	Invalid Email address and/or Password<br>
  	Not registered? 
  	<a href="validatesignup.php">Click here</a> to register.<br><br><br>
  	Want to Try again<br>
  	<a href="signin.php">Click here</a> to try login again.<br>
	<?php
 	 }
?>
</body>
</html>
