<?php
require_once("templates/head.inc.php");
$statement = $conn->prepare("SELECT * FROM users WHERE username = ?");
$statement->execute([$_SESSION['username']]);
$user = $statement->fetch();
if(!isset($user) || empty($user)){
	echo "Not a valid user";
	exit;
}

$statement = $conn->prepare("SELECT * FROM `shopping-cart` WHERE user_id = ?");
$statement->execute([$user['id']]);
$shopping_cart = $statement->fetch();

if(!isset($shopping_cart) || empty($shopping_cart)){
	echo "No cart exists from that user";
	exit;
}

$statement = $conn->prepare("SELECT SUM(amount) FROM `cart-items` WHERE cart_id = ?");
$statement->execute([$shopping_cart['id']]);
$total_products = $statement->fetch();
print_r($total_products);

?>
      <main class="uk-container uk-padding">
         <div class="uk-grid">
            <!-- BEGIN: FACTUUR -->
            <section class="uk-width-1-3 uk-flex uk-flex-column uk-cart-gap">
               <div class="uk-card-default uk-card-small uk-flex uk-flex-column uk-padding-small">
                  <div class="uk-card-header">
                     <h2>Summary</h2>
                  </div>
                  <div class="uk-card-body uk-flex uk-flex-column uk-flex-between">
                     <div class="uk-flex uk-flex-between uk-flex-center">
                        <p class="uk-width-1-2">Products (<?= $total_products['SUM(amount)'] ?>)</p>
                        <p class="uk-width-1-2 uk-margin-remove-top uk-text-right">&euro; <?= $shopping_cart['total_amount'] ?></p>
                     </div>
                     <div class="uk-flex uk-flex-between uk-flex-center">
                        <p class="uk-width-1-2">Postage Costs</p>
                        <p class="uk-width-1-2 uk-margin-remove-top uk-text-right">&euro; 6.66</p>
                     </div>
                  </div>
                  <div class="uk-card-footer">
                     <div class="uk-flex uk-flex-between uk-flex-center">
                        <p class="uk-width-1-2 uk-text-bold">In Total</p>
                        <p class="uk-width-1-2 uk-margin-remove-top uk-text-right uk-text-bold">&euro; <?= floatval($shopping_cart['total_amount']) + 6.66 ?></p>
                     </div>
                  </div>
               </div>
            </section>
            <!-- EINDE: FACTUUR -->

            <!-- BEGIN: VERZENDADRES -->
            <section class="uk-width-1-3">
               <div class="uk-card-default uk-card-small uk-flex uk-flex uk-flex-column uk-flex-between uk-padding-small">
                  <div class="uk-card-header">
                     <h2>Delivery Address</h2>
                  </div>
                  <div class="uk-card-body uk-flex uk-flex-column uk-flex-between">
                     <p class="uk-margin-remove-vertical"><?= $user['fullname'] ?></p>
                     <p class="uk-margin-remove-vertical"><?= $user['streetname'] . " " . $user['housenumber'] ?></p>
                     <p class="uk-margin-remove-vertical"><?= $user['postalcode'] . ", " . $user['city'] . ", " . $user['country'] ?></p>
                  </div>
                  <div class="uk-card-footer">
                     <div class="uk-flex uk-flex-1 uk-flex-middle uk-flex-center uk-margin-medium-top">
                        <button class="uk-button uk-button-default">
                           Change
                        </button>
                     </div>
                  </div>
               </div>
            </section>
            <!-- EINDE: VERZENDADRES -->

            <!-- BEGIN: BETALEN -->
            <section class="uk-width-1-3">
               <div class="uk-card-default uk-card-small uk-flex uk-flex uk-flex-column uk-flex-between uk-padding-small">
                  <div class="uk-card-header">
                     <h2>Payment</h2>
                  </div>
                  <div class="uk-card-body uk-flex uk-flex-column uk-flex-between">
                     <div class="uk-flex uk-flex-between uk-gap">
                        <img src="img/IDEAL.png" class="" alt="" title="" />
                        <select name="bank">
                           <option>Choose your bank</option>
                           <option value="1">Rabobank</option>
                           <option value="1">ASN Bank</option>
                           <option value="1">ING Bank</option>
                           <option value="1">Regiobank</option>
                           <option value="1">SNS Bank</option>
                           <option value="1">ABNAMRO Bank</option>
                        </select>
                     </div>
                  </div>
                  <div class="uk-card-footer">
                     <div class="uk-flex uk-flex-1 uk-flex-middle uk-flex-center uk-margin-medium-top">
                           <a href="order_confirm.php" class="uk-button uk-button-primary">
                              Pay
                           </a>
                        </div>
                  </div>
               </div>
            </section>
            <!-- EINDE: BETALEN -->
         </div>
      </main>
<?php
require_once("templates/foot.inc.php");
