<?php
    include ("connection.php");
    $dojo_ID = $_GET["ID"];
    $stmt = $conn->prepare("DELETE FROM dojos WHERE Dojo_ID = ?");
    mysqli_stmt_bind_param($stmt,"i", $dojo_ID);
    mysqli_stmt_execute($stmt);