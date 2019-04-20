<?php 

	session_start();
	if($_POST){
	$CustomerMessage = $_POST['CQ'];
	$CustomerEmail = $_POST['CustomerEmail'];

	if(!$_SESSION['loggedIn']){
		$_SESSION['msg'] = "Please login first";
		header("location:login.php");
		exit;
	}

	if(empty($CustomerMessage)){
		$_SESSION['msg'] = "Enter your message";
	}elseif(empty($CustomerEmail)){
		$_SESSION['msg'] = "Enter your email";
	}else{

	include_once "dbConnection.php";
	$conn = dbConncetion();

		$sql = "INSERT INTO  CustomerQuery(CustomerEmail, CustomerMessage) 
		VALUES ('$CustomerEmail','$CustomerMessage')";
		if($conn->query($sql)){
			$_SESSION['msg'] = "Your query has been sent.";
		}
	}
}
	header("location:contactUs.php");

?>