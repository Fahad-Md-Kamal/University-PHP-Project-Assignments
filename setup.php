<?php

 $host = "localhost";
 $user = "root";
 $pass = "";
 $database = "DW_00171328";

 $conn = new mysqli($host, $user, $pass);

 if($conn->connect_error){
     die("Connection Faild: ". $conn->connect_error);
 }else{
     $sql  = "CREATE DATABASE IF NOT EXISTS $database";
     if($conn->query($sql)){
         echo "Database Created successfully<br>";
     }
 }
//  All table creation code will be here
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
     echo "Customer Details Table Created successfully<br>";
 }else{
     echo ("Faild To create Customer Details table". $conn->error);
 }


 $sql = "INSERT INTO customerdetails(CustomerReg, FirstName, Surname, BusinessName, JobTitle, AreaOfCyberSecurity, EmailAddress, Password, UserRole) VALUES ('CUR759801','Fahad','Md Kamal','FahadMdKamal','Student','Networking','faahad.hossain@gmail.com','123','ADMIN')";
 
 if($conn->query($sql)){
     echo "Inital Customer inserted successfully<br>";
 }
 else{
     die("Failed to input Initail Data".$conn->error);
 }




 $sql = "CREATE TABLE CoursesInfo ( 
    id INT(10) PRIMARY KEY AUTO_INCREMENT , 
    CourseName VARCHAR(100),
    CourseFee VARCHAR(5), 
    CourseDetails VARCHAR(300)
    )";

 if($conn->query($sql)){
     echo "CoursesInfo Table Created successfully<br>";
 }else{
     echo ("Faild To create CoursesInfo table". $conn->error);
 }


 $sql = "INSERT INTO CoursesInfo
 (CourseName, CourseFee, CourseDetails) 
 VALUES ('Fishing Proof expert','250','Curious CyberSecuritie''s dedicatied program')";
 
 if($conn->query($sql)){
     echo "Inital Course created successfully<br>";
 }
 else{
     die("Failed to input Initail Data".$conn->error);
 }




 $sql = "CREATE TABLE CustomerQuery ( 
    id INT(10) PRIMARY KEY AUTO_INCREMENT , 
    CustomerEmail VARCHAR(100),
    CustomerMessage VARCHAR(300)
    )";

 if($conn->query($sql)){
     echo "CustomerQuery Table Created successfully<br>";
 }else{
     echo ("Faild To create CustomerQuery table". $conn->error);
 }


 $sql = "INSERT INTO CustomerQuery(CustomerEmail, CustomerMessage)
  VALUES ('fahadmdkamal@gmail.com','Recently my email addres has been hacked. I''m certain that I have never opened my email in somone elses computer. Except my mobile phone, office PC and home PC. Was it a fishing...?. If so, than I want to do your course to stop this kind of activity in the future.')";
 
 if($conn->query($sql)){
     echo "Inital Customer Query inserted successfully<br>";
 }
 else{
     die("Failed to input Initail Data".$conn->error);
 }




//  UserEnrolled(UserId, CourseId)
 $sql = "CREATE TABLE CourseEnroll( 
     id INT(6) PRIMARY KEY NOT NULL AUTO_INCREMENT, 
     CustomerEmail VARCHAR(200), 
     CourseName VARCHAR(100))";

 if($conn->query($sql)){
     echo "UserEnrolled Table Created successfully<br>";
 }else{
     echo ("Faild To create UserEnrolled table". $conn->error);
 }


 $sql = "INSERT INTO CourseEnroll(CustomerEmail, CourseName)
  VALUES (
      'faahad.hossain@gmail.com',
      'Fishing Proof expert'
      )";

 if($conn->query($sql)){
     echo "Inital Course inserted successfully<br>";
 }
 else{
     die("Failed to input Initail Course Data".$conn->error);
 }



//  UserEnrolled(UserId, CourseId)
$sql = "CREATE TABLE MediaFile( 
    id INT(6) PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    FileName VARCHAR(200),
    FileLink VARCHAR(100),
    MediaType VARCHAR(2))";

if($conn->query($sql)){
    echo "MediaFile Table Created successfully<br>";
}else{
    echo ("Faild To create MediaFile table". $conn->error);
}


$sql = "INSERT INTO MediaFile
    (FileName, FileLink, MediaType)
 VALUES (
     'Cyber Security Intro',
     'https://www.youtube.com/watch?v=-wv1egc7qCA','V'
     )";

if($conn->query($sql)){
    echo "Inital MediaFile inserted successfully<br>";
}
else{
    die("Failed to input Initail MediaFile".$conn->error);
}

$sql = "INSERT INTO MediaFile(FileName, FileLink, MediaType)VALUES ('Cybersecurity Intro','Mozart.mp3','A')";

if($conn->query($sql)){
    echo "Inital MediaFile inserted successfully<br>";
}
else{
    die("Failed to input Initail MediaFile".$conn->error);
}


?>