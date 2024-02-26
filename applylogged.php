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
        <!-- Gets the name from the url sent, and echos it out for the user, for them to make sure its correct.  -->
        <h3 class="text-5xl underline pt-9 pl-5"> Apply to: "<?php echo''.$_GET["ID"]?>"</h3>
        <br>
        <div class="pl-5">
            <form class="" action="scripts\apply_script.php" method="POST" name="form" onsubmit="return isValid();" >
                <label for="lname">Why are you applying to this dojo?</label><br>
                <textarea class="rounded-md border-2 border-green-800" id="app_reason" name="app_reason" rows="10" cols="30" required>I am applying to this dojo because...</textarea><br><br>
                <label for="Fav_1">Choose your first favorite:</label><br>
                <?php
                    //Setting up for the form, getting infomation to set as placeholders to help the user.
                    include("scripts/connection.php");
                    //Gets the name of the dojo from the url. 
                    $id = $_GET["ID"];
                    $stmt = $conn->prepare("SELECT Dojo_Activities, Dojo_date, Dojo_name FROM dojos WHERE Dojo_Name = ?");
                    $stmt->bind_param("s", $id);
                    $stmt->execute(); 
                    $stmt->store_result(); 
                    $stmt->bind_result($activities_array, $dojo_date, $dojo_name);
                    $stmt->fetch();
                    //Makes the list of varibles seperated with | into an array that'll be used in a bit for the user forms.
                    $activities = explode("|", $activities_array, 3);
                ?>
                <!-- The array of varibles exploded earlier is now used, and for each 3 of them, it'll be displayed as an option for the user.  -->
                <input type="hidden" name="dojo_name" value="<?php echo"".$dojo_name ?>">
                <input type="hidden" name="dojo_date" value="<?php echo"".$dojo_date ?>">
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
                <input class="rounded-md border-2 border-green-800" list="Fav_3" name="Fav_3">
                <datalist id="Fav_3">
                <?php 
                    foreach ($activities as $activity) {
                        echo"<option>".$activity."</option>";
                    }
                ?>
                </datalist> <br> <br>
                <input type="submit" value="submit" name="submit" class="bg-pink-200 hover:bg-pink-100 px-4 py-1 rounded-lg text-1xl">
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
                    var app_reason = document.form.app_reason.value;
                    var Fav_1 = document.form.Fav_1.value;
                    var Fav_2 = document.form.Fav_2.value;
                    var Fav_3 = document.form.Fav_3.value;
                    if(user === "" || app_reason === "" || Fav_1 === "" || Fav_2 === "" || Fav_3 === ""){
                        alert("Name, application reason, or favorites are empty.");
                        return false;
                    }
                    //Uses the function earlier to send over each varible, checking the validity.
                    if(!typeValid(user) || !typeValid(app_reason) || !typeValid(Fav_1) || !typeValid(Fav_2) || !typeValid(Fav_3)){
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