<?php
	require_once("includes/connect.php");
	require_once("includes/handle_add.php");

	$title = "Ajouter un produit";
	$page = 'add';
	include("includes/header.php");
?>
<div class="container anim">

	<h1>Ajouter un produit</h1>

	<div id="form">
		<?php
			include("includes/add_form.php");
		?>
	</div>

</div>

<?php
	include("includes/footer.php");
 ?>
