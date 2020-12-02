<?php


session_start();
if(isset($_SESSION['id']))
{
  header('location:index.php');
  
}
?>


<?php include 'inc/header.php'; ?>

<div class="container my-5">

  <div class="row">

    <div class="col-lg-6 offset-lg-3">

      <?php if (isset($_SESSION['errors'])) { ?>
        <div class="alert alert-danger">
          <?php foreach ($_SESSION['errors'] as $error) { ?>
            <p class="text-center mb-0"><?php echo $error; ?></p>
          <?php } ?>
        </div>
      <?php } ?>

      <?php unset($_SESSION['errors']); ?>



      <form action="handlers/handleLogin.php" method="POST" >
        <div class="form-group">

          <input type="email" class="form-control" placeholder="email" name="email">
        </div>
        <div class="form-group">

          <input type="password" class="form-control" placeholder="password" name="password">
        </div>

        <div class="form-group text-center">
          <button type="submit" class="btn btn-primary" name="submit">Add</button>
        </div>

      </form>


    </div>

  </div>
</div>


<?php include 'inc/footer.php'; ?>