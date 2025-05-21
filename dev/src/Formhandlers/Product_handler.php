<?php
session_start();
require_once("../Database/Database.php");

if(isset($_GET['id'])){
	$statement = $conn->prepare("SELECT name, price FROM products WHERE id = ?");
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
	$statement = $conn->prepare("SELECT id FROM users WHERE username = ?");
	$statement->execute([$_SESSION["username"]]);
	$user_id = $statement->fetch();

	$statement = $conn->prepare("SELECT id FROM `shopping-cart` WHERE user_id = ?");
	$statement->execute([$user_id['id']]);
	$cart_id = $statement->fetch();

	
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

$statement = $conn->prepare("SELECT id, price, amount FROM `cart-items` WHERE cart_id = ? AND product_id = ?");
$statement->execute([$cart_id['id'], $_GET['id']]);
$cart_item = $statement->fetch();

if(empty($cart_item)){
	$statement = $conn->prepare("INSERT INTO `cart-items` (cart_id,product_id,amount,price) VALUES (?,?,?,?)");
	$statement->execute([$cart_id['id'], $_GET['id'], $_POST['quantity'], $product['price']]);
}
else{
	$statement = $conn->prepare("UPDATE `shopping-cart` SET total_amount = total_amount - ? * ? WHERE id = ?");
	$statement->execute([$cart_item['price'],$cart_item['amount'],$cart_id['id']]);

	$statement = $conn->prepare("UPDATE `cart-items` SET amount = ? WHERE id = ?");
	$statement->execute([$_POST['quantity'],$cart_item['id']]);
}

$statement = $conn->prepare("UPDATE `shopping-cart` SET total_amount = total_amount + ? * ? WHERE id = ?");
$statement->execute([$product['price'],$_POST['quantity'],$cart_id['id']]);

header("Location: ../../index.php");
exit;
