<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "h6551w1paz0fv58j";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }
?>
