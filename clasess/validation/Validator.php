<?php

namespace validation;

require_once 'ValidationInterface.php';
require_once 'Email.php';
require_once 'Numeric.php';
require_once 'Str.php';
require_once 'Required.php';
require_once 'Max.php';
require_once 'RequiredImage.php';
require_once 'Image.php';


class Validator
{

  public $errors = [];

  private function MakeValidation(ValidationInterface $v)
  {
    return $v->validate();
  }

  public function rules($name, $value, array $rules)
  {
    foreach ($rules as $rule) {
      if ($rule == 'required') {
        $error = $this->MakeValidation(new Required($name, $value));
      } else if ($rule == 'string') {
        $error = $this->MakeValidation(new Str($name, $value));
      } else if ($rule == 'email') {
        $error = $this->MakeValidation(new Email($name, $value));
      } else if ($rule == 'max:100') {
        $error = $this->MakeValidation(new Max($name, $value));
      } else if ($rule == 'numeric') {
        $error = $this->MakeValidation(new Numeric($name, $value));
      } else if ($rule == 'required-image') {
        $error = $this->MakeValidation(new RequiredImage($name, $value));
      } else if ($rule == 'image') {
        $error = $this->MakeValidation(new Image($name, $value));
      } else {
        $error = '';
      }

      if ($error !== '') {
        array_push($this->errors, $error);
      }
    }
  }
}
