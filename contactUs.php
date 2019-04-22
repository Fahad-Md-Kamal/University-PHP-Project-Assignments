<?php include_once "templates/head.php" ?>

  <!-- Navigation -->
  <?php include_once "templates/mainNav.php" ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">
<div class="col-md-6 offset-3 bg-success text-light my-3">
    <form class="form my-5" action="php_ContactUs.php" method="post">
<legend class="text-center">Query or Feedback</legend>

    <div class="form-group">
        <label for="CQ">Type your message:</label>
        <textarea class="form-control" name="CQ" id="CQ" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label for="CustomerEmail">Your Email:</label>
        <input type="email" name="CustomerEmail" class="form-control" id="CustomerEmail">
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-info form-control" value="SEND">
    </div>
</form>
</div>



    </div>

  </div>

  <?php include_once "templates/footer.php" ?>
