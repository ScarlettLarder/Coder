<?php
    include ("connection.php");

    if (isset($_POST['submit'])) {
        $username = $_POST["name"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $birthday = $_POST["bday"];

        //Hashs the password to be placed into the database.
        $hash_pass = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO user(name, password,email,phone,birthday) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt,"sssss", $username, $hash_pass, $email, $phone, $birthday);
        mysqli_stmt_execute($stmt);

    }
