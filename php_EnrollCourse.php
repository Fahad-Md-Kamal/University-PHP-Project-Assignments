<?php 

session_start();
if(isset($_GET['CourseName'])){
    $CourseName = $_GET['CourseName'];
    $UserEmail = $_SESSION['EmailAddress'];

	if(!$_SESSION['loggedIn']){
		$_SESSION['msg'] = "Please login first";
		header("location:login.php");
		exit;
	}
    include_once "dbConnection.php";
    $conn = dbConncetion();

	$sql = "SELECT * FROM courseenroll WHERE CustomerEmail = '$UserEmail' AND CourseName = '$CourseName'";
	$result = $conn->query($sql);

	if($result->num_rows > 0){
    	$_SESSION['msg'] = "You have already booked this course.";
	}else{
		$sql = "INSERT INTO  courseenroll(CustomerEmail, CourseName) VALUES ('$UserEmail','$CourseName')";
		if($conn->query($sql)){
			$_SESSION['msg'] = "Your request to join the course is recorded. We will contact you soon";
		}
    }
}
	header("location:Location.php");

?>