<?php 
session_start();
unset($_SESSION['loggedIn']);
unset($_SESSION['UserName']);
unset($_SESSION['EmailAddress']);

header("location:index.php");

?>