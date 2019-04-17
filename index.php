<?php include_once "templates/head.php" ?>

  <!-- Navigation -->
  <?php include_once "templates/mainNav.php" ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-12">
        <?php include_once "templates/carousuel.php" ?>
      </div>
      <div id="sign_up" class="col-lg-8 offset-2">

              <div class="jumbotron bg-success text-light">
          <h1 class="display-4"> <i class="fas fa-shield-alt"></i> Curious Cybersecurity</h1>
          <p class="lead mt-2 h4">The ambition is to research and help companies with human elements of Cybersecurity with a view to developing anti-phising filitering Solutions.</p>
          <hr class="my-4">
          <p class="h5">We offer many trainging courses and organize events with a view to help people about cybersecurity</p>
          <p class="lead">
            <div class="row">
                <div class="col-md-6">
              <!-- < ?php 
                if(isset($_COOKIE['attempt'])){
                echo " Wait for 3 minutes for further attempts <script> alert('Detected! Suspecious login attempts')</script>";
                }else{
              ?> -->
                    <form action="php_GetStart.php" method="post">

                        <input class="form-control" Id="email" type="email" name="email" placeholder="Email" autofocus>
                        <!-- <small id="emailHelp" class="form-text text-muted email-msg"></small> -->

                        <input class="form-control my-5" Id="password" type="password" name="pass" placeholder="Password">
                        <!-- <small id="passHelp" class="form-text text-muted email-msg"></small> -->
                        
                        <input id="tc" type="checkbox" name="tc" value="1"> <label for="tc"> &nbsp; I agree <a class="text-dark" href="#">Terms & Conditions</a></label>
                        
                        <input class="btn btn-lg btn-outline-light mt-5" onclick="return emailValid();" type="submit" value="Get Strated">
                    </form>
                <!-- < ?php }?> -->
                </div>
            </div>
          </p>
        </div>

      </div>


    <div class="row">
      <div class="col-sm-12 col-lg-4 mb-4">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a class="text-dark" href="#">Latest News</a>
            </h4>
            <p class="card-text">Latest News related cyber seciurity and fishing from us</p>
          </div>
          <div class="card-footer">
            <input class="btn btn-lg btn-outline-primary" type="button" value="More">
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-lg-4 mb-4">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a class="text-dark" href="#">Awards</a>
            </h4>
            <p class="card-text">All the awards that Curious Cyber Security received</p>
          </div>
          <div class="card-footer">
            <input class="btn btn-lg btn-outline-primary" type="button" value="More">
          </div>
        </div>
      </div>
  
      <div class="col-sm-12 col-lg-4 mb-4">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a class="text-dark" href="#">Press Releases</a>
            </h4>
            <p class="card-text">All the press releses related to Cyber Security</p>
          </div>
          <div class="card-footer">
            <input class="btn btn-lg btn-outline-primary" type="button" value="More">
          </div>
        </div>
      </div>
        </div>

    </div>

  <?php if(isset($_SESSION['msg'])){
    
    $msg = $_SESSION['msg'];
    
    echo "<script>alert('$msg');</script>";

    unset($_SESSION['msg']);
  } ?>


  </div>
  <?php include_once "templates/footerSection.php" ?>

  <?php include_once "templates/footer.php" ?>
