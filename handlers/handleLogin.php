<?php

session_start();

require_once '../clasess/Admin.php';
require_once '../clasess/validation/Validator.php';


use validation\Validator;

if (isset($_POST['submit'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];
  $hashed_password = sha1($password);

  //validation
  $v = new Validator;
  $v->rules('email', $email, ['required', 'email', 'max:100']);
  $v->rules('password', $password, ['required', 'string']);

  $errors = $v->errors;
  //if data is valid
  if ($errors == []) {

    $admin = new Admin;
    $result =  $admin->attempt($email, $hashed_password);

    // if stored successfully
    if ($result !== Null) {


      $_SESSION['id'] = $result['id'];

      $_SESSION['username'] = $result['username'];


      //  var_dump($_SESSION['username']);

      header('location:../index.php');
    } else {
      $_SESSION['errors'] = ['your credentials are not correct '];
      header('location:../login.php');
    }
  } else {
    $_SESSION['errors'] = $errors;
    header('location:../login.php');
  }
} else {
  header('location:../login.php');
}
