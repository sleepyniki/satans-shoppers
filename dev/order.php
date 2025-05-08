<?php
require_once("templates/head.inc.php");
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
                        <p class="uk-width-1-2">Products ()</p>
                        <p class="uk-width-1-2 uk-margin-remove-top uk-text-right">&euro; 19.95</p>
                     </div>
                     <div class="uk-flex uk-flex-between uk-flex-center">
                        <p class="uk-width-1-2">Postage Costs</p>
                        <p class="uk-width-1-2 uk-margin-remove-top uk-text-right">&euro; 0.00</p>
                     </div>
                  </div>
                  <div class="uk-card-footer">
                     <div class="uk-flex uk-flex-between uk-flex-center">
                        <p class="uk-width-1-2 uk-text-bold">In Total</p>
                        <p class="uk-width-1-2 uk-margin-remove-top uk-text-right uk-text-bold">&euro; 0.00</p>
                     </div>
                  </div>
               </div>
            </section>
            <!-- EINDE: FACTUUR -->

            <!-- BEGIN: VERZENDADRES -->
            <section class="uk-width-1-3">
               <div class="uk-card-default uk-card-small uk-flex uk-flex uk-flex-column uk-flex-between uk-padding-small">
                  <div class="uk-card-header">
                     <h2>Verzendadres</h2>
                  </div>
                  <div class="uk-card-body uk-flex uk-flex-column uk-flex-between">
                     <p class="uk-margin-remove-vertical">Name</p>
                     <p class="uk-margin-remove-vertical">Address</p>
                     <p class="uk-margin-remove-vertical">City and Country</p>
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
                     <h2>Betalen</h2>
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
                           <a href="order_confirm.html" class="uk-button uk-button-primary">
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
