<?php include_once "templates/head.php";

  if($_SESSION['UserRole'] != "ADMIN"){
    header("location:login.php");
  }

  if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    echo "<script>alert('$msg');</script>";
    unset($_SESSION['msg']);
  } ?>


  <!-- Navigation -->
  <?php include_once "templates/mainNav.php";  
          
          include_once "dbConnection.php"; 
          $conn = dbConncetion();?>
          <!-- Page Content -->
          <div class="container">

          
          <div class="row">
          <div class="col-md-6">
            <div class="row">
            <?php
              $sql = "SELECT * FROM MediaFile";
              $result = $conn->query($sql);

              foreach($result as $row){

                      if($row['MediaType'] == 'V'){ ?>
                   
                        <p class="h1 text-center"><?=$row['FileName']?></p>
                        <iframe class="my-5" width="560" height="315" src="https://www.youtube.com/embed/<?=$row['FileLink']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                   
                    <?php  }else{ ?>
                        
                        <p class="h1 text-center"><?=$row['FileName']?></p>
                        <audio class="my-5" controls>
                          <source src="Media/<?=$row['FileLink']?>">
                        </audio>

                    <?php  
                      }
                } ?>                  
               
              </div>
            </div>
          </div>
          
          
          </div>
          
          
          
          
          
          
          </div>




  <!-- < ?php include_once "templates/footerSection.php" ?> -->

  <?php include_once "templates/footer.php" ?>
