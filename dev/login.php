<?php
require_once("templates/head.inc.php");
if(empty($_SESSION['error_login']) || !isset($_SESSION['error_login'])){
	$_SESSION['error_login'] = "none";
}
?>
      <main class="uk-container uk-padding uk-flex uk-flex-middle uk-flex-center">
         <form method="POST" action="src/Formhandlers/Login_handler.php" class="uk-width-1-1 uk-flex uk-flex-center">
            <div class="uk-card uk-card-default uk-width-3-5 uk-padding-small">
               <div class="uk-card-header">
                  <h2 class="uk-text-uppercase">Log In</h2>
               </div>
<?php if($_SESSION['error_login'] != "none"): ?>
               <div class="uk-alert-danger" uk-alert>
                  <a href class="uk-alert-close" uk-close></a>
                  <p>Something went wrong with the login: <?= $_SESSION['error_login'] ?></p>
               </div>
<?php endif; ?>
               <div class="uk-card-body uk-flex uk-flex-between uk-card-body-gap">
                  <div class="uk-width-1-3">
                     <img src="img/logo4.png" class="uk-card-media uk-card-body-login-logo" alt="Satan's Shoppers" title="Satan's Shoppers" />
                     <div class="uk-flex uk-flex-column uk-flex-middle">
                        <h4 class="uk-text-uppercase uk-text-center uk-margin-remove-vertical uk-text-muted">Satan's Shoppers</h4>
                     </div>
                  </div>
                  <div class="uk-width-2-3 uk-flex uk-flex-column">
                     <div class="uk-padding">
                        <label for="email" class="uk-form-label">Email<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                        <input type="email" name="email" class="uk-input" id="email" <?php if(!empty($_SESSION['login_email'])){echo "value='" . $_SESSION['login_email'] . "'"; } ?> placeholder="E-mail address..." />
                     </div>
                     <div class="uk-padding">
                        <label for="password" class="uk-form-label">Password<span class="uk-text-xsmall uk-text-italic uk-text-primary"> (required)</span></label>
                        <input type="password" name="password" class="uk-input" id="password" <?php if(!empty($_SESSION['login_password'])){echo "value='" . $_SESSION['login_password'] . "'"; } ?> placeholder="Password..." />
                     </div>
                  </div>
               </div>
               <div class="uk-card-footer uk-flex uk-flex-between">
                  <a href="#" class="">Forgot your password?</a>
                  <button class="uk-button uk-button-primary" type="submit">Log In</button>
               </div>
            </div>
         </form>
      </main>
<?php
require_once("templates/foot.inc.php");
