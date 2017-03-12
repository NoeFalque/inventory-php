<?=
!empty($errors) ? '<p class="error-message anim">Oops, voici quelques erreurs à régler avant de continuer :</p>' : '' ?>

<form class="" action="#form" method="post">
	<div class="input-group name <?=array_key_exists('name', $errors) ? 'error' : "" ?>">
		<label for="name">*Nom</label>
		<input type="text" name="name" id="name" value="<?= $_POST['name'] ?? '' ?>"/>
		<span class="field-error"><?=array_key_exists('name', $errors) ? $errors['name'] : "" ?></span>
	</div>
	<div class="input-group description">
		<label for="description">Description</label>
		<textarea type="text" name="description" id="description"><?= $_POST['description'] ?? '' ?></textarea>
	</div>
	<div class="input-group category">
		<label for="category">Catégorie</label>
		<input type="text" name="category" id="category" value="<?= $_POST['category'] ?? '' ?>"/>
	</div>
	<div class="input-group small price <?=array_key_exists('price', $errors) ? 'error' : "" ?>">
		<label for="price">Prix</label>
		<input type="number" step="0.01" min="0" name="price" id="price" value="<?= $_POST['price'] ?? '' ?>"/>€
		<span class="field-error"><?=array_key_exists('price', $errors) ? $errors['price'] : "" ?></span>
	</div>
	<div class="input-group small promo">
		<label for="promo">Pourcentage de réduction</label>
		<input type="number" step="any" min="0" max="100" name="promo" id="promo" value="<?= $_POST['promo'] ?? '' ?>"/>%
	</div>
	<div class="input-group small number <?=array_key_exists('number', $errors) ? 'error' : "" ?>">
		<label for="number">Nombre</label>
		<input type="number" min="0" name="number" id="number" value="<?= $_POST['number'] ?? '' ?>"/>
		<span class="field-error"><?=array_key_exists('number', $errors) ? $errors['number'] : "" ?></span>
	</div>
	<input type="submit" value="Enregistrer"/>
</form>
