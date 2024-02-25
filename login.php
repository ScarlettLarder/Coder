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
            <h3 class="text-5xl pt-9 pl-5">Login</h3>
            <br>
            <div class="pl-5">
                <form class="" action="scripts\login_script.php" method="POST" name="form" onsubmit="isValid();">
                    <label>What is your first and last name? &#40;28 limit&#41;</label><br>
                    <input class="rounded-md border-2 border-green-800"  type="text" id="name" name="name" required><br><br>
                    <label for="lname">Password?</label><br>
                    <input class="rounded-md border-2 border-green-800" type="pass" id="password" name="password" required><br><br>
                    <input type="submit" value="submit" name="submit" class="bg-pink-200 hover:bg-pink-100 px-4 py-1 rounded-lg text-1xl">
                    <a class="mt-3 ml-3" href="signup.php">Sign up</a>
                </form>
            </div>
            <script>
                    function typeValid(input){
                        var inputValidation = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        return inputValidation.test(input);
                    };
                    function isValid() {
                        var user = document.form.user.value;
                        var pass = document.form.pass.value;
                        if(user.valueMissing || app_reason.valueMissing || Fav_1.valueMissing || Fav_2.valueMissing || Fav_3.valueMissing){
                            alert("Username or password is empty.")
                            return false
                        }
                        if(email.typeMismatch){
                            alert("Email incorrectly inputted.")
                            return false
                        }
                        if(typeValid(user) || typeValid(app_reason) || typeValid(Fav_1) || typeValid(Fav_2) || typeValid(Fav_3)){
                            alert("wowza")
                            return false
                        }
                    };
                </script>
        </div>
    </body>
</html>