<?php

$errors = array();

if( !empty($_POST) ){

	$name        = trim( $_POST['name'] );
	$description = trim( $_POST['description'] );
	$category    = trim( $_POST['category'] );
	$price       = (float)str_replace('€', '', $_POST['price']);
	$promo       = (float)str_replace('%', '', $_POST['promo']);
  $number      = (int)$_POST['number'];

  if(empty($name))                    $name = $product->name;
  if(empty($category))                $category = "Autre";
  if(empty($price) && $price!='0')    $errors['price'] = "Quel est le prix de ce produit ?";
  if(empty($promo))                   $promo = 0;
  if($promo > 100 || $promo < 0)      $errors['promo'] = "Votre promotion doit être un pourcentage";
  if(empty($number) && $number!='0')  $errors['number'] = "Combien de produits voulez-vous ajouter à votre stock ?";

	if(empty($errors)) {

		$prepare = $pdo->prepare('
      UPDATE products
      SET name = :name, description = :description, category = :category, price = :price, promo = :promo, number_left = :number
      WHERE id = '.$product->id.'
    ');

		// $prepare = $pdo->prepare('
    //   UPDATE products
    //   SET name = :name
    //   WHERE id = '.$product->id.'
    // ');

		$prepare->bindValue('name', $name);
		$prepare->bindValue('description', $description);
		$prepare->bindValue('category', $category);
		$prepare->bindValue('price', $price);
		$prepare->bindValue('promo', $promo);
		$prepare->bindValue('number', $number);

		$prepare->execute();

    echo "<pre>"; print_r('envoyes : n:'.$name.' d:'.$description." c:".$category." p:".$price." pro:".$promo." n:".$number); echo "</pre>";


    //reinit
  	// $_POST['name']        = '';
  	// $_POST['description'] = '';
  	// $_POST['category']    = '';
  	// $_POST['price']       = '';
  	// $_POST['promo']       = '';
    // $_POST['number']      = '';
    $_POST = array();

		// rediriger sur autre page :
		header('Location:product.php?p='.$product->id.'&message=edit_success');
		exit();
	}
  else {
  }

}

else {
  //reinit
  // $_POST['name']        = '';
  // $_POST['description'] = '';
  // $_POST['category']    = '';
  // $_POST['price']       = '';
  // $_POST['promo']       = '';
  // $_POST['number']      = '';
  $_POST = array();
}
