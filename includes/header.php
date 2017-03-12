<?php
	$page = empty($page) ? '' : $page;
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title><?= $title ?></title>
		<link rel="stylesheet" href="src/css/reset.css"/>
		<link rel="stylesheet" href="src/css/style.css"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:100,400,700" rel="stylesheet">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	</head>
	<body class="<?= $page ?>-page">
		<header>
			<a class="logo" href="index.php">Albert</a>
			<nav>
				<a class="<?= $page=='inventory' ? 'current' : '' ?>" href="inventory.php">☰ Inventaire</a>
				<a class="<?= $page=='add' ? 'current' : '' ?>" href="add.php">+ Nouveau produit</a>
				<a class="<?= $page=='search' ? 'current' : '' ?>" href="search.php">⌕ Recherche</a>
			</nav>
		</header>
