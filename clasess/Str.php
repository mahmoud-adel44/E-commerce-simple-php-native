<?php

// session_start();
class Str
{

  public function limit($str)
  {

    if (strlen($str) > 20) {
      $str = substr($str, 0, 30) . '...';
    }
    return $str;
  }
}
