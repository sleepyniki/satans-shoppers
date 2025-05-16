<?php
include_once("templates/head.inc.php");
$product = null;
$quantity = 1;

if(isset($_GET['id'])){
	$sql = "SELECT name, price, description, image FROM products WHERE id = ?";
	$statement = $conn->prepare($sql);
	$statement->execute([$_GET['id']]);
	$product = $statement->fetch();

	if(!empty($_SESSION["username"]) || isset($_SESSION["username"])){
		$sql = "SELECT id FROM users WHERE username = ?";
		$statement = $conn->prepare($sql);
		$statement->execute([$_SESSION["username"]]);
		$user_id = $statement->fetch();
		if(!empty($user_id)){
			$sql = "SELECT id FROM `shopping-cart` WHERE user_id = ?";
			$statement = $conn->prepare($sql);
			$statement->execute([$user_id['id']]);
			$cart_id = $statement->fetch();

			if(!empty($cart_id)){
				$sql = "SELECT amount FROM `cart-items` WHERE cart_id = ? AND product_id = ?";
				$statement = $conn->prepare($sql);
				$statement->execute([$cart_id['id'], $_GET['id']]);
				$quantity = $statement->fetch();
			}
		}
	}
}
?>
      <main class="uk-container uk-padding">
         <div class="uk-grid">
            <section class="uk-width-1">
               <div class="uk-grid uk-card uk-card-default">
                  <section class="uk-width-1-2 uk-card-media-left">
<?php if(!empty($product) && isset($product)): ?>
                     <img src="<?= 'img/' . $product['image']; ?>" class="" alt="" title="" />
                  </section>
                  <section class="uk-width-1-2 uk-card-body uk-flex uk-flex-column uk-flex-between">
                     <div class="">
                        <h1><?= $product['name']; ?></h1>
                        <p class="">
<?= $product["description"]; ?>
                        </p>
                     </div>
                     <div class="uk-flex uk-flex-between uk-flex-middle">
                        <div class="price-block">
                           <p class="product-view__price uk-text-bold uk-text-danger uk-text-left uk-text-bolder">&euro; <?= $product["price"]; ?></p>
                        </div>
                        <div>
<?php if(!empty($_SESSION["username"])):  ?>
			   <form method="POST" action="src/Formhandlers/product_handler.php?id=<?= $_GET['id'] ?>" "uk-width-1-1 uk-flex uk-flex-center">
			   <input type="number" name="quantity" value="<?= $quantity; ?>" min="1" max="666">
                           <button class="uk-button uk-button-primary" type="submit">
                              <span uk-icon="icon: cart"></span>
                              Update Cart
                           </button>
</form>
<?php endif; ?>
                        </div>   
                     </div>
<?php
else:
	echo "<h1><br>Product not found</h1><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>"; 
endif;
?>
                  </section>
               </div>
            </section>
         </div>
      </main>
<?php
include_once("templates/foot.inc.php");
