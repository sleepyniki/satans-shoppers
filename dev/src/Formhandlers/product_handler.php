<?php
session_start();
require_once("../Database/Database.php");

if(isset($_GET['id'])){
	$sql = "SELECT name, price FROM products WHERE id = ?";
	$statement = $conn->prepare($sql);
	$statement->execute([$_GET['id']]);
	$product = $statement->fetch();
	
	if(empty($product)){
		header("Location: ../../product.php?id=" . $_GET['id']);
		exit;
	}
}
else{
	header("Location: ../../product.php?id=" . $_GET['id']);
	exit;
}

if(isset($_SESSION["username"])){
	$sql = "SELECT id FROM users WHERE username = ?";
	$statement = $conn->prepare($sql);
	$statement->execute([$_SESSION["username"]]);
	$user_id = $statement->fetch();

	$sql = "SELECT id FROM `shopping-cart` WHERE user_id = ?";
	$statement = $conn->prepare($sql);
	$statement->execute([$user_id['id']]);
	$cart_id = $statement->fetch();

	if(empty($cart_id)){
		$sql = "INSERT INTO `shopping-cart` (user_id, shopping_date, total_amount) VALUES (?,?,0)";
		$statement = $conn->prepare($sql);
		$statement->execute([$user_id['id'],date("d-m-Y")]);
		$sql = "SELECT id FROM `shopping-cart` WHERE user_id = ?";
		$statement = $conn->prepare($sql);
		$statement->execute([$user_id['id']]);
		$cart_id = $statement->fetch();
	}
}
else{
	header("Location: ../../product.php?id=" . $_GET['id']);
	exit;
}

if(!is_int(intval($_POST['quantity'])) || !isset($_POST['quantity']) || empty($_POST['quantity'])){
	header("Location: ../../product.php?id=" . $_GET['id']);
	exit;
}

if($_POST['quantity'] > 666 || $_POST['quantity'] < 1){
	header("Location: ../../product.php?id=" . $_GET['id']);
	exit;
}

$sql = "SELECT id, price, amount FROM `cart-items` WHERE cart_id = ? AND product_id = ?";
$statement = $conn->prepare($sql);
$statement->execute([$cart_id['id'], $_GET['id']]);
$cart_item = $statement->fetch();

if(empty($cart_item)){
	$sql = "INSERT INTO `cart-items` (cart_id,product_id,amount,price) VALUES (?,?,?,?)";
	$statement = $conn->prepare($sql);
	$statement->execute([$cart_id['id'], $_GET['id'], $_POST['quantity'], $product['price']]);
}
else{
	$sql = "UPDATE `shopping-cart` SET total_amount = total_amount - ? * ? WHERE id = ?";
	$statement = $conn->prepare($sql);
	$statement->execute([$cart_item['price'],$cart_item['amount'],$cart_id['id']]);
	$sql = "UPDATE `cart-items` SET amount = ? WHERE id = ?";
	$statement = $conn->prepare($sql);
	$statement->execute([$_POST['quantity'],$cart_item['id']]);
}

$sql = "UPDATE `shopping-cart` SET total_amount = total_amount + ? * ? WHERE id = ?";
$statement = $conn->prepare($sql);
$statement->execute([$product['price'],$_POST['quantity'],$cart_id['id']]);

header("Location: ../../index.php");
exit;
