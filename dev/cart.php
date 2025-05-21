<?php
include_once("templates/head.inc.php");
$statement = $conn->prepare('SELECT * FROM `shopping-cart`');
$statement->execute();
$shopping_cart = $statement->fetchAll(PDO::FETCH_ASSOC);

if(!empty($_SESSION["username"]) || isset($_SESSION["username"])){
	$sql = "SELECT id FROM users WHERE username = ?";
	$statement = $conn->prepare($sql);
	$statement->execute([$_SESSION["username"]]);
	$user = $statement->fetch();
	if(!empty($user)){
		$sql = "SELECT * FROM `shopping-cart` WHERE user_id = ?";
		$statement = $conn->prepare($sql);
		$statement->execute([$user['id']]);
		$shopping_cart = $statement->fetch();

		if(!empty($shopping_cart)){
			$sql = "SELECT * FROM `cart-items` WHERE cart_id = ?";
			$statement = $conn->prepare($sql);
			$statement->execute([$shopping_cart['id']]);
			$shopping_cart_items = $statement->fetchAll();
           
		}
	}
}


?>
      <main class="uk-container uk-padding">
         <div class="uk-grid">
            <section class="uk-width-2-3 uk-flex uk-flex-column uk-cart-gap">

               <?php foreach($shopping_cart_items as $shopping_cart_item):
                        $statement = $conn->prepare("Select * From products where id = ?");  
                        $statement->execute([$shopping_cart_item['product_id']]);
                        $product = $statement->fetch();
               ?>
               <div class="uk-card-default uk-card-small uk-flex uk-flex-between">
                  <div class="uk-card-media-left uk-widht-1-5">
                     <img src="<?= 'img/' . $product['image']; ?>" width = 300 class="" alt="" title="" />
                  </div>
                  <div class="uk-card-body uk-width-4-5 uk-flex uk-flex-between">
                     <div class="uk-width-3-4 uk-flex uk-flex-column">
                        <h3><?= $product['name']; ?></h3>
                        <div class="uk-flex uk-flex-between">
                           <p class="uk-text-primary uk-text-bold">Price per piece: &euro; <?= $product["price"]; ?></p>
                        </div>
                     </div>
                     <div class="uk-width-1-4 uk-flex uk-flex-between uk-flex-middle uk-flex-center">
                        <div class="uk-width-1-4 uk-flex uk-flex-column uk-flex-middle">
                           <input id="amount" class="uk-form-controls uk-form-width-xsmall uk-text-medium" name="amount" value="<?= $shopping_cart_item["amount"] ?>" type="number" />
                        </div>
                        <div class="uk-width-1-4">
                           <a href="src/Helpers/Cart_remove.php?id=<?= $product['id'] ?>" class="uk-link-cart-trash uk-flex uk-flex-column uk-flex-middle uk-text-danger uk-flex-1">
                              <span uk-icon="icon: trash"></span>
                              <span class="uk-text-xsmall">Remove</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <?php endforeach; ?>

            </section>
            <section class="uk-width-1-3">
               <div class="uk-card uk-card-default uk-card-small">
                     <div class="uk-card-header uk-align-center">
                        <h2>Summary</h2>
                     </div>
                     <div class="uk-card-body">
                        <div class="uk-flex uk-flex-between uk-flex-middle">
                        </div>
                        <div class="uk-flex uk-flex-between uk-flex-middle">
                           <p class="uk-width-1-2">Postage Costs</p>
                           <p class="uk-width-1-2 uk-margin-remove-top uk-text-right">&euro; 6.66</p>
                        </div>
                     </div>
                     <div class="uk-card-footer">
                        <div class="uk-flex uk-flex-between uk-flex-middle">
                           <p class="uk-width-1-2 uk-text-bold">In Total</p>
                           <p class="uk-width-1-2 uk-margin-remove-top uk-text-right uk-text-bold">&euro; <?= $shopping_cart["total_amount"] + 6.66; ?></p>
                        </div>
<?php if($shopping_cart['total_amount'] > 0.00): ?>
                        <div class="uk-flex uk-flex-1 uk-flex-middle uk-flex-center uk-margin-medium-top">
                           <a href="order.php" class="uk-button uk-button-primary">
                              Order
                           </a>
                        </div>
<?php endif; ?>
                     </div>
               </div>
            </section>
         </div>
      </main>
<?php
include_once("templates/foot.inc.php");
