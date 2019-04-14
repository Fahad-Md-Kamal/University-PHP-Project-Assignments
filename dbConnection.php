<?php 

function dbConncetion(){

    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "CuriousCyberSecurityDB";

    $conn = new mysqli($host, $user, $pass, $database);

    return $conn;
}



?>