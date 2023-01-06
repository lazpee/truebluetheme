<?php

$conn = mysqli_connect("localhost","root","","ecommerce") or die("connection error");

if (! $conn) {  
	die("Connection failed" . mysqli_connect_error());  
}  
else {  
	mysqli_select_db($conn, 'pagination');  
}  
  
?>