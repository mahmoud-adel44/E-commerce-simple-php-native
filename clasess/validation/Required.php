<?php

namespace validation;

require_once 'ValidationInterface.php';
class Required implements ValidationInterface
{
  private $name;
  private $value;
  public function __construct($name, $value)
  {
    $this->name = $name;
    $this->value = $value;
  }
  public function validate()
  {
    if (strlen($this->value) == 0) {
      return "$this->name is required";
    } else {
      return '';
    }
  }
}
