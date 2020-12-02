<?php
session_start();
if(!isset($_SESSION['id']))
{
  header('location:login.php');
}
include "inc/header.php";

require_once 'clasess/Product.php';

$id = $_GET['id'];

$prod = new Product;
$product = $prod->getOne($id);


?>




<div class="container my-5">

  <div class="row">

    <div class="col-lg-6 offset-lg-3">
      <?php if (isset($_SESSION['errors'])) { ?>
        <div class="alert alert-danger">
          <?php foreach ($_SESSION['errors'] as $error) { ?>
            <p class="text-center mb-0"><?php echo $error ;?></p>
          <?php } ?>
        </div>
      <?php } ?>

      <?php unset($_SESSION['errors']); ?>


      <form action="handlers/handlerEdit.php?id=<?php echo $product['id']; ?>" method="POST">
        <div class="form-group">

          <input type="text" class="form-control" placeholder="name" name="name" value="<?php echo $product['name']; ?>">
        </div>
        <div class="form-group">

          <input type="number" class="form-control" placeholder="price" value="<?php echo $product['price']; ?>" name="price">
        </div>



        <div class="form-group">

          <textarea class="form-control" rows="6" placeholder="desc" name="info"><?php echo $product['info']; ?></textarea>
        </div>



        <div class="form-group text-center">
          <button type="submit" name="submit" class="btn btn-success">Update</button>
        </div>

      </form>


    </div>

  </div>
</div>


<?php include 'inc/footer.php'; ?>