<?php

session_start();

require_once '../clasess/Product.php';

if (!isset($_SESSION['id'])) {
  header('location:../login.php');
  die();
}

$id = $_GET['id'];

$prod = new Product;
$product = $prod->getOne($id);
$img = $product['img'];


unlink('../images/' . $img);
$result = $prod->delete($id);

if ($result == true) {
} else {
}
header('location: ../index.php');
