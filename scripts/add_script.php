<?php
    include ("connection.php");

    if (isset($_POST['submit'])) {
        //Mass setting varibles from the form
        $dojo_name = $_POST["name"];
        $dojo_desc = $_POST["desc"];
        $dojo_act = $_POST["activities"];
        $dojo_date = $_POST["date"];
        //Preparing the connection to the database using SQL. The connection (conn) is from the "connection.php" code
        $stmt = $conn->prepare("INSERT INTO dojos(Dojo_name,Dojo_desc,Dojo_activities,Dojo_date) VALUES (?, ?, ?, ?)");
        //Binding paramiters.
        mysqli_stmt_bind_param($stmt,"ssss", $dojo_name, $dojo_desc, $dojo_act, $dojo_date);
        mysqli_stmt_execute($stmt);
        header("Location:../dashadmin.php");
    }else{
        die("ERROR (1003): Request to add a script without a submition!");
    }