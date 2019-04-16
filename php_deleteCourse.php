<?php 

        include_once "dbConnection.php";
        $conn = dbConncetion();
if(isset($_GET['id'])){

    $id = $_GET['id'];
        $sql = "DELETE FROM coursesinfo WHERE id = '$id'";

        if($conn->query($sql)){
            $_SESSION['msg'] = "Course deleted successfully";
        }else{
            $_SESSION['msg'] ="Failed to Delete Course: ".$conn->error;
        }

        header("location:AdminCourses.php");
    }

?>