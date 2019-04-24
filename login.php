


<?php include_once "templates/head.php" ?>

  <!-- Navigation -->
  <?php include_once "templates/mainNav.php"?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="bg-success my-5 py-2 text-light col-md-10 offset-md-1">
      
      <?php 
                $email="";
                $pass="";
                if (isset($_GET['email'])) {
                  $email = $_GET['email'];
                }
          if(isset($_COOKIE['attempt'])){
          echo " Wait for 3 minutes for further attempts <script> alert('Detected! Suspecious login attempts')</script>";
        }else{

    ?>
        <form class="form" action="php_login.php" method="post">

        <!-- <input type="hidden" name="page" value="login"> -->

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input placeholder="Example:: admin@gmail.com" type="email" name="email" class="form-control" id="email" value="<?=$email?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input placeholder=". . . Your password" type="password" name="pass" class="form-control" id="password">
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-secondary form-control" value="Log In">
            </div>
        </form>

        <?php }?>
      
      </div>

    </div>

    <?php 

      if(isset($_SESSION['msg'])){
      
      $msg = $_SESSION['msg'];
      
      echo "<script>alert('$msg');</script>";

      ;
      unset($_SESSION['msg']);
    } 
  ?>
  </div>
  <?php include_once "templates/footerSection.php" ?>

  <?php include_once "templates/footer.php" ?>
