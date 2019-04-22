<?php 

session_start();

if($_POST){
    $email = $_POST['email'];
    $Course = $_POST['Course'];

	if(!$_SESSION['loggedIn']){
		$_SESSION['msg'] = "Please login first";
		header("location:login.php");
		exit;
	}

	if(empty($email)){
		$_SESSION['msg'] = "Enter your email address.";
	}elseif(empty($Course)){
		$_SESSION['msg'] = "Please select a coures for book.";
	}else{
		
		include_once "dbConnection.php";
		$conn = dbConncetion();

		$sql = "SELECT * FROM courseenroll WHERE CustomerEmail = '$email' AND CourseName = '$Course'";
		$result = $conn->query($sql);

		if($result->num_rows > 0){
			$_SESSION['msg'] = "You have already booked this course.";
		}else{
			$sql = "INSERT INTO  courseenroll
			(CustomerEmail,
			CourseName)
			VALUES
			('$email',
			'$Course')";
			if($conn->query($sql)){
				$_SESSION['msg'] = "Your request to join the course is recorded. We will contact you soon";
			}
		}
	}
}
	header("location:Location.php");

?>