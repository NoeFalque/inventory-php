<ul class="list">
	<?php foreach($products as $_product): ?>
		<li class="<?= $_product->inexact_match ? 'inexact-match' : '' ?>" >
			<span>
				<a href="product.php?p=<?= $_product->id ?>"><?= $_product->name; ?></a>
			</span>
			<span> (<?= $_product->number_left; ?> restant<?= $_product->number_left>1 ? 's' : '' ?>) </span>
			<span class="action">
				<a href="edit.php?p=<?= $_product->id ?>"> ✎ </a>
				<a href="?remove=<?= $_product->id ?>">  ✖</a>
			</span>
		</li>
	<?php endforeach ?>
</ul>
