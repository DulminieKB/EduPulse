<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "edupulsedb";

    //create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //checks the database connection
    if (!$conn) {
        die("Error: " . mysqli_connect_error());
    }
    
?>
