<?php 
    include ("scripts\connection.php")
?>

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
        <nav class="navbar"> 
            <h1 class="text-5xl p-2"><a href="page.php">Coder Dojo</a></h1>
            <div class="nav_heading">
                <a href="aboutus.php"> About us </a>  
                <a href="sessions.php"> Sessions </a>    
                <a href="login.php"> Login </a>  
                <a href="apply.php" class="nav_apply"> Apply </a>  
            </div>
        </nav>

        <div class="grid grid-cols-2">
            <div class="mx-auto my-auto">
                <h3 class="text-4xl"> Welcome to the </h3>
                <h2 class="text-9xl"> Dojo </h2>
                <hr style="border-top: 4px solid #0B3953"/>
                <p class="text-2xl pt-10"> We are the CoderDojo, helping people learn how to code <br> and improve their skills </p>
            </div>
            <div class="main_sec_inner">
                <Image style="border-radius: 5px;" src="img/main_img.jpg"/>
            </div>
        </div>

        <div style="background-color:#E7FFF6;" class="grid grid-cols-2">
            <div class="main_sec_inner">
                <Image style="border-radius: 5px;" src="img/main_img.jpg"/>
            </div>
            <div class="mx-auto my-auto">
                <h3 class="text-5xl pb-3"> Check out whats available </h3>
                <hr style="border-top: 4px solid #0B3953"/>
                <p class="text-2xl pt-3"> You can see what Dojos are free to book here</p>
                <div class="flex pt-3">
                    <p class="bg-pink-300 hover:bg-pink-200 px-4 py-1 rounded-lg">Sessions</p>
                </div>
            </div>

        </div>

    </body>
</html>