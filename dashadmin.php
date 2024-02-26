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
            try{
            include("snippets/navbar.php");
            include ("scripts/connection.php");
            //Checks if the user is logged in via a cookie
            if(isset($_COOKIE["user"])){
                $user = $_COOKIE["user"];
                $stmt = $conn->prepare("SELECT Admin_flag FROM user WHERE Name = ?");
                mysqli_stmt_bind_param($stmt,"s", $user);
        
                $stmt->execute(); $stmt->store_result(); 
                $stmt->bind_Result($Admin_flag);
                $stmt->fetch();
        
                if($Admin_flag == true){
                    echo"<script>console.log('Logged in correctly')</script>";
                }
                else{
                    die("ERROR (1001): Request for admin dashboard from regular user!");
                };
            }else{
                die("ERROR (1002): Request for admin dashboard from unlogged in user!");
            }
        }catch(Exception $e){
            echo"ERROR (1007): Failed to connect for user dashboard!";
        }
        ?>
        <div>
            <div class="flex justify-between">
                <h3 class="text-5xl pt-9 pl-5">Admin dashboard:</h3>
                <a class="my-auto" href="adddojo.php">
                    <p class="nav_apply my-auto text-2xl py-2 mr-10">Add a Dojo</p>
                </a>
            </div>
            <div class="grid grid-cols-2 rounded-lg">
                <?php 
                    include ("scripts\connection.php");
                    $sql = "SELECT * FROM dojos";
                    $result = $conn->query($sql);
                    //Goes through all of the dojos, showing them all the users within their arrays. 
                    while($rows=$result->fetch_assoc()){
                ?>   
                <div class="grid grid-cols-2 bg-green-200 mx-20 my-20 rounded-lg">
                    <div>
                        <div class="flex justify-between">
                            <h3 class="text-2xl pt-3 px-5"><?php echo"".$rows["Dojo_name"]?></h3>
                            <div class="flex gap-3">
                                <a href=<?php echo'edit_dojo.php?ID='.$rows['Dojo_ID']; ?> class="my-auto">
                                    <img src="img\Edit_icon.svg" alt="HTML tutorial" class="w-7">
                                </a>
                                <a href=<?php echo'scripts\delete_script.php?ID='.$rows['Dojo_ID']; ?> class="my-auto">
                                    <img src="img\Cancel_icon.svg" alt="HTML tutorial" class="w-8">
                                </a>
                            </div>
                        </div>
                        <hr class="mx-10 border-gray-800 my-3">
                        <p class="mx-5"><?php echo"".$rows["Dojo_desc"]?></p>
                        <p class="mx-5 pt-3">Activities:</p>
                        <p class="mx-5"><?php echo"".$rows["Dojo_activities"]?></p>
                        <p class="py-3 mx-5">Date: <?php echo"".$rows["Dojo_date"]?></p>
                    </div>
                    <?php echo "<img src='data:image;base64,".base64_encode($rows["Dojo_img"])."'>"; ?>
                </div> 
                </a> 
            <?php
                } 
            ?>
            </div> 
        </div>
        
    </body>
</html>