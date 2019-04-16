
<?php 
session_start();

if ($_POST) {

    $id = $_POST['id'];
    $CourseName = $_POST['CourseName'];
    $CourseFee = $_POST['CourseFee'];
    $CourseDetails = $_POST['CourseDetails'];
    $uploadFile = true;
    
    $HaveDoc = 0;


    if($_FILES['document']['size'] > 0) 
    {
        $HaveDoc = 1;
    }

    $sql = "UPDATE coursesinfo 
        SET 
        CourseName='$CourseName',
        CourseFee='$CourseFee',
        CourseDetails='$CourseDetails'
        WHERE id='$id'";

// echo $sql;exit;


    if (empty($CourseName)) {
            $uploadFile = false;
            $_SESSION['msg'] = "Please enter a Unique product name";
    }else if(empty($CourseFee) || !is_numeric($CourseFee)){
            $uploadFile = false;
            $_SESSION['msg'] = "Please enter numeric price of the product";
    }else if(empty($CourseDetails)){
            $uploadFile = false;
            $_SESSION['msg'] = "Please enter product details";
    }else if( strlen($CourseDetails) > 300){
            $uploadFile = false;
            $_SESSION['msg'] = "Please enter product details in 300 words";
    }

    include_once"dbConnection.php"; 
    $conn = dbConncetion();
    
    if($uploadFile){
        
        $chk = "SELECT * FROM CoursesInfo WHERE CourseName = '$CourseName'";
        // echo $chk;exit;
        
        $result = $conn->query($chk);
        if($result->num_rows > 1){
            $_SESSION['msg'] = "There is already a course with the same name.";
            $uploadFile = false;
        }
    }

    if ($uploadFile) {

        if($conn->query($sql)){
            $_SESSION['msg'] = "This course has been updated successfully";
        }else{
            $_SESSION['msg'] = "Failed: ".$conn->error;
        }
    }
        
    header("location:AdminCourses.php");
}
?>