<?php

	include("includes/connect.php");

	$p = empty($_GET['p']) ? '' : (int)$_GET['p'];

	if( gettype($p) != "integer") header('Location: 404.php');

	// $prepare = $pdo->prepare('SELECT * FROM products WHERE id = :product');
	// // $prepare->bindValue(':product', $p);
	// echo "<pre>"; print_r($prepare); echo "</pre>";
	// $exec = $prepare->execute(array(':product'=>$p));
	// echo "<pre>"; print_r($exec); echo "</pre>";
	// $product = $exec->fetchAll();

	$query = $pdo->query('SELECT * FROM products WHERE id = '.$p);
	$product = $query->fetch();

	if( empty($product) ){
		header('Location: 404.php');
		exit;
	}

  include("includes/handle_edit.php");

	$title = "Modifier ".$product->name;
	include("includes/header.php");

?>

<div id="form">
  <h1>Modifier <?= $product->name; ?></h1>


  <?= !empty($errors) ? "<p>Oops, voici quelques erreurs à régler avant de continuer :</p>" : "" ?>

  <form class="" action="#" method="post">
  	<div class="input-group name <?=array_key_exists('name', $errors) ? 'error' : "" ?>">
  		<label for="name">Nom</label>
  		<input type="text" name="name" id="name" value="<?= $_POST['name'] ?? $product->name ?>"/>
  		<?=array_key_exists('name', $errors) ? $errors['name'] : "" ?>
  	</div>
  	<div class="input-group description">
  		<label for="description">Description</label>
  		<textarea type="text" name="description" id="description"><?= $_POST['description'] ?? $product->description ?></textarea>
  	</div>
  	<div class="input-group category">
  		<label for="category">Catégorie</label>
  		<input type="text" name="category" id="category" value="<?= $_POST['category'] ?? $product->category ?>"/>
  	</div>
  	<div class="input-group small price <?=array_key_exists('price', $errors) ? 'error' : "" ?>">
  		<label for="price">Prix</label>
  		<input type="number" step="0.01" min="0" name="price" id="price" value="<?= $_POST['price'] ?? $product->price ?>"/>€
  		<?=array_key_exists('price', $errors) ? $errors['price'] : "" ?>
  	</div>
  	<div class="input-group small promo">
  		<label for="promo">Pourcentage de réduction</label>
  		<input type="number" step="any" min="0" max="100" name="promo" id="promo" value="<?= $_POST['promo'] ?? $product->promo ?>"/>%
  	</div>
  	<div class="input-group small number <?=array_key_exists('number', $errors) ? 'error' : "" ?>">
  		<label for="number">Nombre à ajouter</label>
  		<input type="number" min="0" name="number" id="number" value="<?= $_POST['number'] ?? $product->number_left ?>"/>
  		<?=array_key_exists('number', $errors) ? $errors['number'] : "" ?>
  	</div>
  	<input type="submit" value="Enregistrer"/>
    <a href="product.php?p=<?= $product->id ?>">Annuler</a>
  </form>
</div>



<?php
	include("includes/footer.php");
?>
