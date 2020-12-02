<?php

session_start();
require_once '../clasess/Product.php';

require_once '../clasess/helpers/Image.php';

require_once '../clasess/validation/Validator.php';

use helpers\Image;
use validation\Validator;

if (!isset($_SESSION['id'])) {
  header('location:../login.php');
  die();
}

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $info = $_POST['info'];
  $price = $_POST['price'];
  $img = $_FILES['img'];

  //validation
  $v = new Validator;
  $v->rules('name', $name, ['required', 'string', 'max:100']);
  $v->rules('info', $info, ['required', 'string']);
  $v->rules('price', $price, ['required', 'numeric']);
  $v->rules('img', $img, ['required-image', 'image']);
  $errors = $v->errors;

  if ($errors == []) {

    $image = new Image($img);

    $data = [
      'name' => $name,
      'info' => $info,
      'price' => $price,
      'img' => $image->new_name

    ];
    $prod = new Product;
    $result = $prod->store($data);

    if ($result == true) {

      $image->upload();
      header('location:../index.php');
    } else {
      $_SESSION['errors'] = ['error storing in database'];
      header('location:../add.php');
    }
  } else {
    $_SESSION['errors'] = $errors;
    header('location:../add.php');
  }
} else {
  header('location:../add.php');
}
