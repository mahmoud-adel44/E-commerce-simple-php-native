<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">online shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="index.php">All Products</a>

        <?php if (isset($_SESSION['id'])) { ?>
          <a class="nav-item nav-link" href="add.php">Add New</a>
        <?php } ?>
      </div>
      <div class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['id'])) { ?>
          <a class="nav-item nav-link disabled" href="#"><?php echo $_SESSION['username']; ?></a>
          <a class="nav-item nav-link" href="handlers/handleLogout.php">Logout</a>
        <?php } ?>
      </div>

    </div>
  </nav>