
<?php 
session_start();

if($_POST){
    $CourseName = $_POST['CourseName'];
    $CourseFee = $_POST['CourseFee'];
    $CourseDetails = $_POST['CourseDetails'];
    $uploadFile = true;
    


    // echo $CourseName.$CourseFee.$CourseDetails.$HaveDoc;exit;
    $sql = "INSERT INTO CoursesInfo(CourseName,CourseFee,CourseDetails) 
            VALUES ('$CourseName',$CourseFee,'$CourseDetails')";

        // echo '<br>'.$sql;

    if (empty($CourseName)) {
            $uploadFile = false;
            echo"Please enter a Unique product name";
            $_SESSION['msg'] = "Please enter a Unique product name";
    }else if(empty($CourseFee) || !is_numeric($CourseFee)){
            $uploadFile = false;
            echo "Please enter numeric price of the product";
            $_SESSION['msg'] = "Please enter numeric price of the product";
    }else if(empty($CourseDetails)){
            $uploadFile = false;
            echo "Please enter product details";
            $_SESSION['msg'] = "Please enter product details";
    }else if( strlen($CourseDetails) > 300){
            $uploadFile = false;
            echo"Please enter product details in 300 words";
            $_SESSION['msg'] = "Please enter product details in 300 words";
    }else{
        include_once"dbConnection.php"; 
        $conn = dbConncetion();
        
        if($uploadFile){
            
            $chk = "SELECT * FROM CoursesInfo WHERE CourseName = '$CourseName'";
            // echo $chk;exit;
            
            $result = $conn->query($chk);
            if($result->num_rows > 0){
                $_SESSION['msg'] = "There is already a course with the same name.";
                $uploadFile = false;
            }
        }

        if ($uploadFile) {

            if($conn->query($sql)){
                $_SESSION['msg'] = "Course Name Registared successfully";
            }else{
                $_SESSION['msg'] = "Failed: ".$conn->error;
            }
        }
    }
    header("location:AdminCourses.php");

}
?>