<!DOCTYPE html>
<html>
    <head>
        <title>Coder Dojo</title>
        <link href="styles.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@500&family=Libre+Barcode+128+Text&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php 
            include("snippets/navbar.php");
            include ("scripts/connection.php");
        ?>
        <div>
            <div class="flex pt-9 justify-between">
                <h3 class="text-5xl ml-20">Hello <?php echo"".$_COOKIE["user"]?></h3>
                <button class="text-3xl py-2 px-4 bg-pink-200 rounded-2xl mr-10">Settings</button>
            </div>
            <p class="text-3xl my-10 ml-20">Your upcoming Sessions:</p>
            <div class="grid grid-cols-3 rounded-lg">
                <?php 
                    //try the code below, or an error code will show up for the user.
                    try{
                        $id = $_COOKIE["id"];
                        //Joining together the application table from the user table, to get the data from the users applications. This only applies to applications with the users ID.
                        $sql = "SELECT * FROM application LEFT JOIN user on application.ID=user.ID WHERE user.ID=? ";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        //Show the dojos the user has applied to.
                        while($rows = $result->fetch_assoc()) { 
                    
                ?>  
                <div class="bg-green-200 mx-20 my-5 rounded-lg py-3">
                    <div>
                        <div class="flex">
                            <h3 class="text-2xl px-5"><?php echo $rows["App_Name"]?></h3>
                            <a href=<?php echo'scripts\deleteapp_script.php?ID='.$rows['App_ID']; ?> class="my-auto">
                                <img src="img\Cancel_icon.svg" alt="HTML tutorial" class="w-8">
                            </a>
                        </div>
                        <hr class="mx-10 border-gray-800 my-3">
                        <p class="mx-5"><?php echo $rows["App_Date"]?></p>
                    </div>
                </div> 
            <?php

            } 
            }catch(Exception $e){
                echo"ERROR (1006): Failed to connect for user dashboard!";
            }
            ?>

            </div>
        </div>
        
    </body>
</html>