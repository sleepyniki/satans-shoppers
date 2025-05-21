<?php
session_start();
require_once('../Database/Database.php');

$_SESSION['error_login'] = "none";
$_SESSION['login_email'] = $_POST['email'];
$_SESSION['login_password'] = $_POST['password'];

// this is the login code make it possible to log in 
if(!isset($_POST['email']) || empty($_POST['email'])) {
	$_SESSION['error_login'] = "Email not filled in";
	header('Location: ../../login.php');
	exit();
}

if(!isset($_POST['password']) || empty($_POST['password'])) {
	$_SESSION['error_login'] = "Password not filled in";
	header('Location: ../../login.php');
	exit();
}

$statement = $conn->prepare("SELECT * FROM users WHERE email = ?");
$statement->execute([$_POST['email']]);
$users = $statement->fetch(PDO::FETCH_ASSOC);

if(empty($users)) {
	$_SESSION['error_login'] = "No user found";
	header('location: ../../login.php');
	exit();
}
if($_POST['password'] != $users['password']) {
	$_SESSION['error_login'] = "Wrong password";
	header('Location: ../../login.php');
	exit();
}

// print_r($users);
// print_r($_POST);
$_SESSION['username'] = $users['username'];

header('Location: ../../index.php');

