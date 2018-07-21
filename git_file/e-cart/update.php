<?php

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}

	include 'conn.php';
	$product = $_GET['product'];
	$quantity = $_GET['quantity'];
	$cost = $_GET['cost'];
	$description = $_GET['description'];
	$img = $_GET['img'];
	$id = $_GET['id'];
	$query="UPDATE `products` SET `name`='$product', `cost`='$cost', `description`='$description', `quantity`='$quantity',`img`='$img' WHERE `id`='$id'";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Added ";
	}
	else{
		echo "Error..........................";
	}
?>