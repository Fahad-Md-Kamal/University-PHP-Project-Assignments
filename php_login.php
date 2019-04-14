<?php 
session_start();
if($_POST){
    include_once "dbConnection.php";
    $conn = dbConncetion();

    $email = $_POST['email'];
    $password = $_POST['pass'];
    $page = $_POST['page'];

    if(!isset($_SESSION['attempt'])){
        $_SESSION['attempt'] = 0;
    }


    if(!emailAddressChecker($email)){
        $_SESSION['msg'] = "Please enter a valid email address";
    }elseif(empty($password)){
        $_SESSION['msg'] = "Please enter a password";
    }else{
        $sql = "SELECT * FROM customerdetails where EmailAddress='$email' AND Password = '$password'";


        $result = $conn->query($sql);

        if($user = $result->num_rows > 0){
            foreach($result as $row){
                    $_SESSION['UserName'] = $row['FirstName'];
                    $_SESSION['EmailAddress'] = $row['EmailAddress'];
                }
                $_SESSION['loggedIn'] = true;

                unset($_SESSION['attempt']);
                header("location:$page.php");
                exit;

        }else{
            if($_SESSION['attempt'] > 2 ){
                    setcookie('attempt', true, time() + 180, "/");
                    unset($_SESSION['attempt']);
            }
            $_SESSION['attempt']++;
        }
    }
    if($page == 'login'){
            $_SESSION['msg'] = "User Name Or Password dosen't match";  
            header("location:$page.php");
    }elseif($page == 'index'){
        $sql = "SELECT * FROM customerdetails where EmailAddress='$email'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $_SESSION['msg'] = "This email already registared in the system. Please Login";
            header("location:$page.php");
            exit;
        }
        header("location:userInfo.php?email=$email");
    }
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