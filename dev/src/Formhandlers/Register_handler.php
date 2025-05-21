<?php
session_start();
require_once("../Database/Database.php");

$valid = "yes";
$_SESSION["error"]="none";

$_SESSION['register_fullname'] = $_POST['fullname'];
$_SESSION['register_username'] = $_POST['username'];
$_SESSION['register_street'] = $_POST['street'];
$_SESSION['register_housenumber'] = $_POST['housenumber'];
$_SESSION['register_zipcode'] = $_POST['zipcode'];
$_SESSION['register_city'] = $_POST['city'];
$_SESSION['register_country'] = $_POST['country'];
$_SESSION['register_email'] = $_POST['email'];
$_SESSION['register_password'] = $_POST['password'];
$_SESSION['register_password_confirm'] = $_POST['password_confirm'];

$statement = $conn->prepare("SELECT username FROM users WHERE username = ?");
$statement->execute([$_POST['username']]);
$username_check = $statement->fetch();

$statement = $conn->prepare("SELECT email FROM users WHERE email = ?");
$statement->execute([$_POST['email']]);
$email_check = $statement->fetch();

if($_POST['password'] != $_POST['password_confirm']){
	$valid="Passwords do not match";
}

if(!isset($_POST['password_confirm']) || empty($_POST['password_confirm'])){
	$valid="Password verification not filled in";
}

if(!isset($_POST['password']) || empty($_POST['password'])){
	$valid="Password not filled in";
}

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	$valid="Valid email not filled in";
}

if(!empty($email_check)){
	$valid="Email already in use";
}

if(!isset($_POST['country']) || empty($_POST['country'])){
	$valid="Country not filled in";
}

if(!isset($_POST['city']) || empty($_POST['city'])){
	$valid="City not filled in";
}

if(!isset($_POST['zipcode']) || empty($_POST['zipcode'])){
	$valid="Zipcode not filled in";
}

if(!isset($_POST['housenumber']) || empty($_POST['housenumber'])){
	$valid="House number not filled in";
}

if(!isset($_POST['street']) || empty($_POST['street'])){
	$valid="Street not filled in";
}

if(!isset($_POST['username']) || empty($_POST['username'])){
	$valid="Username not filled in";
}

if(!empty($username_check)){
	$valid = "Username already exists";
}

if(!isset($_POST['fullname']) || empty($_POST['fullname'])){
	$valid="Full Name not filled in";
}

if($valid != "yes"){
	$_SESSION["error"] = $valid;
	header("Location: ../../register.php");
	exit;
}

//all is valid
//insert sql here

$sql = "INSERT INTO users (username, fullname, password, email, streetname, housenumber, postalcode, city, country) VALUES (?,?,?,?,?,?,?,?,?)";
$statement = $conn->prepare($sql);
$statement->execute([$_POST['username'],$_POST['fullname'],$_POST['password'],$_POST['email'],$_POST['street'],$_POST['housenumber'],$_POST['zipcode'],$_POST['city'],$_POST['country']]); 

$_SESSION["username"] = $_POST['username'];

header("Location: ../../index.php");
exit;
