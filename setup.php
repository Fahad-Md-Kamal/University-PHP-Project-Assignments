<?php

 $host = "localhost";
 $user = "root";
 $pass = "";
 $database = "CuriousCyberSecurityDB";

 $conn = new mysqli($host, $user, $pass);

 if($conn->connect_error){
     die("Connection Faild: ". $conn->connect_error);
 }else{
     $sql  = "CREATE DATABASE IF NOT EXIST $database";
     if($conn->query($sql)){
         echo "Database Created successfully";
     }
 }


 $conn = new mysqli($host, $user, $pass, $database);

    $sql = "CREATE TABLE CustomerDetails ( 
        id INT(10) PRIMARY KEY AUTO_INCREMENT , 
        CustomerReg VARCHAR(9),
        FirstName VARCHAR(50), 
        Surname VARCHAR(50), 
        BusinessName VARCHAR(50), 
        JobTitle VARCHAR(50), 
        AreaOfCyberSecurity VARCHAR(30), 
        EmailAddress VARCHAR(200), 
        Password VARCHAR(20),
        UserRole VARCHAR(10)
        )";

     if($conn->query($sql)){
         echo "Table Created successfully";
     }else{
         echo ("Faild To create table". $conn->error);
     }

     $sql = "INSERT INTO customerdetails(CustomerReg, FirstName, Surname, BusinessName, JobTitle, AreaOfCyberSecurity, EmailAddress, Password, UserRole) VALUES ('CUR759801','Fahad','Md Kamal','FahadMdKamal','Student','Networking','faahad.hossain@gmail.com','123','ADMIN')";
     if($conn->query($sql)){
         echo "Inital User input successfully";
     }
     else{
         die("Failed to input Initail Data".$conn->error);
     }
?>