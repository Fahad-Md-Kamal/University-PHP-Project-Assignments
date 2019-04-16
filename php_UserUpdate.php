    
    
<?php 


if($_POST){
    $Id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $surname = $_POST['surname'];
    $businessName = $_POST['businessName'];
    $jobTitle = $_POST['jobTitle'];
    $acs = $_POST['acs'];
    $password = $_POST['password'];
    $UserRole = $_POST['UserRole'];






    include_once "dbConnection.php";
    $conn = dbConncetion();


        $sql ="UPDATE customerdetails 
        SET 
        FirstName='$firstName',
        Surname='$surname',
        BusinessName='$businessName',
        JobTitle='$jobTitle',
        AreaOfCyberSecurity='$acs',
        UserRole ='$UserRole',
        Password='$password' WHERE id = '$Id'";


        // echo $sql; 
        // exit;
        
        if($conn->query($sql)){
            $_SESSION['msg'] = "Your information have been recorder.";
        }
        header("location:userInfo.php");

    }
?>