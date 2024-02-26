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
            <h3 class="text-5xl pt-9 pl-5">Sign up</h3>
            <br>
            <div class="pl-5">
                <form name="form" action="scripts\signup_script.php" method="POST" onsubmit="isValid();">
                    <label>What is your first and last name? &#40;28 limit Required&#41;</label><br>
                    <input class="rounded-md border-2 border-green-800"  type="text" id="name" name="name" required><br><br>
                    <label for="lname">Password? &#40;28 limit Required&#41;</label><br>
                    <input class="rounded-md border-2 border-green-800" type="pass" id="password" name="password" required><br><br>
                    <label for="lname">Email </label><br>
                    <input class="rounded-md border-2 border-green-800" type="email" id="email" name="email"><br><br>
                    <label for="lname">Phone number</label><br>
                    <input class="rounded-md border-2 border-green-800" type="phone" id="phone" name="phone"><br><br>
                    <label for="lname">Birthday</label><br>
                    <input class="rounded-md border-2 border-green-800" type="date" id="bday" name="bday"><br><br>
                    <input type="submit" value="submit" name="submit" class="bg-pink-200 hover:bg-pink-100 px-4 py-1 rounded-lg text-1xl">
                    <a class="mt-3 ml-3" href="signup.php">Sign up</a>
                </form>
                <script>
                //Function that test the valid of the users inputs inside of the second part of the isValid function.
                function typeValid(input){
                    var inputValidation = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    return inputValidation.test(input);
                }
                //Function that validates the user inputs.
                function isValid() {
                    var user = document.form.name.value;
                    var pass = document.form.password.value;
                    var email = document.form.email.value;
                    var phone = document.form.phone.value;
                    var date = document.form.bday.value;
                    if(user === "" || pass === "" || email === "" || phone === "" || date === ""){
                        alert("Name, application reason, or favorites are empty.");
                        return false;
                    }
                    //Uses the function earlier to send over each varible, checking the validity.
                    if(!typeValid(user) || !typeValid(pass) || !typeValid(email) || !typeValid(phone) || !typeValid(date)){
                        alert("Invalid input in one of the fields.");
                        return false;
                    }
                    return true;
                }
            </script>
                
            </div>

        </div>
    </body>
</html>