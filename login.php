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
            <h3 class="text-5xl pt-9 pl-5">Login</h3>
            <br>
            <div class="pl-5">
                <form class="" action="/action_page.php">
                    <label>What is your first and last name? &#40;28 limit&#41;</label><br>
                    <input class="rounded-md border-2 border-green-800"  type="text" id="name" name="name" required><br><br>
                    <label for="lname">Password?</label><br>
                    <input class="rounded-md border-2 border-green-800" type="pass" id="password" name="password" required><br><br>
                    <input type="submit" value="Submit">
                </form>
                <a class="mt-3" href="signup.php">Sign up</a>
            </div>

        </div>
    </body>
</html>