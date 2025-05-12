<?php

$valid = true;

if ($_SERVER['HTTP_REFERER'] != "http://localhost/" || $_SERVER['REQUEST_METHOD'] != "POST")
	echo "Not a valid source";
	die();

if(!isset($_POST['fullname']) || empty($_POST['fullname']))
	$valid=false;

if(!isset($_POST['username']) || empty($_POST['username']))
	$valid=false;

if(!isset($_POST['street']) || empty($_POST['street']))
	$valid=false;

if(!isset($_POST['housenumber']) || empty($_POST['housenumber']))
	$valid=false;

if(!isset($_POST['zipcode']) || empty($_POST['zipcode']))
	$valid=false;

if(!isset($_POST['city']) || empty($_POST['city']))
	$valid=false;

if(!isset($_POST['country']) || empty($_POST['country']))
	$valid=false;

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	$valid=false;

if(!isset($_POST['password']) || empty($_POST['password']))
	$valid=false;

if(!isset($_POST['password_confirm']) || empty($_POST['password_confirm']))
	$valid=false;

if($_POST['password'] != $_POST['password_confirm'])
	$valid=false;

if(!$valid)
	header("Location: http://localhost/satans-shoppers/register.php");
	exit;

//all is valid
//insert sql here

$servername = "localhost";
$username = "root";
$password = "";
try {
  $conn = new PDO("mysql:host=$servername;dbname=devil-shop", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO users (username, fullname, password, email, streetname, housenumber, postalcode, city, country) VALUES (?,?,?,?,?,?,?,?,?)";
  $statement = $conn->prepare($sql);
  $statement->execute([$_POST['username'],$_POST['fullname'],$_POST['password'],$_POST['email'],$_POST['street'],$_POST['housenumber'],$_POST['zipcode'],$_POST['city'],$_POST['country']]); 

  header("Location: http://localhost/satans-shoppers/index.php");
  exit;
} catch(PDOException $e) {
  echo "Registration failed: " . $e->getMessage();
  die();
}

