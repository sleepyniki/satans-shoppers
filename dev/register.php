<?php
require_once("templates/head.inc.php");
if(!isset($_SESSION["error"])){
	$_SESSION["error"] = "none";
}
?>
      <main class="uk-container uk-padding uk-flex uk-flex-middle uk-flex-center">
         <form method="POST" action="src/Formhandlers/register_handler.php" class="uk-width-1-1 uk-flex uk-flex-center">
            <div class="uk-card uk-card-default uk-width-4-5 uk-padding-small">
               <div class="uk-card-header uk-flex uk-gap">
                  <img src="img/logo4.png" class="uk-card-media uk-card-register-logo" alt="Webshop Satan-Shoppers" title="Webshop Satan-Shoppers" />
                  <h2 class="uk-text-uppercase uk-margin-remove-top">Registration</h2>
               </div>
<?php if($_SESSION["error"] != "none"): ?>
               <div class="uk-alert-danger" uk-alert>
                  <a href class="uk-alert-close" uk-close></a>
                  <p>Something went wrong with the registration: <?= $_SESSION["error"] ?></p>
               </div>
<?php endif; ?>
               <div class="uk-card-body uk-flex uk-flex-between uk-card-body-gap">
                  <div class="uk-width-1-1 uk-flex uk-flex-column">
                     <div class="">
                        <label for="username" class="uk-form-label">Username<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                        <input type="text" name="username" class="uk-input" id="username" placeholder="Username..."  <?php if(!empty($_SESSION['register_username'])){ echo "value='" . $_SESSION['register_username'] . "'" ; }?>/>
                        <p class="uk-text-danger uk-text-xsmall uk-text-italic uk-margin-remove-vertical">Fill in</p>
                     </div>
                     <div class="uk-width-1-1 uk-flex uk-flex-column">
                      <label for="fullname" class="uk-form-label">Full Name<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                       <input type="text" name="fullname" class="uk-input" id="fullname" placeholder="Full Name..." <?php if(!empty($_SESSION['register_fullname'])){ echo "value='" . $_SESSION['register_fullname'] . "'" ; }?>/>
                       <p class="uk-text-danger uk-text-xsmall uk-text-italic uk-margin-remove-vertical">Fill in</p>
                     </div>
                     
                     <div class="uk-flex uk-gap uk-margin-top">
                        <div class="uk-width-3-5">
                           <label for="street" class="uk-form-label">Street Name<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                           <input type="text" name="street" class="uk-input" id="street" placeholder="Street Name..." <?php if(!empty($_SESSION['register_street'])){ echo "value='" . $_SESSION['register_street'] . "'" ; }?>/>
                           <p class="uk-text-danger uk-text-xsmall uk-text-italic uk-margin-remove-vertical">Fill in</p>
                        </div>
                        <div class="uk-width-1-5">
                           <label for="housenumber" class="uk-form-label">House Number<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                           <input type="text" name="housenumber" class="uk-input" id="housenumber" placeholder="House Number..." <?php if(!empty($_SESSION['register_housenumber'])){ echo "value='" . $_SESSION['register_housenumber'] . "'" ; }?>/>
                           <p class="uk-text-danger uk-text-xsmall uk-text-italic uk-margin-remove-vertical">Fill in</p>
                        </div>
			<div class="uk-width-1-5">
                           <label for="zipcode" class="uk-form-label">Postal Code<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                           <input type="text" name="zipcode" class="uk-input" id="zipcode" placeholder="Postal Code..." <?php if(!empty($_SESSION['register_zipcode'])){ echo "value='" . $_SESSION['register_zipcode'] . "'" ; }?>/>
                           <p class="uk-text-danger uk-text-xsmall uk-text-italic uk-margin-remove-vertical">Fill in</p>
                        </div>

                     </div>
                     <div class="uk-width-1-1 uk-flex uk-flex-column">
                           <label for="city" class="uk-form-label">City<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                           <input type="text" name="city" class="uk-input" id="city" placeholder="City..." <?php if(!empty($_SESSION['register_city'])){ echo "value='" . $_SESSION['register_city'] . "'" ; }?>/>
                           <p class="uk-text-danger uk-text-xsmall uk-text-italic uk-margin-remove-vertical">Fill in</p>
                     </div>
                     <div class="uk-width-1-1 uk-flex uk-flex-column">
                           <label for="country" class="uk-form-label">Country<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                           <input type="text" name="country" class="uk-input" id="country" placeholder="Country..." <?php if(!empty($_SESSION['register_country'])){ echo "value='" . $_SESSION['register_country'] . "'" ; }?>/>
                           <p class="uk-text-danger uk-text-xsmall uk-text-italic uk-margin-remove-vertical">Fill in</p>
                     </div>
                     <div class="uk-margin-top">
                        <label for="email" class="uk-form-label">Email<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                        <input type="email" name="email" class="uk-input" id="email" placeholder="E-mail Address..." <?php if(!empty($_SESSION['register_email'])){ echo "value='" . $_SESSION['register_email'] . "'" ; }?>/>
                        <p class="uk-text-danger uk-text-xsmall uk-text-italic uk-margin-remove-vertical">Fill in</p>
                     </div>
                     <div class="uk-margin-top">
                        <label for="password" class="uk-form-label">Password<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                        <input type="password" name="password" class="uk-input" id="password" placeholder="Password..." <?php if(!empty($_SESSION['register_password'])){ echo "value='" . $_SESSION['register_password'] . "'" ; }?>/>
                        <p class="uk-text-danger uk-text-xsmall uk-text-italic uk-margin-remove-vertical">Fill in</p>
                     </div>
                     <div class="uk-margin-top">
                        <label for="password-confirm" class="uk-form-label">Password control<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                        <input type="password" name="password_confirm" class="uk-input" id="password-confirm" placeholder="Fill in your password one more time..." <?php if(!empty($_SESSION['register_password_confirm'])){ echo "value='" . $_SESSION['register_password_confirm'] . "'" ; }?>/>
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
