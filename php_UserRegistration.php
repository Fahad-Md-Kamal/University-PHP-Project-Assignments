<?php 

session_start();
if($_POST){
    $firstName = $_POST['firstName'];
    $surname = $_POST['surname'];
    $businessName = $_POST['businessName'];
    $jobTitle = $_POST['jobTitle'];
    $acs = $_POST['acs'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Re_password = $_POST['Re_password'];



    if(empty($firstName)){
        $_SESSION['msg'] = "Enter your name";
    }elseif(empty($surname)){
        $_SESSION['msg'] = "Enter your surname";
    }elseif(empty($businessName)){
        $_SESSION['msg'] = "Enter your businessName";
    }elseif(empty($jobTitle)){
        $_SESSION['msg'] = "Enter your jobTitle";
    }elseif(empty($acs)){
        $_SESSION['msg'] = "Enter your area of cyber security interest";
    }elseif(empty($email)){
        $_SESSION['msg'] = "Enter your email address";
    }elseif(empty($password)){
        $_SESSION['msg'] = "Enter your password";
    }elseif($Re_password != $password){
        $_SESSION['msg'] = "Re entered password didn't mathced";
    }else{
        include_once "dbConnection.php";
        $conn = dbConncetion();

        $sql = "SELECT * FROM customerdetails where EmailAddress='$email'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $_SESSION['msg'] = "This email already exist in the system. Please login.";

        }else{
            
            $CusReg = 'CUR'. mt_rand(100000,999999);
            $sql ="INSERT INTO customerdetails(
                CustomerReg,
                FirstName,
                Surname,
                BusinessName,
                JobTitle,
                AreaOfCyberSecurity,
                EmailAddress,
                Password,
                UserRole) 
                VALUES 
                ('$CusReg',
                '$firstName',
                '$surname',
                '$businessName',
                '$jobTitle',
                '$acs',
                '$email',
                '$password',
                '$Re_password',
                'CUSTOMER')";

            if($conn->query($sql)){
                $_SESSION['msg'] = "Your information have been recorder.";
            }

        
        }
    }
}
    header("location:signUpForm.php");
?>