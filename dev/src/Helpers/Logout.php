<?php
session_start();
$_SESSION["username"] = "";
$_SESSION['register_fullname'] = "";
$_SESSION['register_username'] = "";
$_SESSION['register_street'] = "";
$_SESSION['register_housenumber'] = "";
$_SESSION['register_zipcode'] = "";
$_SESSION['register_city'] = "";
$_SESSION['register_country'] = "";
$_SESSION['register_email'] = "";
$_SESSION['register_password'] = "";
$_SESSION['register_password_confirm'] = "";
$_SESSION['error'] = "none";
$_SESSION['error_login'] = "none";
$_SESSION['login_email'] = "";
$_SESSION['login_password'] = "";
header("Location: ../../index.php");
