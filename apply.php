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
            <h3 class="text-5xl underline pt-9 pl-5"> Apply to: "<?php echo''.$_GET["ID"]?>"</h3>
            <br>
            <a href="applylogged.php">loggedin</a>
            <div class="pl-5">
                <form class="" action="scripts\apply_script.php" method="POST" name="form" onsubmit="isValid();" >
                    <label>What is your first and last name? &#40;28 limit&#41;</label><br>
                    <input class="rounded-md border-2 border-green-800"  type="text" id="name" name="name"><br><br>
                    <label for="lname">Whats your email?</label><br>
                    <input class="rounded-md border-2 border-green-800" type="email" id="email" name="email"><br><br>
                    <label for="lname">Whats your phone number?</label><br>
                    <input class="rounded-md border-2 border-green-800" type="tel" id="phone" name="phone"><br><br>
                    <label for="lname">Why are you applying to this dojo?</label><br>
                    <textarea class="rounded-md border-2 border-green-800" id="app_reason" name="app_reason" rows="10" cols="30">I am applying to this dojo because...</textarea><br><br>
                    <label for="Fav_1">Choose your first favorite:</label><br>
                    <?php
                        include("scripts/connection.php");
                        $id = $_GET["ID"];
                        $stmt = $conn->prepare("SELECT Dojo_Activities FROM dojos WHERE Dojo_Name = ?");
                        $stmt->bind_param("i", $id); // Assuming Dojo_ID is an integer
                        $stmt->execute(); 
                        $stmt->store_result(); 
                        $stmt->bind_result($activities_array); // Corrected method name
                        $stmt->fetch();
                        $activities = explode("|", $activities_array, 3);
                    ?>

                    
                    <input class="rounded-md border-2 border-green-800" list="Fav_1" name="Fav_1">
                    <datalist id="Fav_1">
                        <?php 
                            foreach ($activities as $activity) {
                                echo"<option>".$activity."</option>";
                            }
                        ?>
                    </datalist> <br> <br>
                    <label for="Fav_2">Choose your second favorite:</label><br>
                    <input class="rounded-md border-2 border-green-800" list="Fav_2" name="Fav_2">
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
                    </datalist><br><br>
                    <input type="submit" value="submit">
                </form>
                <script>
                    function isValid() {
                        return true;
                    }
                </script>
            </div>

        </div>
    </body>
</html>