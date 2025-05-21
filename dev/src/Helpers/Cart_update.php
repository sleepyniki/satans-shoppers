<?php
session_start();
require_once('../Database/Database.php');

if(empty($_SESSION['username']) || !isset($_SESSION['username'])){
	header("Location: ../../index.php");
	exit;
}

if(empty($_GET['id']) || !isset($_GET['id'])){
	header("Location: ../../cart.php");
	exit;
}

if(empty($_GET['quantity']) || !isset($_GET['quantity'])){
	header("Location: ../../cart.php");
	exit;
}

$statement = $conn->prepare("SELECT * FROM users WHERE username = ?");
$statement->execute([$_SESSION['username']]);
$user = $statement->fetch();

if(empty($user)){
	header("Location: ../../index.php");
	exit;
}

$statement = $conn->prepare("SELECT * FROM `shopping-cart` WHERE user_id = ?");
$statement->execute([$user['id']]);
$shopping_cart = $statement->fetch();

if(empty($shopping_cart)){
	header("Location: ../../cart.php");
	exit;
}

$statement = $conn->prepare("SELECT * FROM `cart-items` WHERE cart_id = ? AND product_id = ?");
$statement->execute([$shopping_cart['id'],$_GET['id']]);
$cart_item = $statement->fetch();

if(empty($cart_item)){
	header("Location: ../../index.php");
	exit;
}

$statement = $conn->prepare("UPDATE `shopping-cart` SET total_amount = ? WHERE user_id = ?");
$statement->execute([$shopping_cart['total_amount'] - $cart_item['amount'] * $cart_item['price'] + $_GET['quantity'] * $cart_item['price'],$user['id']]);

$statement = $conn->prepare("UPDATE `cart-items`SET amount = ? WHERE cart_id = ? AND product_id = ?");
$statement->execute([$_GET['quantity'],$shopping_cart['id'],$_GET['id']]);

header("Location: ../../cart.php");
