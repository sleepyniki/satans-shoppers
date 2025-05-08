<?php
require_once("templates/head.inc.php");
?>
      <main class="uk-container uk-padding uk-flex uk-flex-middle uk-flex-center">
         <form method="POST" action="" class="uk-width-1-1 uk-flex uk-flex-center">
            <div class="uk-card uk-card-default uk-width-4-5 uk-padding-small">
               <div class="uk-card-header uk-flex uk-gap">
                  <img src="img/logo4.png" class="uk-card-media uk-card-register-logo" alt="Webshop Satan-Shoppers" title="Webshop Satan-Shoppers" />
                  <h2 class="uk-text-uppercase uk-margin-remove-top">Registration</h2>
               </div>
               <div class="uk-alert-danger" uk-alert>
                  <a href class="uk-alert-close" uk-close></a>
                  <p>Something went wrong with the registration</p>
               </div>
               <div class="uk-card-body uk-flex uk-flex-between uk-card-body-gap">
                  <div class="uk-width-1-1 uk-flex uk-flex-column">
                     <div class="">
                        <label for="firstname" class="uk-form-label">First Name<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                        <input type="text" name="firstname" class="uk-input" id="firstname" placeholder="First Name..." />
                        <p class="uk-text-danger uk-text-xsmall uk-text-italic uk-margin-remove-vertical">Fill in</p>
                     </div>
                     <div class="uk-flex uk-gap uk-margin-top">
                        <div class="uk-width-1-5">
                           <label for="prefixes" class="uk-form-label">Prefixes</label>
                           <input type="text" name="prefixes" class="uk-input" id="prefixes" placeholder="Prefixes..." />
                        </div>
                        <div class="uk-width-4-5">
                           <label for="lastname" class="uk-form-label">Last Name<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                           <input type="text" name="lastname" class="uk-input" id="lastname" placeholder="Last Name..." />
                           <p class="uk-text-danger uk-text-xsmall uk-text-italic uk-margin-remove-vertical">Fill in</p>
                        </div>
                     </div>
                     
                     <div class="uk-flex uk-gap uk-margin-top">
                        <div class="uk-width-3-5">
                           <label for="street" class="uk-form-label">Street Name<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                           <input type="text" name="street" class="uk-input" id="street" placeholder="Street Name..." />
                           <p class="uk-text-danger uk-text-xsmall uk-text-italic uk-margin-remove-vertical">Fill in</p>
                        </div>
                        <div class="uk-width-1-5">
                           <label for="housenumber" class="uk-form-label">House Number<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                           <input type="text" name="housenumber" class="uk-input" id="housenumber" placeholder="House Number..." />
                           <p class="uk-text-danger uk-text-xsmall uk-text-italic uk-margin-remove-vertical">Fill in</p>
                        </div>
                        <div class="uk-width-1-5">
                           <label for="addition" class="uk-form-label">Additions</label>
                           <input type="text" name="addition" class="uk-input" id="addition" placeholder="Additions..." />
                        </div>
                     </div>
                     <div class="uk-flex uk-gap uk-margin-top">
                        <div class="uk-width-1-5">
                           <label for="zipcode" class="uk-form-label">Postal Code<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                           <input type="text" name="zipcode" class="uk-input" id="zipcode" placeholder="Postal Code..." />
                           <p class="uk-text-danger uk-text-xsmall uk-text-italic uk-margin-remove-vertical">Fill in</p>
                        </div>
                        <div class="uk-width-4-5">
                           <label for="city" class="uk-form-label">Country<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                           <input type="text" name="city" class="uk-input" id="city" placeholder="Country..." />
                           <p class="uk-text-danger uk-text-xsmall uk-text-italic uk-margin-remove-vertical">Fill in</p>
                        </div>
                     </div>
                     <div class="uk-margin-top">
                        <label for="email" class="uk-form-label">Email<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                        <input type="email" name="email" class="uk-input" id="email" placeholder="E-mail Address..." />
                        <p class="uk-text-danger uk-text-xsmall uk-text-italic uk-margin-remove-vertical">Fill in</p>
                     </div>
                     <div class="uk-margin-top">
                        <label for="password" class="uk-form-label">Password<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                        <input type="password" name="password" class="uk-input" id="password" placeholder="Password..." />
                        <p class="uk-text-danger uk-text-xsmall uk-text-italic uk-margin-remove-vertical">Fill in</p>
                     </div>
                     <div class="uk-margin-top">
                        <label for="password-confirm" class="uk-form-label">Password controle<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                        <input type="password" name="password_confirm" class="uk-input" id="password-confirm" placeholder="Fill in your password one more time..." />
                        <p class="uk-text-danger uk-text-xsmall uk-text-italic uk-margin-remove-vertical">The passwords do not match</p>
                     </div>
                  </div>
               </div>
               <div class="uk-card-footer uk-flex uk-flex-between">
                  <a href="login.php" class="">Log in</a>
                  <button class="uk-button uk-button-primary" type="submit">Register</button>
               </div>
            </div>
         </form>
      </main>
<?php
require_once("templates/foot.inc.php");
