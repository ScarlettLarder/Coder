<?php
    include ("scripts/connection.php");
    echo"<script>console.log('wow!')</script>";

    $name = $_COOKIE["user"];
    echo"name";
    if(isset($name)){
        $stmt = $conn->prepare("SELECT Admin_flag FROM user WHERE Name = ?");
        mysqli_stmt_bind_param($stmt,"s", $name);

        $stmt->execute(); $stmt->store_result(); 
        $stmt->bind_Result($Admin_flag);
        $stmt->fetch();
        if($Admin_flag == true){
            header("Location: ./dashadmin.php");
        }
        else{
            header("Location: ./dashuser.php"); //Works if user
        };
    }else{
        header("Location: ./page.php");
    }

?>
