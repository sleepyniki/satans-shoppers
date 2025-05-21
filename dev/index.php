<?php
include_once("templates/head.inc.php");

$category="";

if(empty($_GET['category']) || !isset($_GET['category'])){
	header("Location: index.php?category=all");
	exit;
} 

if($_GET['category'] == "demons"){
	$category="1";
}
if($_GET['category'] == "contracts"){
	$category="2";
}
if($_GET['category'] == "materials"){
	$category="3";
}
if($_GET['category'] == "collectibles"){
	$category="4";
}
if($_GET['category'] == "books"){
	$category="5";
}

if($category == ""){
	$statement = $conn->prepare("SELECT * FROM products");
	$statement->execute();
}
else{
	$statement = $conn->prepare("SELECT * FROM products WHERE category_id = ?");
	$statement->execute([$category]);
}

$products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

   <main class="uk-container uk-padding">
      <div class="uk-grid">
         <section class="uk-width-1-5">
            <h4>Categories</h4>
            <hr class="uk-divider" />
<a class="uk-link-text" href="?category=all">All</a>
<br>
<a class="uk-link-text" href="?category=demons">Demons</a>
<br>
<a class="uk-link-text" href="?category=contracts">Contracts</a>
<br>
<a class="uk-link-text" href="?category=materials">Summoning Materials</a>
<br>
<a class="uk-link-text" href="?category=collectibles">Collectibles</a>
<br>
<a class="uk-link-text" href="?category=books">Books</a>
         </section>
         <section class="uk-width-4-5">
            <div class="uk-flex uk-flex-home uk-flex-wrap">
            <?php foreach($products as $product): ?>
               <a class="product-card uk-card uk-card-home uk-card-default uk-card-small uk-card-hover"
                  href="product.php?id=<?= $product['id'] ?>">
                  <div class="uk-card-media-top uk-align-center">
                     <img src="<?= 'img/' . $product['image'] ?>" alt="" class="product-image uk-align-center">
                  </div>
                  <div class="uk-card-body uk-card-body-home">
                     <p class="product-card-p"><?= $product['name'] ?></p>
                     <p class="product-card-p uk-text-large uk-text-bold uk-text-danger uk-text-right"> 
                     &euro; <?= $product['price'] ?>
                     </p>
                  </div>
               </a>
            <?php endforeach; ?>
         </section>
<?php
include_once("templates/foot.inc.php");
