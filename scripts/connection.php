<?php
    // Database configuration
    $host  = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "coderdojo";
    // Create database connection
    $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
    // Check connection
    if(mysqli_connect_error())
    {
     echo "Connection establishing failed!";
    }
?>