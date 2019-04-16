<?php 

function dbConncetion(){

    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "DW_00171328";

    $conn = new mysqli($host, $user, $pass, $database);

    return $conn;
}



?>