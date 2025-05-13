<?php
$servername = "localhost";
$username = "root";
$password = "";
try {
  $conn = new PDO("mysql:host=$servername;dbname=devil-shop", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  die();
}

$valid = true;

if(!isset($_POST['fullname']) || empty($_POST['fullname'])){
	$valid=false;
}

if(!isset($_POST['username']) || empty($_POST['username'])){
	$valid=false;
}
$sql = "SELECT username FROM users WHERE username = ?";
$statement = $conn->prepare($sql);
$statement->execute([$_POST['username']]);
$username_check = $statement->fetch();

if(!empty($username_check)){
	$valid = false;
}

if(!isset($_POST['street']) || empty($_POST['street'])){
	$valid=false;
}

if(!isset($_POST['housenumber']) || empty($_POST['housenumber'])){
	$valid=false;
}

if(!isset($_POST['zipcode']) || empty($_POST['zipcode'])){
	$valid=false;
}

if(!isset($_POST['city']) || empty($_POST['city'])){
	$valid=false;
}

if(!isset($_POST['country']) || empty($_POST['country'])){
	$valid=false;
}

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	$valid=false;
}

if(!isset($_POST['password']) || empty($_POST['password'])){
	$valid=false;
}

if(!isset($_POST['password_confirm']) || empty($_POST['password_confirm'])){
	$valid=false;
}

if($_POST['password'] != $_POST['password_confirm']){
	$valid=false;
}

if(!$valid){
	header("Location: http://localhost/satans-shoppers/register.php");
	exit;
}

//all is valid
//insert sql here


$sql = "INSERT INTO users (username, fullname, password, email, streetname, housenumber, postalcode, city, country) VALUES (?,?,?,?,?,?,?,?,?)";
$statement = $conn->prepare($sql);
$statement->execute([$_POST['username'],$_POST['fullname'],$_POST['password'],$_POST['email'],$_POST['street'],$_POST['housenumber'],$_POST['zipcode'],$_POST['city'],$_POST['country']]); 

header("Location: http://localhost/satans-shoppers/index.php");
exit;
