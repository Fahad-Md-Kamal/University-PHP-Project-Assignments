<?php 
session_start();
if($_POST){
    $FileName = $_POST['FileName'];
    $uploadFile = true;
       
    if(empty($FileName)){
        $uploadFile = false;
        $_SESSION['msg'] = "Please enter File Name";
    }elseif($_FILES['document']['size'] == 0){
        $uploadFile = false;
        $_SESSION['msg'] = "Please upload PDF file";
    }elseif($uploadFile){
        $ValidFileExtensions = ["pdf", "txt"];

        $documentName = $_FILES['document']['name'];
        $fileSize = $_FILES['document']['size'];
        $fileTmpName = $_FILES['document']['tmp_name'];
        $fileType = $_FILES['document']['type'];
        $fileExtension = pathinfo($documentName, PATHINFO_EXTENSION);
        $fileNewName = $documentName.$fileExtension;
        $uploadPath = "Media/".$fileNewName;
    
        if(!in_array($fileExtension,$ValidFileExtensions)){
            
            $uploadFile = false;
            $_SESSION['msg'] = "Not a valid text or PDF file";
        
        }elseif($fileSize > 10000000) {
        
            $uploadFile = false;
            $_SESSION['msg'] = "Please upload file less then 10MB";
        
        }

        if($uploadFile){

            include_once"dbConnection.php"; 
            $conn = dbConncetion();
            
            $sql = "INSERT INTO MediaFile(FileTopic, FileName) VALUES ('$FileName', '$fileNewName')";
           
            if($conn->query($sql)){
                move_uploaded_file($fileTmpName, $uploadPath);
                $_SESSION['msg'] = "File Uploaded";
            }
            else{
                $_SESSION['msg'] = "Failed to input File".$conn->error;
            }
        }
    }
}
header("location:AdminMedia.php");

?>