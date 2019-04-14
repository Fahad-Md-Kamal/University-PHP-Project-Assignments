    
    
<?php 


    if($_POST){
        $firstName = $_POST['firstName'];
        $surname = $_POST['surname'];
        $businessName = $_POST['businessName'];
        $jobTitle = $_POST['jobTitle'];
        $acs = $_POST['acs'];
        $email = $_POST['email'];
        $password = $_POST['password'];



        include_once "dbConnection.php";
        $conn = dbConncetion();

        $sql = "SELECT * FROM customerdetails WHERE EmailAddress = '$email'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){

            $_SESSION['msg'] = "Email already registared";
            header("location:index.php");

        }else{

            $sql ="INSERT INTO customerdetails ( FirstName, Surname, BusinessName, JobTitle, AreaOfCyberSecurity, EmailAddress, Password) VALUES ('$firstName','$surname','$businessName','$jobTitle','$acs','$email','$password')";
            
            echo $sql; 
            exit;
            
            if($conn->query($sql)){
                $_SESSION['msg'] = "Your information have been recorder.";
                unset($_SESSION['email']);
                unset($_SESSION['pass']);
            }
        }
    }
?>