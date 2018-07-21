<?php

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}

	include 'conn.php';
	$product = $_GET['product'];
	$quantity = $_GET['quantity'];
	$cost = $_GET['cost'];
	$description = $_GET['description'];
	$img = $_GET['img'];


	$query="INSERT INTO `products`(`name`, `cost`, `description`, `quantity`,`img`) VALUES ('$product','$cost','$description','$quantity','$img')";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Added ";
	}
	else{
		echo "Error";
	}
?>