<?php include_once "templates/head.php";

  if($_SESSION['UserRole'] != "ADMIN"){
    header("location:login.php");
  }
?>

  <!-- Navigation -->
  <?php include_once "templates/mainNav.php" ?>

  <!-- Page Content -->
  <div class="container-fluid">

    <div class="row">


 <div class="col-md-12">
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Customer Email</th>
        <th>Course Name</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 
      include_once"dbConnection.php"; 
      $conn = dbConncetion();
      
      $sql = "SELECT * FROM courseenroll";
      $result = $conn->query($sql);

      foreach($result as $row){
?>
      <tr>
        <td><?=$row['CustomerEmail']?></td>
        <td><?=$row['CourseName']?></td>
        <td><a href="php_RemoveEnroll.php?RemoveId=<?=$row['id']?>">Remove Request</a></td>
        </tr>
    <?php } ?>

    </tbody>
  </table>
  </div>


  <?php if(isset($_SESSION['msg'])){
    
    $msg = $_SESSION['msg'];
    
    echo "<script>alert('$msg');</script>";
    unset($_SESSION['msg']);
  } ?>


  </div>
  </div>

  <?php include_once "templates/footer.php" ?>
