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
            <h3 class="text-5xl underline pt-9 pl-5"> Apply to: "PLACE SESSION HERE"</h3>
            <br>
            <a href="applylogged.php">loggedin</a>
            <div class="pl-5">
                <form class="" action="/action_page.php">
                    <label>What is your first and last name? &#40;28 limit&#41;</label><br>
                    <input class="rounded-md border-2 border-green-800"  type="text" id="name" name="name"><br><br>
                    <label for="lname">Whats your email?</label><br>
                    <input class="rounded-md border-2 border-green-800" type="email" id="email" name="email"><br><br>
                    <label for="lname">Whats your phone number?</label><br>
                    <input class="rounded-md border-2 border-green-800" type="tel" id="email" name="email"><br><br>
                    <label for="lname">Why are you applying to this dojo?</label><br>
                    <textarea class="rounded-md border-2 border-green-800" id="app_reason" name="app_reason" rows="10" cols="30">I am applying to this dojo because...</textarea><br><br>
                    <label for="Fav_1">Choose your first favorite:</label><br>
                    <input class="rounded-md border-2 border-green-800" list="Fav_1" name="Fav_1">
                    <datalist id="Fav_1">
                        <option value="Basics of Phython">Learning syntax and printing</option>
                        <option value="Intro to algorithms">If else, While ect</option>
                        <option value="How to use replit">Starting up your first IDE</option>
                    </datalist> <br> <br>
                    <label for="Fav_2">Choose your second favorite:</label><br>
                    <input class="rounded-md border-2 border-green-800" list="Fav_2" name="Fav_2">
                    <datalist id="Fav_2">
                        <option value="Basics of Phython">Learning syntax and printing</option>
                        <option value="Intro to algorithms">If else, While ect</option>
                        <option value="How to use replit">Starting up your first IDE</option>
                    </datalist> <br> <br>
                    <label for="Fav_3">Choose your third favorite:</label><br>
                    <input class="rounded-md border-2 border-green-800" list="Fav_3" name="Fav_3">
                    <datalist id="Fav_3">
                        <option value="Basics of Phython">Learning syntax and printing</option>
                        <option value="Intro to algorithms">If else, While ect</option>
                        <option value="How to use replit">Starting up your first IDE</option>
                    </datalist><br><br>
                    <input type="submit" value="Submit">
                </form>
            </div>

        </div>
    </body>
</html>