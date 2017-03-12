<table>
	<tr>
		<th class="<?= $sortBy=="name" ? "sorting" : ""?>"><a href="?sortby=name&view=table" title="Trier par nom">Nom</a></th>
		<th class="<?= $sortBy=="description" ? "sorting" : ""?>"><a href="?sortby=description&view=table" title="Trier par description">Description</a></th>
		<th class="<?= $sortBy=="add_date" ? "sorting" : ""?>"><a href="?sortby=add_date&view=table" title="Trier par Date d'ajout">Ajouté le</a></th>
		<th class="<?= $sortBy=="category" ? "sorting" : ""?>"><a href="?sortby=category&view=table" title="Trier par Catégorie">Catégorie</a></th>
		<th class="<?= $sortBy=="price" ? "sorting" : ""?>"><a href="?sortby=price&view=table" title="Trier par Prix">Prix</a></th>
		<th class="<?= $sortBy=="promo" ? "sorting" : ""?>"><a href="?sortby=promo&view=table" title="Trier par Promotion">Promo</a></th>
		<th>Prix client</th>
		<th class="<?= $sortBy=="number_left" ? "sorting" : ""?>"><a href="?sortby=number_left&view=table" title="Trier par nombre restant">Stock</a></th>
		<th>Modifier</th>
	</tr>
	<?php foreach($products as $_product): ?>
		<tr class="<?= $_product->inexact_match ? 'inexact-match' : '' ?>" >
			<td>
				<a href="product.php?p=<?= $_product->id ?>"><?= $_product->name; ?></a>
			</td>
			<td><?=
				strlen($_product->description) > 30 ?
					substr( $_product->description, 0, 27 ).'...' :
					$_product->description;
			?></td>
			<td><?= date( "d/m", strtotime($_product->add_date) ); 		?></td>
			<td><?= $_product->category;		?></td>
			<td><?= number_format( $_product->price, 2, ',', ' ' ) .'€'; ?></td>
			<td><?= '-'.$_product->promo.'%';  ?></td>
			<td><?=
				number_format(
					(float)$_product->price - ( (float)$_product->price * (float)$_product->promo /100 ),
					2, ',', ' '
				) .'€';
			?></td>
			<td><?= $_product->number_left; ?></td>
			<td>
				<a href="edit.php?p=<?= $_product->id ?>">✎</a>
				<a href="?remove=<?= $_product->id ?>">✖</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>
