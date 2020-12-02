<?php 
session_start();
require_once 'clasess/Product.php';

$id= $_GET['id'];

$prod = new Product;
$product = $prod->getOne($id);


?>


<?php include 'inc/header.php'; ?>

<div class="container my-5">

  <div class="row">

  <?php if($product !== null){ ?>
    <div class="col-lg-6">
      <img class="img-fluid" src="images/<?php echo $product['img']; ?>" alt="Card image cap">
    </div>
    <div class="col-lg-6">
      <h5 class="card-title"><?php echo $product['name']; ?></h5>
      <p class="text-muted">$<?php echo $product['price']; ?></p>
      <p class="card-text"><?php echo $product['info']; ?></p>

        <a href="index.php" class="btn btn-primary">Back</a>
        <?php if (isset($_SESSION['id'])) { ?>

        <a href="edit.php?id=<?php echo $product['id']; ?>" class="btn btn-info">Edit</a>
        <a href="handlers/handlerDelete.php?id=<?php echo $product['id']; ?>" class="btn btn-danger">Delete</a>
        <?php } ?>
    </div>
    <?php  }else  { ?>
        <p>No product Found</p>
      <?php } ?>
  </div>
</div>


<?php include 'inc/footer.php'; ?>