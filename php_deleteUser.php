<?php 

        include_once "dbConnection.php";
        $conn = dbConncetion();

        $sql = "DELETE FROM customerdetails WHERE id = '$id'";
        if($conn->query($sql)){
            $_SESSION['msg'] = "User deleted successfully";
        }else{
            $_SESSION['msg'] ="Failed to Delete User: ".$conn->error;
        }
        header("location:AdminUsers.php");
    }else{
        $_SESSION['msg'] ="Please Login";
        header("location:login.php");
    }

?>