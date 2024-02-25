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
            <?php
                include("scripts/connection.php");
                $id = $_GET["ID"];
                $stmt = $conn->prepare("SELECT Dojo_Activities, Dojo_date, Dojo_name FROM dojos WHERE Dojo_Name = ?");
                $stmt->bind_param("s", $id); // Assuming Dojo_Name is a string
                $stmt->execute(); 
                $stmt->store_result(); 
                $stmt->bind_result($activities_array, $dojo_date, $dojo_name); // Corrected method name
                $stmt->fetch();
                $activities = explode("|", $activities_array, 3);
            ?>

            <h3 class="text-5xl underline pt-4 pl-5"> Apply to: "<?php echo''.$_GET["ID"]?>"</h3>
            <div class="pl-5"><br>
                <form action="scripts\apply_script.php" method="POST" name="form" onsubmit="isValid();" >
                    <input type="hidden" name="dojo_name" value="<?php echo"".$dojo_name ?>">
                    <input type="hidden" name="dojo_date" value="<?php echo"".$dojo_date ?>">
                    <label>What is your first and last name? &#40;28 limit&#41;</label><br>
                    <input class="rounded-md border-2 border-green-800"  type="text" id="name" name="name" required><br><br>
                    <label for="name">Whats your email?</label><br>
                    <input class="rounded-md border-2 border-green-800" type="email" id="email" name="email"><br><br>
                    <label for="phone">Whats your phone number?</label><br>
                    <input class="rounded-md border-2 border-green-800" type="tel" id="phone" name="phone" ><br><br>
                    <label for="app_reason">Why are you applying to this dojo?</label><br>
                    <textarea class="rounded-md border-2 border-green-800" id="app_reason" name="app_reason" rows="10" cols="30" required>I am applying to this dojo because...</textarea><br><br>
                    <label for="Fav_1">Choose your first favorite:</label><br>    
                    <input class="rounded-md border-2 border-green-800" list="Fav_1" name="Fav_1" required>
                    <datalist id="Fav_1">
                        <?php 
                            foreach ($activities as $activity) {
                                echo"<option>".$activity."</option>";
                            }
                        ?>
                    </datalist> <br> <br>
                    <label for="Fav_2">Choose your second favorite:</label><br>
                    <input class="rounded-md border-2 border-green-800" list="Fav_2" name="Fav_2" required>
                    <datalist id="Fav_2">
                        <?php 
                            foreach ($activities as $activity) {
                                echo"<option>".$activity."</option>";
                            }
                        ?>
                    </datalist> <br> <br>
                    <label for="Fav_3">Choose your third favorite:</label><br>
                    <input class="rounded-md border-2 border-green-800" list="Fav_3" name="Fav_3" required>
                    <datalist id="Fav_3">
                    <?php 
                            foreach ($activities as $activity) {
                                echo"<option>".$activity."</option>";
                            }
                    ?>
                    </datalist><br><br>
                    <input type="submit" value="submit" name="submit" class="bg-pink-200 hover:bg-pink-100 px-4 py-1 rounded-lg text-1xl mb-10">
                </form>
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

        </div>
    </body>
</html>