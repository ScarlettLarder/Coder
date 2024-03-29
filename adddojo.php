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
            <h3 class="text-5xl underline pt-9 pl-5">Create a Dojo</h3>
            <br>
            <div class="pl-5">
                <form class="" action="/action_page.php">
                    <label>What is the Dojo called?</label><br>
                    <input class="rounded-md border-2 border-green-800"  type="text" id="name" name="name"><br><br>
                    <label for="lname">Description of Dojo</label><br>
                    <textarea class="rounded-md border-2 border-green-800" id="desc" name="desc" rows="10" cols="30">Description</textarea><br><br>
                    <label>Activities &#40;please seperate with a ,&#41;</label><br>
                    <input class="rounded-md border-2 border-green-800"  type="text" id="activities" name="activities"><br><br>
                    <label>Date and time</label><br>
                    <input class="rounded-md border-2 border-green-800"  type="date" id="date" name="date"><br><br>
                    <input type="submit" value="Submit">
                </form>
            </div>

        </div>
    </body>
</html>