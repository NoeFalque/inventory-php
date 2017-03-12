<?php
	include("includes/connect.php");

  $view = empty($_GET['view']) ? 'list' : (string)$_GET['view'];

	$search = empty($_GET['search']) ? ' ' : (string)$_GET['search'];
  $products = array();

  for($i = strlen($search); $i > 0; $i--) { //searches in the results matching the i first characters of the query
    $subSearch = substr($search, 0, $i);
    $columns = array('name', 'description', 'category', 'price');
    foreach ($columns as $_column) { // searches for each column from most to least important
    	$query = $pdo->query('SELECT * FROM products WHERE '. $_column .' LIKE "%'. $subSearch .'%" ORDER BY add_date DESC');
      while($_result = $query->fetch()){
        if( !in_array($_result, $products) ){
          if($subSearch != $search) $_result->inexact_match = 1; // fade results that dont match exactly the query
          array_push($products, $_result); // store results to display them into table.php
        }
      }
    }
  }

	include("includes/handle_remove.php");
	include("includes/settings.php");

	$title = "Recherche";
	$page = "search";
	include("includes/header.php");

?>

<div class="container anim">
  <form class="" action="#" method="get">
    <h1 class="search big">
      <label for="search">⌕</label>
      <input id="search" type="search" name="search" value="<?=$_GET['search'] ?? '';?>" placeholder="Rechercher un produit, un prix, une catégorie..."/>
      <input type="submit" value="Rechercher"/>
    </h1>
  </form>

  <div class="action-buttons">
    <a href="?view=list&search=<?= $search ?>">☰ Liste</a>
    <a href="?view=table&search=<?= $search ?>">☷ Tableau</a>
  </div>

	<?php
		if($view == 'table') include("includes/table.php");
		else include("includes/list.php");
	?>

</div>

<?php
	include("includes/footer.php");
?>
