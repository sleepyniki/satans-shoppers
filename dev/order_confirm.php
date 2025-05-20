<?php
require_once("templates/head.inc.php");
?>
      <main class="uk-container uk-padding">
         <div class="uk-grid">
            <!-- BEGIN: BEDANKT -->
            <section class="uk-width-3-3 uk-flex uk-flex-column uk-cart-gap uk-margin-large-bottom">
               <div class="uk-card-default uk-card-small uk-flex uk-flex-column uk-padding-small">
                  <div class="uk-card-header">
                     <h1>Order successful!</h1>
                  </div>
                  <div class="uk-card-body uk-flex uk-flex-column uk-flex-between">
                     <div class="uk-flex uk-flex-between uk-flex-center">
                        <div>
                           <h4 class="uk-margin-remove">Thank you for choosing Satan's Shoppers!</h4>
                           <h4 class="uk-margin-remove">You will get an e-mail soon with information about the order.</h4>
                        </div>
                        <div class="uk-card-default uk-padding-small uk-flex-column uk-flex-middle uk-flex-center">
                           <h3 class="uk-text-center">Order Number</h3>
                           <h2 class="uk-text-center">666-666</h2>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- EINDE: BEDANKT -->

            <!-- BEGIN: EINDAFREKENING -->
            <section class="uk-width-3-3">
               <div class="uk-card-default uk-card-small uk-flex uk-flex uk-flex-column uk-flex-between uk-padding-small">
                  <div class="uk-card-header">
                     <h2>Your order contains</h2>
                  </div>
                  <div class="uk-card-body uk-flex uk-flex-column uk-flex-between">
                     <table class="uk-table uk-table-divider uk-width-2-2 order-confirm-table">
                        <thead>
                           <tr>
                                 <th class="uk-width-2-3">Product</th>
                                 <th class="uk-text-center">Price</th>
                                 <th class="uk-text-center">Quantity</th>
                                 <th class="uk-text-right">In Total</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                                 <td class="uk-flex uk-flex-middle uk-gap">
                                    <img class="uk-order-confirm-img" src="" alt="" />
                                    <p class="uk-margin-remove">Name</p>
                                 </td>
                                 <td class="uk-text-center">&euro; 0.00</td>
                                 <td class="uk-text-center">0</td>
                                 <td class="uk-text-right">&euro; 0.00</td>
                           </tr>
                        </tbody>
                        <tfoot>
                           <tr>
                              <td colspan="3" class="uk-text-right uk-text-uppercase">In Total</td>
                              <td class="uk-text-right">&euro; 0.00</td>
                           </tr>
                           <tr>
                              <td colspan="3" class="uk-text-right uk-text-uppercase">Already paid</td>
                              <td class="uk-text-right">&euro; 0.00</td>
                           </tr>
                           <tr>
                              <td colspan="3" class="uk-text-right uk-text-uppercase uk-text-bolder">Still needed to be payed</td>
                              <td class="uk-text-right uk-text-bolder">&euro; 0.00</td>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>
            </section>
            <!-- EINDE: EINDAFREKENING -->
         </div>
      </main>
<?php
require_once("templates/foot.inc.php");
