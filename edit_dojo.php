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
            //This code is from the dashadmin page, checking if the user is an admin or not.
            try{
                include("snippets/navbar.php");
                include ("scripts/connection.php");
                if(isset($_COOKIE["user"])){
                    $user = $_COOKIE["user"];
                    $stmt = $conn->prepare("SELECT Admin_flag FROM user WHERE Name = ?");
                    mysqli_stmt_bind_param($stmt,"s", $user);
            
                    $stmt->execute(); $stmt->store_result(); 
                    $stmt->bind_Result($Admin_flag);
                    $stmt->fetch();
                    
                    if($Admin_flag == true){
                        echo"<script>console.log('Admin account access success!')</script>";
                    }
                    else{
                        die("ERROR (1001): Request for admin dashboard from regular user!");
                    };
                }else{
                    die("ERROR (1002): Request for admin dashboard from unlogged in user!");
                }
                $id = $_GET["ID"];
                $stmt = $conn->prepare("SELECT Dojo_name, Dojo_desc, Dojo_date, Dojo_activities FROM dojos WHERE Dojo_ID = ?");
                $stmt->bind_param("s", $id);
                $stmt->execute(); 
                $stmt->store_result(); 
                $stmt->bind_result($dojo_name, $dojo_desc, $dojo_date, $activities_array);
                $stmt->fetch();
            ?>
            <div>
                <h3 class="text-5xl pt-9 pl-5">Admin dashboard/editing <q><?php echo"".$dojo_name?></q></h3>
            </div>
            <div class="pl-5">
                <form class="" action="scripts\edit_script.php" method="POST" name="form" onsubmit="isValid();" >
                    <label>Whats the name of the Dojo?</label><br>
                    <input required class="rounded-md border-2 border-green-800"  type="text" id="dojo_name" name="dojo_name" value="<?php echo"".$dojo_name?>"><br><br>
                    <label for="lname">Whats the date for the Dojo?</label><br>
                    <input required class="rounded-md border-2 border-green-800" type="date" id="dojo_date" name="dojo_date" value="<?php echo"".$dojo_date?>"><br><br>
                    <label for="lname">Description of Dojo</label><br>
                    <textarea required class="rounded-md border-2 border-green-800" id="dojo_desc" name="dojo_desc" rows="3" cols="30"><?php echo"".$dojo_desc?></textarea><br><br>
                    <label for="lname">What activities are avalible for the Dojo? Please seperate with a <q>|</q></label><br>
                    <textarea required class="rounded-md border-2 border-green-800" type="text" id="dojo_act" name="dojo_act" rows="1" cols="30" > <?php echo"".$activities_array?></textarea><br><br>
                    <input  hidden type="text"name="dojo_id" value=<?php echo"".$id?> />
                    <input type="submit" value="submit" name="submit" class="bg-pink-200 hover:bg-pink-100 px-4 py-1 rounded-lg text-1xl">
                </form>
                <script>
                    function isValid() {
                        //Due to this being for admins, this can always be sent as true. More finale versions will have extra verification.
                        return true;
                    };
                </script>
            </div>
            <?php
            }catch(Exception $e){
                echo"ERROR (1006): Database request rejected for edit dojo!";
            }
            ?>
        </div>
    </body>
</html>