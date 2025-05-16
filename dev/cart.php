<?php
include_once("templates/head.inc.php");
$statement = $conn->prepare('SELECT * FROM shopping-cart');
$statement->execute();
$shopping_cart = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
      <main class="uk-container uk-padding">
         <div class="uk-grid">
            <section class="uk-width-2-3 uk-flex uk-flex-column uk-cart-gap">
               <!-- START OF SHOPPING CART PRODUCT TEMPLATE -->
               <div class="uk-card-default uk-card-small uk-flex uk-flex-between">
                  <div class="uk-card-media-left uk-widht-1-5">
                     <img src="" alt="" class="product-image uk-align-center">
                  </div>
                  <div class="uk-card-body uk-width-4-5 uk-flex uk-flex-between">
                     <div class="uk-width-3-4 uk-flex uk-flex-column">
                        <h2>Title</h2>
                        <p class="uk-margin-remove-top">Short Decription</p>
                        <div class="uk-flex uk-flex-between">
                           <p class="uk-text-primary uk-text-bold">Price per piece: &euro; <!-- <?= sprintf("%.2f", $cart_item->price) ?> --></p>
                           <p class="uk-text-primary uk-text-bold uk-margin-remove-top">In total: &euro; <!-- <?= sprintf("%.2f", $cart_item->product_total) ?> --></p>
                        </div>
                     </div>
                     <div class="uk-width-1-4 uk-flex uk-flex-between uk-flex-middle uk-flex-center">
                        <div class="uk-width-3-4 uk-flex uk-flex-column uk-flex-middle">
                           <input id="amount" class="uk-form-controls uk-form-width-xsmall uk-text-medium" name="amount" value="1" type="number" />
                        </div>
                        <div class="uk-width-1-4">
                           <a href="#" class="uk-link-cart-trash uk-flex uk-flex-column uk-flex-middle uk-text-danger uk-flex-1">
                              <span uk-icon="icon: trash"></span>
                              <span class="uk-text-xsmall">Remove</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END OF SHOPPING CART PRODUCT TEMPLATE -->
            </section>
            <section class="uk-width-1-3">
               <div class="uk-card uk-card-default uk-card-small">
                     <div class="uk-card-header uk-align-center">
                        <h2>Summary</h2>
                     </div>
                     <div class="uk-card-body">
                        <div class="uk-flex uk-flex-between uk-flex-middle">
                           <p class="uk-width-1-2">Products ()</p>
                           <p class="uk-width-1-2 uk-margin-remove-top uk-text-right">&euro; 0.00</p>
                        </div>
                        <div class="uk-flex uk-flex-between uk-flex-middle">
                           <p class="uk-width-1-2">Postage Costs</p>
                           <p class="uk-width-1-2 uk-margin-remove-top uk-text-right">&euro; 0.00</p>
                        </div>
                     </div>
                     <div class="uk-card-footer">
                        <div class="uk-flex uk-flex-between uk-flex-middle">
                           <p class="uk-width-1-2 uk-text-bold">In Total</p>
                           <p class="uk-width-1-2 uk-margin-remove-top uk-text-right uk-text-bold">&euro; 0.00</p>
                        </div>
                        <div class="uk-flex uk-flex-1 uk-flex-middle uk-flex-center uk-margin-medium-top">
                           <a href="order.php" class="uk-button uk-button-primary">
                              Order
                           </a>
                        </div>
                     </div>
               </div>
            </section>
         </div>
      </main>
<?php
include_once("templates/foot.inc.php");
