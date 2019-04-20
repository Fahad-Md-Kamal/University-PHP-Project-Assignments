<?php include_once "templates/head.php" ?>

  <!-- Navigation -->
  <?php include_once "templates/mainNav.php" ?>




  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <h1 class="my-4">Our Location</h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4776.853046503781!2d-1.613331758988011!3d53.22813013025624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487987f2c5df9d0b%3A0x2070d33d3079800f!2sChatsworth+House!5e0!3m2!1sen!2sbd!4v1555692656596!5m2!1sen!2sbd" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>



      </div>

  <div class="row my-5">

  <p class="display-1 text-info text-center">BOOK YOUR SEAT</p>
  <hr >
  <div class="col-lg-6">
        
      <?php

include_once "dbConnection.php"; 
$conn = dbConncetion();

$sql = "SELECT * FROM CoursesInfo";
$result = $conn->query($sql);

foreach($result as $row){
$Id = $row['id'];
?>
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
      <div class="card-body">
        <h4 class="card-title">
          <a class="text-dark" href="#"><?=$row['CourseName']?></a>
        </h4>
        <p class="card-text"><?=$row['CourseDetails']?></p>
      </div>
      <div class="card-footer">
        <a class="btn btn-outline-danger" href="php_EnrollCourse.php?CourseName=<?=$row['CourseName']?>">Book This Course</a>
      </div>
    </div>
  </div>

<?php }?>

</div>



    </div>


  <?php include_once "templates/footer.php" ?>
