<?php
    include ("connection.php");
    if (isset($_POST['submit'])) {

        $username = $_POST["name"];
        $password = $_POST["password"];

        $stmt = $conn->prepare("SELECT id, password FROM user WHERE Name = ?");
        mysqli_stmt_bind_param($stmt,"s", $username);

        $stmt->execute(); $stmt->store_result(); 
        //If request isn't empty
        if ($stmt->num_rows > 0){
            $stmt->bind_Result($id, $hash_pass);
            $stmt->fetch();
            //Uses inbuilt php password verification to see if the password inputted and from the database match.
            if (password_verify($password, $hash_pass)) {
                setcookie("user", $username, time() + 3000, "/", "", true, true);
                setcookie("pass", $pass_hash, time() + 3000, "/", "", true, true);
                setcookie("id", $id, time() + 3000, "/", "", true, true);
                header("Location: ../page.php");
            }else {
                echo"Password couldn't be verified";
            };
        };
        mysqli_stmt_execute($stmt);
    }
