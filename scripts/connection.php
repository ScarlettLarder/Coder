<?php
try{
    // Database configuration, setting the varibles that'll be used for the connection.
    $host  = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "coderdojo";
    // Create database connection using the varibles from earlier
    $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
    // Check connection, and if theres an error, report it.
    if(mysqli_connect_error())
    {
        die("ERROR (1000): Failed to connect!");
    }
}catch(mysqli_sql_exception $e){
    die("CRITICAL ERROR (1008): Failed to connect (Outside param)!");
}