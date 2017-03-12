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

	include("includes/handle_remove.php");

	$title = $product->name ." dans mon inventaire";
	include("includes/header.php");

?>

<div class="container max-width">

	<h1><?= $product->name; ?></h1>

	<div class="action-buttons">
		<a href="edit.php?p=<?= $product->id ?>">✎ Modifier</a>
		<a href="inventory.php?remove=<?= $product->id ?>">✖ Supprimer</a>
	</div>

	<table class="product-table">
		<tr><th>Description : </th><td><?= $product->description; ?></td></tr>
		<tr><th>Date d'ajout : </th><td><?= $product->add_date; ?></td></tr>
		<tr><th>Catégorie : </th><td><?= $product->category; ?></td></tr>
		<tr><th>Prix : </th><td><?= number_format( $product->price, 2, ',', ' ' ) .'€'; ?></td></tr>
		<tr><th>Promotion : </th><td><?= $product->promo.'%'; ?></td></tr>
		<tr>
			<th>Prix client : </th>
			<td><?=
				number_format(
					(float)$product->price - ( (float)$product->price * (float)$product->promo /100 ),
					2, ',', ' '
				) .'€';
			?></td>
		</tr>
		<tr><th>Restants en stocks : </th><td><?= $product->number_left; ?></td></tr>
	</table>

</div>

<?php
	include("includes/footer.php");
?>
