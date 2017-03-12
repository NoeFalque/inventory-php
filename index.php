<?php
	include("includes/settings.php");
	require_once("includes/connect.php");
	require_once("includes/handle_add.php");

	$title = "Bienvenue";
	$page = "home";
	include("includes/header.php");

?>

<div class="container">
	<p class="big anim timed">Bonjour <?= $username ?>, je suis Albert, votre assistant virtuel.</p>
	<p class="big anim timed">Je vais vous aider à gérer vos stocks en toute simplicité.</p>
	<p class="big anim timed">Et si vous commenciez à ajouter votre premier produit ?</p>
	<div class="anim timed" id="form">

		<?php
			include("includes/add_form.php");
		?>

	</div>
</div>

<?php
	include("includes/footer.php");
 ?>
