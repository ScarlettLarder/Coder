<?php
    include ("connection.php");

    if (isset($_POST['submit'])) {
        $dojo_name = $_POST["dojo_name"];
        $dojo_desc = $_POST["dojo_desc"];
        $dojo_activties = $_POST["dojo_act"];
        $dojo_date = $_POST["dojo_date"];
        $dojo_ID = $_POST["dojo_id"];
        $stmt = $conn->prepare("UPDATE dojos SET Dojo_name=?, Dojo_desc=?, Dojo_activities=?, Dojo_date=? WHERE Dojo_ID = ?");
        mysqli_stmt_bind_param($stmt,"sssss", $dojo_name, $dojo_desc, $dojo_activties, $dojo_date, $dojo_ID);
        mysqli_stmt_execute($stmt);
    }
