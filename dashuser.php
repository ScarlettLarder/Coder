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
            if(isset($_COOKIE["user"])){
                $user = $_COOKIE["user"];
                $stmt = $conn->prepare("SELECT Admin_flag FROM user WHERE Name = ?");
                mysqli_stmt_bind_param($stmt,"s", $user);
        
                $stmt->execute(); $stmt->store_result(); 
                $stmt->bind_Result($Admin_flag);
                $stmt->fetch();
        
                if($Admin_flag == false){
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
            <div class="flex pt-9 justify-between">
                <h3 class="text-5xl ml-20">Hello <?php echo"".$_COOKIE["user"]?></h3>
                <button class="text-3xl py-2 px-4 bg-pink-200 rounded-2xl mr-10">Settings</button>
            </div>
            <p class="text-3xl my-10 ml-20">Your upcoming Sessions:</p>
            <div class="grid grid-cols-3 rounded-lg">
                <?php 
                    try{
                        $id = $_COOKIE["id"];
                        $sql = "SELECT * FROM application LEFT JOIN user on application.ID=user.ID WHERE user.ID=? ";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $id);
                        $stmt->execute();
                        $result = $stmt->get_result();
    
                        while($rows = $result->fetch_assoc()) { 
                    
                ?>  
                <div class="bg-green-200 mx-20 my-5 rounded-lg py-3">
                    <div>
                        <h3 class="text-2xl px-5"><?php echo $rows["App_Name"]?></h3>
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