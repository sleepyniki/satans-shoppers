<?php
include_once("templates/head.inc.php");
$sql = "SELECT name, price, description, image FROM products WHERE id = ?";
$statement = $conn->prepare($sql);
if(!isset($_GET['id'])){
	$statement->execute([$_GET['id']]);
	$product = $statement->fetch();
}
?>
      <main class="uk-container uk-padding">
         <div class="uk-grid">
            <section class="uk-width-1">
               <div class="uk-grid uk-card uk-card-default">
<? if(!empty($product)): ?>
                  <section class="uk-width-1-2 uk-card-media-left">
                     <img src="<?= $statement['image'] ?>" class="" alt="" title="" />
                  </section>
                  <section class="uk-width-1-2 uk-card-body uk-flex uk-flex-column uk-flex-between">
                     <div class="">
                        <h1><?= $statement['name'] ?></h1>
                        <p class="">
<?= $statement['description'] ?>
                        </p>
                     </div>
                     <div class="uk-flex uk-flex-between uk-flex-middle">
                        <div class="price-block">
                           <p class="product-view__price uk-text-bold uk-text-danger uk-text-left uk-text-bolder">&euro; <?= $statement['price'] ?></p>
                        </div>
                        <div>
                           <button class="uk-button uk-button-primary">
                              <span uk-icon="icon: cart"></span>
                              Add to cart/In cart
                           </button>
                        </div>   
                     </div>
                  </section>
               </div>
            </section>
<?
else:
	echo "<h1>Product not found</h1>"; 
endif;
?>
         </div>
      </main>
<?php
include_once("templates/foot.inc.php");
