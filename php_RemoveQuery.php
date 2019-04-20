<?php 

    if(isset($_GET['CqId'])){
    $CqId =  $_GET['CqId'];

    include_once"dbConnection.php"; 
    $conn = dbConncetion();
    
    $sql = "DELETE FROM CustomerQuery WHERE id = '$CqId'";
    if($conn->query($sql)){
        $_SESSION['msg'] = "Customer Query removed.";
    }else{
        $_SESSION['msg'] = $conn->error."Failed to remove Customer Query.";
    }

    }
    header("location:AdminContact.php");

?>