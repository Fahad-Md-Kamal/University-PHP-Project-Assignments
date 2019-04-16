<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Curious Cybersecurity</a>
            
          <?php 
            if(isset($_SESSION['UserRole']) && $_SESSION['UserRole'] == "ADMIN"){              
          ?>
            <div class="btn-group">
              <button type="button" class="btn btn-default text-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Admin Pages
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item bg-success text-light" href="AdminUsers.php">Users Control</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item bg-secondary text-light" href="Location.php">Traning Courses</a>
                </div>

            </div>
      <?php }?>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          
          
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home
            </a>
          </li>   

          <li class="nav-item">
            <a class="nav-link" href="services.php">Services</a>
          </li>



          <li class="nav-item">
            <div class="btn-group">
              <button type="button" class="btn btn-default text-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                About Us
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="ourApproch.php">Our Approach</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="Location.php">Location</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="contactUs.php">Contact Us</a>
              </div>
            </div>
          </li>

          <?php
      
      if(isset($_SESSION['loggedIn'])){
        ?>
          <li class="nav-item">
            <a class="nav-link text-info" href="userInfo.php"><?=$_SESSION['UserName']?></a>
          </li>
      
          <li class="nav-item">
            <a class="nav-link" href="php_logout.php">Log Out</a>
          </li>
      <?php }else{ ?>

        <li class="nav-item">
            <a class="nav-link" href="index.php#sign_up">Sign Up </a>
          </li> 

          <li class="nav-item">
            <a class="nav-link" href="login.php">Log In </a>
          </li> 
      
      <?php } ?>


        </ul>
      </div>
    </div>
  </nav>
