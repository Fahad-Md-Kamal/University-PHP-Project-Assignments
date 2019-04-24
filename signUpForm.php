<?php include_once "templates/head.php" ?>

  <!-- Navigation -->
  <?php include_once "templates/mainNav.php"?>



  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="bg-success my-2 py-2 text-light col-lg-6 offset-lg-3">
        <form class="form" action="php_UserRegistration.php" method="post">
            <hr class="bg-light">
            <legend class="text-center"> User Registration</legend>
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Example: . . . Fahad">
            </div>
            <div class="form-group">
                <label for="surname">Surname:</label>
                <input type="text" name="surname" class="form-control" id="surname" placeholder="Example: . . . Md Kamal">
            </div>
            <div class="form-group">
                <label for="businessName">Business Name:</label>
                <input type="text" name="businessName" class="form-control" id="businessName" placeholder="Example: . . . Fahad Md Kamal">
            </div>
            <div class="form-group">
                <label for="jobTitle">Job Title:</label>
                <input type="text" name="jobTitle" class="form-control" id="jobTitle" placeholder="Example: . . . Student">
            </div>
            <div class="form-group">
                <label for="acs">Area Of Cyber Security:</label>
                <input type="text" name="acs" class="form-control" id="acs" placeholder="Example: . . . Netword Security">
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Example: . . . admin@gmail.com">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Example: . . . 123">
            </div>
            <div class="form-group">
                <label for="Re_password">Password:</label>
                <input type="password" name="Re_password" class="form-control" id="password" placeholder="Example: . . . 123">
            </div>
    
            <div class="form-group">
                <input type="submit" class="btn btn-secondary form-control" value="UPDATE">
            </div>
        </form>

        

      </div>

    </div>


  </div>
  <?php include_once "templates/footerSection.php" ?>

  <?php include_once "templates/footer.php" ?>

  <?php
            if(isset($_SESSION['msg'])){
    
                $msg = $_SESSION['msg'];
                echo "<script>alert('$msg');</script>";
                unset($_SESSION['msg']);
            }
   ?>
      