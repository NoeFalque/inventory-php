<?php
	include("includes/connect.php");

	$sortBy = empty($_GET['sortby']) ? 'id' : (string)$_GET['sortby'];

  $view = empty($_GET['view']) ? 'list' : (string)$_GET['view'];

	$query = $pdo->query('SELECT * FROM products ORDER BY '.(string)$sortBy);
	$products = $query->fetchAll();

	include("includes/handle_remove.php");
	include("includes/settings.php");

	$title = "Mon inventaire";
	$page = "inventory";
	include("includes/header.php");

?>


<?php
	if( !empty($_GET['message']) ){
		if($_GET['message']=='add_success') echo '<div class="messages"><span>Le produit a bien été ajouté !</span></div>';
		if($_GET['message']=='remove_success') echo '<div class="messages"><span>Le produit a bien été supprimé !</span></div>';
	}
?>

<div class="container anim">
	<h1>Bonjour <?= $username ?>, voici votre stock :</h1>

  <div class="action-buttons">
    <a href="?view=list">☰ Liste</a>
    <a href="?view=table&sortby=<?= $sortBy ?>">☷ Tableau</a>
  </div>

	<?php
		if($view == 'table') include("includes/table.php");
		else include("includes/list.php");
	?>

</div>

<?php
	include("includes/footer.php");
?>
