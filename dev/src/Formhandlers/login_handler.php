<?php
session_start();
$_SESSION['test'] = 'empty';
require_once('../Database/Database.php');


// var_dump($_POST);
// print_r($users);

// this is the login code make it possible to log in 
if(!isset($_POST['email']) || empty($_POST['email'])) {
header('Location: ../../login.php');
$_SESSION['test'] = 'no email';
exit();
}

if(!isset($_POST['password']) || empty($_POST['password'])) {
   header('Location: ../../login.php');
   $_SESSION['test'] = 'no password';
   exit();
}

$sql = "SELECT * FROM users WHERE email = ?";
$statement = $conn->prepare($sql);
$statement->execute([$_POST['email']]);
$users = $statement->fetch(PDO::FETCH_ASSOC);

if(empty($users)) {
    $_SESSION['test'] = 'no user';
    header('location: ../../login.php');
    exit();
}
if($_POST['password'] != $users['password']) {
    $_SESSION['test'] = 'no password';
     header('Location: ../../login.php');
     exit();
}

// print_r($users);
// print_r($_POST);
$_SESSION['username'] = $users['username'];

header('Location: ../../index.php');

