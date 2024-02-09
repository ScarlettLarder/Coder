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
            include("snippets/navbar.php")
        ?>

        <div class="grid grid-cols-2">
            <div class="main_sec_inner">
                <h3 class="text-6xl pt-10 pl-10 pb-5"> About us</h3>
                <hr style="border-top: 4px solid #0B3953;padding-left:30px; padding-left:30px;  padding-right:30px; padding- "/>
                <h3 class="pl-10 text-3xl"> We are the Coder Dojo, helping people learn how to code and improve their skills. </h3>
                <p class="pl-10 text-3xl">
We aim to help people get more knowledgeable about how tech works and give them the necessary skills for not only tech jobs, but anywhere where coding is needed.</p>
            </div>
            <div class="main_sec_inner">
                <Image style="border-radius: 5px;" src="img/about_img.jpg"/>
            </div>
        </div>

    </body>
</html>