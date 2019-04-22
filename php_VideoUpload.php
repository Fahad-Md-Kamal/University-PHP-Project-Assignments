<?php 
    $fileName = $_POST['FileName'];
    $link = $_POST['link'];

session_start();
if($_POST){
    if(empty($fileName)){
        $_SESSION['msg'] = "Please enter File Name";
    }elseif(empty($link)){
        $_SESSION['msg'] = "Please provide youtube video link";
    }else{
        include_once "dbConnection.php"; 
        $conn = dbConncetion();

        $array = explode('=',$link);
        $video = end($array);


        $sql = "INSERT INTO MediaFile (FileName, FileLink, MediaType) 
                VALUES ('$fileName','$video','V')";
        
        if($conn->query($sql)){
            echo "Inital MediaFile inserted successfully<br>";
        }
        else{
            die("Failed to input Initail MediaFile".$conn->error);
        }

    }
    header("location:AdminMedia.php");
}

?>