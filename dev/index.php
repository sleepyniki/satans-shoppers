<?php
include_once("templates/head.inc.php");
$statement = $conn->prepare('SELECT * FROM products');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

   <main class="uk-container uk-padding">
      <div class="uk-alert-success" uk-alert>
         <a href class="uk-alert-close" uk-close></a>
         <p>Login successful</p>
      </div>
      <div class="uk-grid">
         <section class="uk-width-1-5">
            <h4>Categories</h4>
            <hr class="uk-divider" />
            <div>
               <input class="uk-checkbox" id="Demons" type="checkbox" name="Demons" />
               <label for="chickens">Demons</label>
            </div>
            <div>
               <input class="uk-checkbox" id="Contracts" type="checkbox" name="Contracts" />
               <label for="paint">Contracts</label>
            </div>
            <div>
               <input class="uk-checkbox" id="Summoning" type="checkbox" name="Summoning" />
               <label for="machines">Summoning Materials</label>
            </div>
            <div>
               <input class="uk-checkbox" id="Collectibles" type="checkbox" name="Collectibles" />
               <label for="hokken">Collectibles</label>
            </div>
            <div>
               <input class="uk-checkbox" id="books" type="checkbox" name="books" />
               <label for="hokken">Books</label>
            </div>
         </section>
         <section class="uk-width-4-5">
            <h4 class="uk-text-muted uk-text-small">Chosen categories: <span
                  class="uk-text-small uk-text-primary">All</span></h4>
            <div class="uk-flex uk-flex-home uk-flex-wrap">
            <?php foreach($products as $product): ?>
               <a class="product-card uk-card uk-card-home uk-card-default uk-card-small uk-card-hover"
                  href="product.php?id=<?= $product['id'] ?>">
                  <div class="uk-card-media-top uk-align-center">
                     <img src="<?= 'img/' . $product['image'] ?>" alt="" class="product-image uk-align-center">
                  </div>
                  <div class="uk-card-body uk-card-body-home">
                     <p class="product-card-p"><?= $product['description'] ?></p>
                     <p class="product-card-p uk-text-large uk-text-bold uk-text-danger uk-text-right"> 
                     &euro; <?= $product['price'] ?>
                     </p>
                  </div>
               </a>
            <?php endforeach; ?>
         </section>
<?php
include_once("templates/foot.inc.php");
