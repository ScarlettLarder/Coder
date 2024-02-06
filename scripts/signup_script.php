<?php
    include ("connection.php")
        $username = $_POST["name"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($conn, $sql); 
        $num = mysqli_num_rows($result);

        if($num == 0) {
            $hash_password($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO 'user' ('Name', 'Password') VALUES ('$username', '$hash_password')";
            $result = mysqli_query($conn, $sql);

        }
    
?>