<?php
    include ("connection.php");
    //Checks if the user has submited
    if (isset($_POST['submit'])) {
        //Checks is the user either is logged in or not, using the id Cookie. When Sessions are implimented, it'll check for it too.
        if(isset($_COOKIE["id"])){
            //If the user is logged in, it'll go through this section of code.
            $id = $_COOKIE["id"];
            //Preparing the connection to the database using SQL. The connection (conn) is from the "connection.php" code
            try {
                $stmt = $conn->prepare("SELECT name, email, phone FROM user WHERE id = ?");
                //Binding the paramerters for the SQL.
                mysqli_stmt_bind_param($stmt,"s", $id);
                mysqli_stmt_execute($stmt);
                //Binding results from the SQL to varivbles to use. This then gets placed into the database.
                $stmt->bind_Result($username, $email, $phone);
                $stmt->fetch();
                $stmt->close();
            } catch (\Throwable $th) {
                echo("ERROR (1004): Request to application without a submition!");
            }
        }else{
            //If the user isn't logged in, it'll ask for a this infomation, although it isn't required for the user to input this other then name.
            $username = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            //Sets default ID used for users not logged in. 
            $id = 0;
        }
        //Mass assigns varibles from non-logged in users from the form earlier.
        $app_rea = $_POST["app_reason"];
        $fav1 = $_POST["Fav_1"];
        $fav2 = $_POST["Fav_2"];
        $fav3 = $_POST["Fav_3"];
        //Assigns the dojo varibles name and date, to save it to the database 
        $dojo_name = $_POST["dojo_name"];
        $dojo_date = $_POST["dojo_date"];
        //Creates the fav list varible using the inputs by the user, and seperating them with "|"
        $fav_list = '';
        $fav_list .= $fav1. "|" . $fav2. "|" . $fav3;
        //Preparing the connection to the database using SQL. The connection (conn) is from the "connection.php" code
        $stmt = $conn->prepare("INSERT INTO application(name,email,phone,App_reason,Fav_list,ID,App_Name,App_Date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        //Binding the paramerters for the SQL.
        mysqli_stmt_bind_param($stmt,"ssssssss", $username, $email, $phone, $app_rea, $fav_list, $id, $dojo_name, $dojo_date);
        //Executing the SQL code
        mysqli_stmt_execute($stmt);
        //Closes the connection.
        $stmt->close();
        //Sends over to the main page
        header("Location:../page.php");
    }else{
        die("ERROR (1004): Request to application without a submition!");
    }
