<?php include_once "templates/head.php" ?>

  <!-- Navigation -->
  <?php include_once "templates/mainNav.php" ?>

  <!-- Page Content -->
  <div class="container">

    <p class="h1 text-center my-5"> Our Training Courses</p>
    <div class="row">

    <?php

include_once "dbConnection.php"; 
$conn = dbConncetion();

$sql = "SELECT * FROM CoursesInfo";
$result = $conn->query($sql);

  foreach($result as $row){
  ?>
      <div class="CourseCard col-12 my-2">
        <div class="card-body">
          <h4 class="card-title">
            <a class="text-dark" href="#"><?=$row['CourseName']?></a>
          </h4>
          <p class="card-text"><?=$row['CourseDetails']?></p>
        </div>
        <div class="card-footer text-right">
          <a class="btn btn-outline-danger" href="Location.php?CourseName=<?=$row['CourseName']?>">Book This Course</a>
        </div>
      </div>
  <?php }?>   

    </div>

  </div>

  <?php include_once "templates/footer.php" ?>
