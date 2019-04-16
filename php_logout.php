<?php 
session_start();
unset($_SESSION['loggedIn']);
unset($_SESSION['UserName']);
unset($_SESSION['EmailAddress']);
unset($_SESSION['UserRole']);

header("location:index.php");

?>