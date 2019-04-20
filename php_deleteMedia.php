<?php 

        include_once "dbConnection.php";
        $conn = dbConncetion();
if(isset($_GET['MediaId'])){

    $MediaId = $_GET['MediaId'];
        $sql = "DELETE FROM mediafile WHERE id = '$MediaId'";

        if($conn->query($sql)){
            $_SESSION['msg'] = "File removed successfully";
        }else{
            $_SESSION['msg'] ="Failed to remove File: ".$conn->error;
        }

        header("location:AdminMedia.php");
    }

?>