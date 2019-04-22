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

                    <form action="php_GetStart.php" method="post">
                          
                        <input class="form-control" Id="email" type="email" name="email" placeholder="Email">
                        <span id="hidden" class="d-none">

                        <input class="form-control my-5" Id="password" type="password" name="pass" placeholder="Password">
                        <input id="tc" type="checkbox" name="tc" value="1"> <label for="tc"> &nbsp; I agree <a class="text-dark" href="#">Terms & Conditions</a></label>

                      </span>   
                        <input id="submit" class="btn btn-lg btn-outline-light mt-5" onclick="return emailValid();" type="submit" value="Get Strated">
                    </form>
                   

<script>


function validateEmail(email) {
				var re = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
				return re.test(email);
}
			
			function emailValid(){
				var email = document.getElementById('error').value;
				if(!validateEmail(email)){
					return false;
				}
				return true;
			}
</script>


                </div>
            </div>
          </p>
        </div>

      </div>


    <div class="row">
      <div class="col-sm-12 col-lg-4 mb-4 text-center">
        <div class="card h-100">
          <a class="display-1 text-info" href="#"><i class="far fa-newspaper"></i></a>
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

      <div class="col-sm-12 col-lg-4 mb-4 text-center">
        <div class="card h-100">
          <a class="display-1 text-info" href="#"><i class="fas fa-trophy"></i></a>
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
  
      <div class="col-sm-12 col-lg-4 mb-4 text-center">
        <div class="card h-100">
          <a class="display-1 text-info" href="#"><i class="fas fa-video"></i></a>
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

  <script>
			


      $('#email').focusout(function(){
        if($(this).val ==''){
          $('#hidden').addClass('d-done').removeClass('d-block');
          $(this).focus();
        }else{
        $('#hidden').addClass('d-block').removeClass('d-none');
        }});
			

        function agr(){
        if (confirm('Do you agree with our terms and conditions...?')) {
          return true;
        } else {
          return false;
          }
        }


	</script>