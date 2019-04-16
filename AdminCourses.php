<?php include_once "templates/head.php";

  if($_SESSION['UserRole'] != "ADMIN"){
    header("location:login.php");
  }
?>

  <!-- Navigation -->
  <?php include_once "templates/mainNav.php" ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row my-3">

        <div class="col-lg-6 bg-dark text-light offset-lg-3">

          <form action="php_CourseReg.php" method="POST" enctype="multipart/form-data">
            <legend class="text-center">Training Course</legend>
            <hr class="bg-light">

              <div class="form-group">
              <input type="hidden" value="" name="pid">
                <label for="CourseName">Course Name :</label>
                <input type="text" name="CourseName" id="CourseName" value="" class="form-control" placeholder="Example: John Doe">
              </div>

                <div class="form-group">
                <label for="CourseFee">Course Fee :</label>
                <input type="number" name="CourseFee" id="CourseFee" value="" class="form-control" placeholder="Example: johnDoe@gmail.com">
              </div>
            
              <div class="form-group">
                <label for="CourseDetails">Course Details :</label>
                <textarea name="CourseDetails" id="CourseDetails" class="form-control" placeholder="Course Details ( In 300 words )"></textarea>
              </div>

              <div class="form-group">
                <label for="document">Course PDF :</label><br>
                <input id="document" type="file" name="document">
              </div>
              <div class="form-group">
                <input type="submit" class="form-control btn btn-success mt-4" value="SUBMIT"  >  
              </div>

          </form>

        </div>

    </div>
  </div>

<div class="container-fluid">
<div class="row">
  <div class="col-md-12">
    <table class="table table-striped">
    <thead>
      <tr class="bg-primary text-light">
        <th>Course Name</th>
        <th>Course Fee</th>
        <th>Course Details</th>
        <th>Course PDF</th>
        
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 
      include_once"dbConnection.php"; 
      $conn = dbConncetion();
      $sql = "SELECT * FROM CoursesInfo";
      $result = $conn->query($sql);

      foreach($result as $row){
          $Id = $row['id'];
    ?>
      <tr>
        <td><?=$row['CourseName']?></td>
        <td><?=$row['CourseFee']?></td>
        <td><?=$row['Surname']?></td>
        <td><?=$row['CourseDetails']?></td>
        <td><?=$row['CourseFile']?></td>
        
        <td><a class="btn btn-outline-primary" href="userInfo.php?id=<?=$row['id']?>">EDIT</a></td>
        <td><a class="btn btn-outline-danger" href="php_deleteUser.php?id=<?=$row['id']?>">DELETE</a></td>
      </tr>
    <?php } ?>

    </tbody>
  </table>
  </div>
  </div>
  </div>

  <?php if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    echo "<script>alert('$msg');</script>";
    unset($_SESSION['msg']);
  } ?>

  <!-- <?php include_once "templates/footerSection.php" ?> -->

  <?php include_once "templates/footer.php" ?>
