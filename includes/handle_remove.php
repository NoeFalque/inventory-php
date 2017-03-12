<?php

if( !empty($_GET['remove']) ){

  $p = $_GET['remove'];

  $prepare = $pdo->prepare('DELETE FROM products WHERE id = :product');
  $prepare->bindValue('product', $p);
  $prepare->execute();

  header('Location: ?message=remove_success');
  exit;

}
