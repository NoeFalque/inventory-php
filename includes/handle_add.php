<?php

$postFields = array('name', 'description', 'category', 'price', 'promo', 'number');
//reinit tout :
function reinitPost(){
  if (is_array($_POST) || is_object($_POST)){
    foreach($_POST as $_prop => $_value){
      $_POST[$_prop] = '';
    }
  }
}
// function reinitPost(){
//   if (is_array($_POST) || is_object($_POST)){
//     foreach($postFields as $_value){
//       $_POST[$_value] = '';
//     }
//   }
// }

$errors = array();

if( !empty($_POST) ){

	$name        = trim( $_POST['name'] );
	$description = trim( $_POST['description'] );
	$category    = trim( $_POST['category'] );
	$price       = (float)str_replace('€', '', $_POST['price']);
	$promo       = (float)str_replace('%', '', $_POST['promo']);
  $number      = (int)$_POST['number'];

  if(empty($name))                    $errors['name'] = "N'oubliez pas de définir un nom pour votre produit";
  if(empty($category))                $category = "Autre";
  if(empty($price) && $price!='0')    $errors['price'] = "Quel est le prix de ce produit ?";
  if(empty($promo))                   $promo = 0;
  if($promo > 100 || $promo < 0)      $errors['promo'] = "Votre promotion doit être un pourcentage";
  if(empty($number) && $number!='0')  $errors['number'] = "Combien de produits voulez-vous ajouter à votre stock ?";

	if(empty($errors)) {

    //UPDATE membre_profil SET msg_nb= msg_nb + 1 WHERE name = ?
    //number_format($number, 2, ',', ' ');
    //money_format('€ %!n', $_POST['price'])
    //$price       = number_format($price, 2, '.', '');

		// $prepare = $pdo->prepare('INSERT INTO products (name, description, category, price, promo, number) VALUES (:name, :description, :category, :price, :promo, :number)');
		$prepare = $pdo->prepare('INSERT INTO products (name, description, category, price, promo, number_left) VALUES (:name, :description, :category, :price, :promo, :nb)');

		$prepare->bindValue('name', $name);
		$prepare->bindValue('description', $description);
		$prepare->bindValue('category', $category);
		$prepare->bindValue('price', $price);
		$prepare->bindValue('promo', $promo);
		$prepare->bindValue('nb', $number);

		$prepare->execute();

    echo "<pre>"; print_r('envoyes : n:'.$name.' d:'.$description." c:".$category." p:".$price." pro:".$promo." n:".$number); echo "</pre>";


    //reinit
  	$_POST['name']        = '';
  	$_POST['description'] = '';
  	$_POST['category']    = '';
  	$_POST['price']       = '';
  	$_POST['promo']       = '';
    $_POST['number']      = '';

		// rediriger sur autre page :
		header('Location:inventory.php?message=add_success');
		exit(); // éviter que tout le reste s'exécute
	}
  else {
  }

}

else {
  //reinit
  $_POST['name']        = '';
  $_POST['description'] = '';
  $_POST['category']    = '';
  $_POST['price']       = '';
  $_POST['promo']       = '';
  $_POST['number']      = '';
}
