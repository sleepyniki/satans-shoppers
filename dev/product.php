<?php
include_once("templates/head.inc.php");
$product = null;
if(isset($_GET['id'])){
	$sql = "SELECT name, price, description, image FROM products WHERE id = ?";
	$statement = $conn->prepare($sql);
	$statement->execute([$_GET['id']]);
	$product = $statement->fetch();
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
                           <button class="uk-button uk-button-primary">
                              <span uk-icon="icon: cart"></span>
                              Add to cart/In cart
                           </button>
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
