<?php include_once "templates/head.php";



  if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    echo "<script>alert('$msg');</script>";
    unset($_SESSION['msg']);
  } ?>


  <!-- Navigation -->
  <?php include_once "templates/mainNav.php"?>
          <!-- Page Content -->
<div class="container">

<div class="row">



<div class="d-none d-sm-none d-md-block col-md-10 offset-md-1">
  <iframe class="my-2" width="100%" height="600" src="https://www.youtube.com/embed/-wv1egc7qCA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
</div>




<div class="row">
<div class="h1 col-12 text-center my-5 py-4 text-light bg-success">All Our Trainings</div>
<div id="SecurityAnalyst" class="col-md-3 my-2 text-center text-info p-3">
  <span class="display-1"><i class="fas fa-user-shield"></i></span>
    <p class="h4">Security Analyst</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, et?</p>
</div>

<div class="Our_Service_2 col-md-3 text-info text-center p-3">
<span class="display-1"><i class="fas fa-mask"></i></span>
  <p class="h4">Vulnerability assessor</p>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, et?</p>
</div>


<div class="Our_Service_3 col-md-3 text-info text-center">
<span class="display-1"><i class="fas fa-user-shield"></i></span>
  <p class="h4">Security Auditor</p>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, et?</p>
</div>


<div class="Our_Service_4 col-md-3 text-info my-2 text-center">
<span class="display-1"><i class="fas fa-file-signature"></i></span>
  <p class="h4">Soure Code Editor</p>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, et?</p>
</div>


<div class="Our_Service_5 col-md-3 text-info my-2 text-center">
<span class="display-1"><i class="fas fa-user-secret"></i></span>
  <p class="h4">Security Consultant</p>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, et?</p>
</div>


<div class="Our_Service_6 col-md-3 text-info my-2 text-center">
<span class="display-1"><i class="fas fa-user-lock"></i></span>
  <p class="h4">Security Engineer</p>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, et?</p>
</div>


<div class="Our_Service_7 col-md-3 text-info my-2 text-center">
<span class="display-1"><i class="fas fa-user-secret"></i></span>
  <p class="h4">Incident Responder</p>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, et?</p>
</div>


<div class="Our_Service_8 col-md-3 text-info my-2 text-center">
<span class="display-1"><i class="fas fa-file-signature"></i></span>
  <p class="h4">Forensic Expert</p>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, et?</p>
</div>

  </div>

<div class="row">



<?php

if( isset($_SESSION['UserRole']) && $_SESSION['UserRole'] == "ADMIN"){


      include_once "dbConnection.php"; 
      $conn = dbConncetion();
      if(isset($_GET['search'])){
        $search = $_GET['search'];
        $sql = "SELECT * FROM MediaFile WHERE FileTopic LIKE '$search%'";
      }else{
      $sql = "SELECT * FROM MediaFile";
      }

      $result = $conn->query($sql);

      foreach($result as $row){

          ?>
<div class="h1 col-12 text-center my-5 py-4 text-light bg-success">Our Research Papers</div>

<div class="col-12 my-2 d-flex justify-content-between text-dark">
  <span class="h3"><?=$row['FileTopic']?></span>
  <span class="text-right"><a class="btn btn-primary"  onclick="return agr();" href="read_paper.php?file=<?=$row['FileName']?>" target="_blank">Download</a></span>
</div>


      <?php }
    } ?>




</div>
      
</div>


  <!-- < ?php include_once "templates/footerSection.php" ?> -->

  <?php include_once "templates/footer.php" ?>
<script>
  $( ".col-md-3" ).hover(
  function() {
    $( this ).append( $( "<audio id='play' autoplay><source src='Media/blind-people.mp3'></audio>" ) );
    $(this).css("background-color","#ccfff2");
  }, function() {
    $( this ).find( "audio:last" ).remove();
    $(this).css("background-color","white");
  }
);

    function agr(){
      if (confirm('Do you agree with our terms and conditions...?')) {
        return true;
      } else {
        return false;
        }
      }
</script>