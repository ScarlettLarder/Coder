<?php
    include ("connection.php");
    echo"Hyea!";
    if (isset($_POST['submit'])) {
        
        $username = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $app_rea = $_POST["app_reason"];
        $fav1 = $_POST["fav_1"];
        $fav2 = $_POST["fav_2"];
        $fav3 = $_POST["fav_3"];
        $fav_list .= $fav1 . $fav2 . $fav3;
        
        $stmt = $conn->prepare("INSERT INTO application(name,email,phone,App_reason,Fav_list) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt,"sssss", $username, $email, $phone, $app_rea, $fav_list);
        mysqli_stmt_execute($stmt);
    }
?>