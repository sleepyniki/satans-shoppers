<?php
session_start();
require_once(dirname(__DIR__) . "/src/Database/Database.php");
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
                     <a href="index.php">
                        <img class="logo" src="img/logo4.png" alt="Satan's Shoppers"
                           title="Satans Shoppers" />
                       Satan's Shoppers 
                     </a>
                  </li>
               </ul>
            </div>
            <div class="uk-navbar-right">
               <ul class="uk-navbar-nav">
                  <li class="uk-active"><a href="index.php"><span uk-icon="icon: home"></span>Home</a></li>
<?php if(empty($_SESSION["username"])): ?>
                  <li><a href="login.php"><span uk-icon="icon: sign-in"></span>Log In</a></li>
                  <li><a href="register.php"><span uk-icon="icon: file-edit"></span>Register</a></li>
<?php else:  
	$total_products = 0;
	$statement = $conn->prepare("SELECT * FROM users WHERE username = ?");
	$statement->execute([$_SESSION['username']]);
	$user = $statement->fetch();

	if(!empty($user)){
		$statement = $conn->prepare("SELECT * FROM `shopping-cart` WHERE user_id = ?");
		$statement->execute([$user['id']]);
		$shopping_cart = $statement->fetch();

		if(empty($shopping_cart)){
			$sql = "INSERT INTO `shopping-cart` (user_id, shopping_date, total_amount) VALUES (?,?,0)";
			$statement = $conn->prepare($sql);
			$statement->execute([$user['id'],date("d-m-Y")]);
			$sql = "SELECT id FROM `shopping-cart` WHERE user_id = ?";
			$statement = $conn->prepare($sql);
			$statement->execute([$user['id']]);
			$shopping_cart = $statement->fetch();
		}

		$statement = $conn->prepare("SELECT SUM(amount) FROM `cart-items` WHERE cart_id = ?");
		$statement->execute([$shopping_cart['id']]);
		$total_products = $statement->fetch();

		if(empty($total_products['SUM(amount)']) || !isset($total_products['SUM(amount)'])){
			$total_products['SUM(amount)'] = 0;
		}
	}
?>
                  <li>
                     <a href="cart.php">
                        <span uk-icon="icon: cart"></span>
                        Cart
                        <span id="cart_amount_indicator" class="uk-badge"><?= $total_products['SUM(amount)'] ?></span>
                     </a>
                  </li>
                  <li>
                     <a href="#"><span uk-icon="icon: user"></span><?= $_SESSION["username"] ?><span uk-navbar-parent-icon></span></a>
                     <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                           <li class="uk-nav-header">Your Information</li>
                           <li><a href="#"><span uk-icon="icon: settings"></span>Profile</a></li>
                           <li><a href="#"><span uk-icon="icon: bag"></span>Orders</a></li>
                           <li><a href="#"><span uk-icon="icon: heart"></span>Wishlist</a></li>
                           <li class="uk-nav-header">Contact</li>
                           <li><a href="#"><span uk-icon="icon: info"></span>Customer Service</a></li>
                           <li class="uk-nav-divider"></li>
                           <li><a href="src/Helpers/Logout.php"><span uk-icon="icon: sign-out"></span>Log Out</a></li>
                        </ul>
                     </div>
                  </li>
<?php endif ?>
               </ul>
            </div>
         </div>
      </div>
   </nav>
