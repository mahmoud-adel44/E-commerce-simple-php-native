<?php
session_start();
require_once 'clasess/Product.php';
require_once 'clasess/Str.php';

$prod = new Product;
$products = $prod->getAll();


?>


<?php include 'inc/header.php'; ?>

<div class="container my-5">

  <div class="row">

    <?php if ($products !== []) { ?>
      <?php foreach ($products as $product) { ?>
        <div class="col-lg-4 mb-3">


          <div class="card ">
            <img class="card-img-top" src="images/<?php echo $product['img']; ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $product['name']; ?></h5>
              <p class="text-muted">$<?php echo $product['price']; ?></p>
              <p class="card-text"><?php echo Str::limit($product['info']); ?></p>


              <a href="show.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">show</a>
              <?php if (isset($_SESSION['id'])) { ?>
                <a href="edit.php?id=<?php echo $product['id']; ?>" class="btn btn-info">Edit</a>
                <a href="handlers/handlerDelete.php?id=<?php echo $product['id']; ?>" class="btn btn-danger">Delete</a>
              <?php } ?>

            </div>
          </div>


        </div>
      <?php } ?>
    <?php } else { ?>
      <p>No product Found</p>
    <?php } ?>




  </div>
</div>


<?php include 'inc/footer.php'; ?>