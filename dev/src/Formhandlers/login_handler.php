<?php
session_start();
$_SESSION['test'] = 'empty';
require_once('../Database/Database.php');


var_dump($_POST);
// this is the login code make it possible to log in 
if(!isset($_POST['email']) || empty($_POST['email'])) {
// header('Location: ../../login.php');
$_SESSION['test'] = 'no email';
exit();
}

if(!isset($_POST['password']) || empty($_POST['password'])) {
//    header('Location: ../../login.php');
   $_SESSION['test'] = 'no password';
   exit();
}

$sql = "SELECT * FROM users WHERE email = ?";
$statement = $conn->prepare($sql);
$statement->execute([$_POST['email']]);
$users = $statement->fetch();

if(empty($users)) {
    $_SESSION['test'] = 'no user';
    //header('location: ../../login.php');
    exit();
}
if($password != $users['password']) {
    $_SESSION['test'] = 'no user';
     //header('Location: ../../login.php');
     exit();
}

$_SESSION['username'] = $users['username'];

// header('Location: ../../index.php');

// print_r($users);