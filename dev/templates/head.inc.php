<?php
$servername = "localhost";
$username = "root";
$password = "";
try {
  $conn = new PDO("mysql:host=$servername;dbname=satans-shoppers", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE php>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>Satan's Shoppers</title>

   <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
   <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
   <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
   <link rel="manifest" href="img/site.webmanifest">

   <link rel="stylesheet" href="css/uikit.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>

<body>
   <nav class="uk-navbar-container">
      <div class="uk-container">
         <div uk-navbar>
            <div class="uk-navbar-left">
               <ul class="uk-navbar-nav">
                  <li>
                     <a href="/">
                        <img class="logo" src="img/logo4.png" alt="Webshop Het Witte Kippetje"
                           title="Webshop Het Witte Kippetje" />
                       Satan's Shoppers 
                     </a>
                  </li>
               </ul>
            </div>
            <div class="uk-navbar-right">
               <ul class="uk-navbar-nav">
                  <li class="uk-active"><a href="/"><span uk-icon="icon: home"></span>Home</a></li>
                  <li><a href="login.php"><span uk-icon="icon: sign-in"></span>Log In</a></li>
                  <li><a href="register.php"><span uk-icon="icon: file-edit"></span>Register</a></li>
                  <li>
                     <a href="cart.php">
                        <span uk-icon="icon: cart"></span>
                        Cart
                        <span id="cart_amount_indicator" class="uk-badge">0</span>
                     </a>
                  </li>
                  <li>
                     <a href="#"><span uk-icon="icon: user"></span>User<span uk-navbar-parent-icon></span></a>
                     <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                           <li class="uk-nav-header">Your Information</li>
                           <li><a href="#"><span uk-icon="icon: settings"></span>Profile</a></li>
                           <li><a href="#"><span uk-icon="icon: bag"></span>Orders</a></li>
                           <li><a href="#"><span uk-icon="icon: heart"></span>Wishlist</a></li>
                           <li class="uk-nav-header">Contact</li>
                           <li><a href="#"><span uk-icon="icon: info"></span>Customer Service</a></li>
                           <li class="uk-nav-divider"></li>
                           <li><a href="#"><span uk-icon="icon: sign-out"></span>Log Out</a></li>
                        </ul>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </nav>
