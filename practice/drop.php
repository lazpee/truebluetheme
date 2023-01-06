<?php

$product_id =  $_GET["product_id"];

include 'validation.php';
// sql to delete a record
$sql = "DELETE FROM products WHERE product_id=$product_id";

if ($conn->query($sql) === TRUE) {

  header('location:products.php');
  
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>