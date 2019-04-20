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
        $_SESSION['msg'] = "Please upload valid Mp3 or AAC file";
    }elseif($uploadFile){
        $ValidFileExtensions = ['mp3','aac'];

        $documentName = $_FILES['document']['name'];
        $fileSize = $_FILES['document']['size'];
        $fileTmpName = $_FILES['document']['tmp_name'];
        $fileType = $_FILES['document']['type'];
        $fileExtension = pathinfo($documentName, PATHINFO_EXTENSION);
        $uploadPath = "Media/".$documentName;
    
        if(!in_array($fileExtension,$ValidFileExtensions)){
            
            $uploadFile = false;
            $_SESSION['msg'] = "Not a valid Mp3 or AAC file";
        
        }elseif($fileSize > 10000000) {
        
            $uploadFile = false;
            $_SESSION['msg'] = "This is too large, Please upload file less then 10MB";
        
        }

        if($uploadFile){

            include_once"dbConnection.php"; 
            $conn = dbConncetion();

            
            move_uploaded_file($fileTmpName, $uploadPath);
            $sql = "INSERT INTO MediaFile(FileName, FileLink, MediaType) VALUES ('$FileName', '$documentName','A')";
           
            if($conn->query($sql)){
                $_SESSION['msg'] = "Audio Uploaded";
            }
            else{
                $_SESSION['msg'] = "Failed to input Audio".$conn->error;
            }
        }
    }
}
header("location:AdminMedia.php");

?>