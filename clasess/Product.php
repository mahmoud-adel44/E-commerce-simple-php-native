<?php
// session_start();
require_once 'MySql.php';

class Product extends MySql
{

  //get all
  public function getAll()
  {
    $query = "SELECT * FROM products";
    $result = $this->connect()->query($query);

    $products = [];

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($products, $row);
      }
    }
    return $products;
  }

  //get one
  public function getOne($id)
  {
    $query = "SELECT * FROM products 
    WHERE id ='$id' 
    ";
    $result = $this->connect()->query($query);
    $product = null;
    if ($result->num_rows == 1) {
      $product = $result->fetch_assoc();
    }
    return $product;
  }
  public function store(array $data)
  {
    $data['name'] = mysqli_real_escape_string($this->connect(), $data['name']);
    $data['info'] = mysqli_real_escape_string($this->connect(), $data['info']);

    $query = "INSERT INTO products(`name`,`info`,`price`,`img`,`created_at`)
    VALUES('{$data['name']}','{$data['info']}','{$data['price']}','{$data['img']}', NOW())";

    $result =  $this->connect()->query($query);
    if ($result === true) {
      return true;
    }
    return false;
  }

  //edit 
  public function update($id, array $data)
  {
    $data['name'] = mysqli_real_escape_string($this->connect(), $data['name']);
    $data['info'] = mysqli_real_escape_string($this->connect(), $data['info']);
    $query = "UPDATE products SET 
    `name`='{$data['name']}',
    `info`='{$data['info']}',
    `price`='{$data['price']}'
    WHERE id= $id  ";
    $result =  $this->connect()->query($query);
    if ($result == true) {
      return true;
    }
    return false;
  }

  //delete
  public function delete($id)
  {
    $query = "DELETE FROM products where id= '$id'";
    $result =  $this->connect()->query($query);
    if ($result == true) {
      return true;
    }
    return false;
  }
}
