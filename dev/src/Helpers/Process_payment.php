<?php
session_start();
require_once('../Database/Database.php');

if(empty($_SESSION['username']) || !isset($_SESSION['username'])){
	header("Location: ../../index.php");
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
	header("Location: ../../index.php");
	exit;
}

$statement = $conn->prepare("DELETE FROM `cart-items` WHERE cart_id = ?");
$statement->execute([$shopping_cart['id']]);

$statement = $conn->prepare("DELETE FROM `shopping-cart` WHERE user_id = ?");
$statement->execute([$user['id']]);

header("Location: ../../order_confirm.php");
