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
            echo"<script>console.log('wow!')</script>";

            if(isset($_COOKIE["user"])){
                $user = $_COOKIE["user"];
                $stmt = $conn->prepare("SELECT Admin_flag FROM user WHERE Name = ?");
                mysqli_stmt_bind_param($stmt,"s", $user);
        
                $stmt->execute(); $stmt->store_result(); 
                $stmt->bind_Result($Admin_flag);
                $stmt->fetch();
        
                if($Admin_flag == false){
                    echo"works!";
                }
                else{
                    die("ERROR (01): Request for admin dashboard from regular user!");
                };
            }else{
                die("ERROR (02): Request for admin dashboard from unlogged in user!");
            }
        ?>
        <div>
            <div class="flex pt-9 pl-5 justify-between">
                <h3 class="text-5xl">Hello <?php echo"".$_COOKIE["user"]?></h3>
                <button class="text-3xl py-2 px-4 bg-pink-200 rounded-2xl mr-10">Settings</button>
            </div>
            <p class="text-3xl my-10 ml-20">Upcoming Sessions:</p>
            <div class="grid grid-cols-2 rounded-lg">
                <div class="grid grid-cols-2 bg-green-200 mx-20 mb-20 rounded-lg">
                    <div>
                        <h3 class="text-2xl pt-3 px-5">Intro to programming with python</h3>
                        <hr class="mx-10 border-gray-800 my-3">
                        <p class="mx-5">With this session, we teach basic syntax and algorithms, making your first text based game!</p>
                        <p class="mx-5 pt-3">Activities:</p>
                        <p class="mx-5">Algorithms | Game making | Syntax</p>
                        <p class="py-3 mx-5"> Date:12/4/24 - 2pm</p>
                    </div>

                    <img src="img/session2_img.jpg">
                </div>

            </div>

        </div>
        
    </body>
</html>