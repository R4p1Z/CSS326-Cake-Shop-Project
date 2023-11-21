<?php
session_start();
if(isset($_GET) & !empty($_GET)){
	$id = $_GET['id'];
	if(isset($_GET['quant']) & !empty($_GET['quant'])){ $quant = $_GET['quant']; }else{ $quant = 1;}
	/*$size = $_GET['size'];
	$pickup_time = $_GET['pickup_time'];
	$pickup_date = $_GET['pickup_date'];
	$note = $_GET['Note'];
	$price = "SELECT price FROM product WHERE id = $id";
	$priceres = mysqli_query($connection, $price);
	$pricer = mysqli_fetch_assoc($priceres);
	$product_price = $pricer['price'];
	$insertCartSQL = "INSERT INTO cart (pid, amount, price, size, pickup_time, pickup_date, note) VALUES ('$id', '$quant', '$product_price', '$size', '$pickup_time', '$pickup_date', '$note')";
	$insertCartSQLres = mysqli_query($connection, $insertCartSQL) or die(mysqli_error($connection));*/
	$_SESSION['cart'][$id] = array("quantity" => $quant); 
	header('location: cart.php');

}else{
	header('location: cart.php');
}
echo "<pre>";
print_r($_SESSION['cart']);
echo "</pre>";
?> 