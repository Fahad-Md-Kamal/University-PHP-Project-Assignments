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
        <th>Reg No.</th>
        <th>FirstName</th>
        <th>Surname</th>
        <th>BusinessName</th>
        <th>JobTitle</th>
        <th>AreaOfCyberSecurity</th>
        <th>EmailAddress</th>
        <th>Password</th>
        <th>UserRole</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 
      include_once"dbConnection.php"; 
      $conn = dbConncetion();
      $sql = "SELECT * FROM customerdetails";
      $result = $conn->query($sql);

      foreach($result as $row){
          $Id = $row['id'];
?>
      <tr>
        <td><?=$row['CustomerReg']?></td>
        <td><?=$row['FirstName']?></td>
        <td><?=$row['Surname']?></td>
        <td><?=$row['BusinessName']?></td>
        <td><?=$row['JobTitle']?></td>
        <td><?=$row['AreaOfCyberSecurity']?></td>
        <td><?=$row['EmailAddress']?></td>
        <td><?=$row['Password']?></td>
        <td><?=$row['UserRole']?></td>
        <td><a class="btn btn-outline-primary" href="userInfo.php?id=<?=$row['id']?>">EDIT</a></td>
        <td><a class="btn btn-outline-danger" href="php_deleteUser.php?id=<?=$row['id']?>">DELETE</a></td>
      </tr>
    <?php } ?>

    </tbody>
  </table>
  </div>


  <?php if(isset($_SESSION['msg'])){
    
    $msg = $_SESSION['msg'];
    
    echo "<script>alert('$msg');</script>";

    ;
    unset($_SESSION['msg']);
  } ?>


  </div>
  </div>

  <?php include_once "templates/footer.php" ?>
