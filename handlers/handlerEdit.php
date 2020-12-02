<?php

session_start();
require_once '../clasess/Product.php';
require_once '../clasess/validation/Validator.php';

use validation\Validator;

if (!isset($_SESSION['id'])) {
  header('location:../login.php');
  die();
}

if (isset($_POST['submit'])) {
  $id = $_GET['id'];

  $name = $_POST['name'];
  $info = $_POST['info'];
  $price = $_POST['price'];

  // $img = $_FILES['img'];

  $v = new Validator;
  $v->rules('name', $name, ['required', 'string', 'max:100']);
  $v->rules('info', $info, ['required', 'string']);
  $v->rules('price', $price, ['required', 'numeric']);

  $errors = $v->errors;



  if ($errors == []) {

    $data = [
      'name' => $name,
      'info' => $info,
      'price' => $price


    ];
    $prod = new Product;
    $result = $prod->update($id, $data);

    if ($result === true) {

      header('location: ../show.php?id=' . $id);
    } else {
      $_SESSION['errors'] = ['error Updating in database'];
      header('location:../edit.php?id=' . $id);
    }
  } else {
    $_SESSION['errors'] = $errors;
    header('location:../edit.php?id=' . $id);
  }
} else {

  header('location:../index.php');
}
