<?php

require_once 'MySql.php';

class Admin extends MySql
{
  public function attempt($email, $hased_password)
  {



    $query = "SELECT * FROM users 
    WHERE email = '$email' AND `password` = '$hased_password' ";

    $result = $this->connect()->query($query);

    $user = null;

    if ($result->num_rows == 1) {
      $user = $result->fetch_assoc();
    }
    return $user;
  }
}
