<?php include_once "templates/head.php";

  if($_SESSION['UserRole'] != "ADMIN"){
    header("location:login.php");
  }
?>

  <!-- Navigation -->
  <?php include_once "templates/mainNav.php"; 
  
  include_once"dbConnection.php"; 
  $conn = dbConncetion();
  
  ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row my-3">

        <div class="col-lg-6 bg-dark text-light offset-lg-3">

          <form action="php_VideoUpload.php" method="POST" enctype="multipart/form-data">
            <legend class="text-center">Upload Video Link</legend>
            <hr class="bg-light">

              <div class="form-group">
              <input type="hidden" name="mtype" value="V">
                <label for="FileName">Video Name :</label>
                <input type="text" name="FileName" id="FileName" class="form-control" placeholder="Example: John Doe">
              </div>

              <div class="form-group">
                <label for="link">Pest youtube link here:</label><br>
                <input type="text" name="link" id="link" class="form-control" placeholder="Example: John Doe">
              </div>
              <div class="form-group">
                <input type="submit" class="form-control btn btn-success mt-4" value="SUBMIT"  >  
              </div>

          </form>

        </div>
        </div>
        <div class="row my-3">
      <div class="col-lg-6 bg-dark text-light offset-lg-3">

        <form action="php_MediaUpload.php" method="POST" enctype="multipart/form-data">
          <legend class="text-center">Upload Audio</legend>
          <hr class="bg-light">

            <div class="form-group">
              <label for="FileName">Audio Name :</label>
              <input type="text" name="FileName" id="FileName" class="form-control" placeholder="Example: John Doe">
            </div>

            <div class="form-group">
              <label for="document">Select Audio File:</label><br>
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
        <th>Media Topic</th>
        <th>File Name</th>
        
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 

      $sql = "SELECT * FROM mediafile";
      $result = $conn->query($sql);

      foreach($result as $row){
    ?>
      <tr>
        <td><?=$row['FileName']?></td>
        <td><?=$row['FileLink']?></td>
        
        <td><a class="btn btn-outline-danger" href="php_deleteMedia.php?MediaId=<?=$row['id']?>">DELETE</a></td>
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
