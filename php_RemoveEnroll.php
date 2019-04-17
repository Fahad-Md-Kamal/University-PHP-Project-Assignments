<?php 


if(isset($_GET['RemoveId'])){
  $RemoveId =  $_GET['RemoveId'];

  include_once"dbConnection.php"; 
  $conn = dbConncetion();
  
  $sql = "DELETE FROM courseenroll WHERE id = '$RemoveId'";
  if($conn->query($sql)){
      $_SESSION['msg'] = "Enrollment request removed.";
  }else{
    $_SESSION['msg'] = $conn->error." Enrollment request removed.";
  }

}
header("location:AdminEnrollList.php");

?>