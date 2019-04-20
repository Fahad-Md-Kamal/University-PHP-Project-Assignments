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

    <?php 

      $sql = "SELECT * FROM customerquery";
      $result = $conn->query($sql);

      foreach($result as $row){
          $Id = $row['id'];
    ?>

        <div class="row">
          <div class="col-md-12 bg-dark p-3">
          <div class="h3 text-light"><?=$row['CustomerEmail']?></div>
          <div class="bg-light p-2 mb-3"><?=$row['CustomerMessage']?></div>
          <a class="btn btn-outline-danger" href="php_RemoveQuery.php?CqId=<?=$row['id']?>">DELETE</a>
          </div>
        </div>

        <!-- <td></td> -->
        <!-- <td></td> -->
        <!-- <td></td> -->
        
        <!-- <td><a class="btn btn-outline-primary" href="AdminCourses.php?id=<?=$row['id']?>">Replay</a></td> -->
      </tr>
      <!-- <tr><td><hr class="bg-light"></td></tr> -->
    <?php } ?>

    <!-- </tbody>
  </table> -->


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
