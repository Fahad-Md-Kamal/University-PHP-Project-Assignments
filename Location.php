<?php include_once "templates/head.php" ?>

  <!-- Navigation -->
  <?php include_once "templates/mainNav.php" ?>

  <?php if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    echo "<script>alert('$msg');</script>";
    unset($_SESSION['msg']);
  } ?>


  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <h1 class="my-4">Our Location</h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4776.853046503781!2d-1.613331758988011!3d53.22813013025624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487987f2c5df9d0b%3A0x2070d33d3079800f!2sChatsworth+House!5e0!3m2!1sen!2sbd!4v1555692656596!5m2!1sen!2sbd" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>



      </div>
<hr>
<hr>
<hr>
  <div class="row">
  <!-- <p class="display-1 text-light text-center">BOOK YOUR SEAT</p> -->

  <div class="col-md-6 offset-3 bg-success text-light my-3">
      <form class="form py-5" action="php_EnrollCourse.php" method="post">
  <legend class="text-center">BOOK YOUR SEAT</legend>
  <!-- <input type="hidden" name="page" value="login"> -->

      <div class="form-group">
          <label for="CQ">Email:</label>
          <input class="form-control" type="email" name="email">
      </div>
      <div class="form-group">
          <label for="CustomerEmail">Select Courese:</label>
          <select name="Course" class="form-control">
          <?php 
            if(isset($_GET['CourseName'])){
              $CourseName = $_GET['CourseName'];
            }else{
              $CourseName = "Select Course Name";
            }?>
          <?=$CourseName?>
            <option value="<?=$CourseName?>"><?=$CourseName?></option>
            <?php
              include_once "dbConnection.php"; 
              $conn = dbConncetion();
              $sql = "SELECT * FROM CoursesInfo";
              $result = $conn->query($sql);
              foreach($result as $row){
            ?>
            <option value="<?=$row['CourseName']?>"><?=$row['CourseName']?></option>
            <?php }?>

          </select>
      </div>
      
      <div class="form-group">
          <input type="submit" class="btn btn-info form-control" value="BOOK">
      </div>
  </form>
  </div>

  </div>



</div>
    </div>
  <?php include_once "templates/footer.php" ?>
