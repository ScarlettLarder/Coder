<?php
    include ("connection.php");
    $app_ID = $_GET["ID"];
    $stmt = $conn->prepare("DELETE FROM application WHERE App_ID = ?");
    mysqli_stmt_bind_param($stmt,"i", $app_ID);
    mysqli_stmt_execute($stmt);