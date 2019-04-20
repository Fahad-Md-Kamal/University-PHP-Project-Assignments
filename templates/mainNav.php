<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Curious Cybersecurity</a>
            


      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php 
            if(isset($_SESSION['UserRole']) && $_SESSION['UserRole'] == "ADMIN"){              
          ?>
            <div class="btn-group">
              <button type="button" class="btn btn-secondary text-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Admin Control
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="AdminUsers.php">Users Control</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="AdminCourses.php">Traning Courses</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="AdminEnrollList.php">Enroll List</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="AdminMedia.php">Media</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="AdminContact.php">User Contact</a>
                <!--  -->
              </div>
                
            </div>
      <?php }?>
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


          <li class="nav-item">
            <div class="btn-group">
              <button type="button" class="btn btn-default text-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user"></i></button>
            
              <div class="dropdown-menu">
             
              <?php if(isset($_SESSION['loggedIn'])){ ?>
                <a class="dropdown-item text-info" href="userInfo.php">My Details</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="php_logout.php">Log Out</a>
              <?php }else{ ?>
                <a class="dropdown-item text-primary" href="index.php#sign_up">Sign Up </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-success" href="login.php">Log In </a>
              <?php } ?>
            
            </div>
          
          </li>
        </ul>
      </div>
    </div>
  </nav>
