<?php session_start();

if(!isset($_COOKIE['notification'])){
  setcookie('notification', true, time() + 360, "/");
  echo "<script> alert('This website uses cookie in the background.')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Curious CyberSecurity</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/fontawsome/css/fontawsome.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">



  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/fontawsome/fontawsome.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</head>

<body>