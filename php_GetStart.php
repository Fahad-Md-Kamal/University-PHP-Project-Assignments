<?php 
session_start();
if($_POST){
    include_once "dbConnection.php";
    $conn = dbConncetion();

    $email = $_POST['email'];
    $password = $_POST['pass'];

    if(!isset($_SESSION['attempt'])){
        $_SESSION['attempt'] = 0;
    }


    if(!emailAddressChecker($email)){
        $_SESSION['msg'] = "Please enter a valid email address";
    }elseif(empty($password)){
        $_SESSION['msg'] = "Please enter a password";
    }else{
        $sql = "SELECT * FROM customerdetails where EmailAddress='$email'";

        $result = $conn->query($sql);

        if($user = $result->num_rows > 0){
            $_SESSION['msg'] = "This email already exist in the system. Please login.";

            header("location:login.php?email=$email");
            exit;

        }else{

            $CusReg = 'CUR'.mt_rand(100000,999999);

            $sql ="INSERT INTO customerdetails (CustomerReg, EmailAddress, Password,UserRole) VALUES ('$CusReg','$email','$password','CUSTOMER')";
            if($conn->query($sql)){
                
                $_SESSION['msg'] = "Your account has been created. Please Log In and complete account information for full access";

                header("location:login.php");
                exit;
            }
        }
    }
        header("location:index.php");
}


function emailAddressChecker($emailAdd){
    $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
    
    if (preg_match($pattern, $emailAdd)) {
        return true;
    }else{
        return false;
    }
}


?>