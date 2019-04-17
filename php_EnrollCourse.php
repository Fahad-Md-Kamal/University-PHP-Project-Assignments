<?php 

session_start();
if(isset($_GET['CourseName'])){
    $CourseName = $_GET['CourseName'];
    $UserEmail = $_SESSION['EmailAddress'];

// echo $CourseName.$UserEmail;exit;
    include_once "dbConnection.php";
    $conn = dbConncetion();

	$sql = "SELECT * FROM courseenroll WHERE CustomerEmail = '$UserEmail' AND CourseName = '$CourseName'";
	// echo $sql;exit;
	$result = $conn->query($sql);
	// print_r($result);exit;

	if($result->num_rows > 0){
    	$_SESSION['msg'] = "You are already enrolled into this course.";
	}else{
		$sql = "INSERT INTO  courseenroll(CustomerEmail, CourseName) VALUES ('$UserEmail','$CourseName')";
		if($conn->query($sql)){
			$_SESSION['msg'] = "Your request to join the course is recorded. We will contact you later";
		}
    }
}
	header("location:services.php");

?>