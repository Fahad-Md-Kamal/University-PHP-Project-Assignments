
<?php 
session_start();

if($_POST){
    $CourseName = $_POST['CourseName'];
    $CourseFee = $_POST['CourseFee'];
    $CourseDetails = $_POST['CourseDetails'];
    $uploadFile = true;
// print_r($_FILES['document']);
    $HaveDoc = 0;
    
    if($_FILES['document']['size'] > 0) 
    {
        $HaveDoc = 1;
    }

    // echo $CourseName.$CourseFee.$CourseDetails.$HaveDoc;exit;
    $sql = "INSERT INTO CoursesInfo(CourseName,CourseFee,CourseDetails) 
            VALUES ('$CourseName',$CourseFee,'$CourseDetails')";

        echo '<br>'.$sql;

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
    }elseif($HaveDoc == 1){
       
        // echo $sql;
        $ValidFileExtensions = ['pdf','doc','docx','txt'];

        $fileName = $_FILES['document']['name'];
        $fileSize = $_FILES['document']['size'];
        $fileTmpName = $_FILES['document']['tmp_name'];
        $fileType = $_FILES['document']['type'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileNewName = str_replace(' ', '-', $CourseName).'-'.time().'.'.$fileExtension;
        $uploadPath = "docs/".$fileNewName;
    
        if(!in_array($fileExtension,$ValidFileExtensions)){
            
            $uploadFile = false;
            $_SESSION['msg'] = "This is not a valid document file";
        
        }elseif($fileSize > 10000000) {
        
            $uploadFile = false;
            $_SESSION['msg'] = "This is too large, Please upload file less then 10MB";
        
        }
        if($uploadFile){
            move_uploaded_file($fileTmpName, $uploadPath);
            $sql = "INSERT INTO CoursesInfo(CourseName, CourseFee, CourseDetails, CourseFile) 
                    VALUES ('$CourseName',$CourseFee,'$CourseDetails','$fileNewName')";
        }

        
    }    
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

    header("location:AdminCourses.php");

}
?>