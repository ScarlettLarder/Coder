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
                <form class="" action="scripts\add_script.php"  method="POST" name="form" onsubmit="isValid();" >
                    <label>What is the Dojo called?</label><br>
                    <input class="rounded-md border-2 border-green-800"  type="text" id="name" name="name" required><br><br>
                    <label for="lname">Description of Dojo</label><br>
                    <textarea class="rounded-md border-2 border-green-800" id="desc" name="desc" rows="10" cols="30" required>Description</textarea><br><br>
                    <label>Activities &#40;please seperate with a <q>|</q> &#41;</label><br>
                    <input class="rounded-md border-2 border-green-800"  type="text" id="activities" name="activities" required><br><br>
                    <label>Date and time</label><br>
                    <input class="rounded-md border-2 border-green-800"  type="date" id="date" name="date" required><br><br>
                    <input type="submit" value="submit" name="submit" class="bg-pink-200 hover:bg-pink-100 px-4 py-1 rounded-lg text-1xl">
                </form>
            </div>
            <script>
                function isValid() {
                    return true;
                }
            </script>
        </div>
    </body>
</html>