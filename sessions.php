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

        <div>
            <h3 class="text-5xl pt-9 pl-5">Sessions avaliable:</h3>
            <div class="grid grid-cols-2 rounded-lg">
                <?php 
                    try{
                    include ("scripts\connection.php");
                    $sql = "SELECT * FROM dojos";
                    $result = $conn->query($sql);

                    while($rows=$result->fetch_assoc()){
                ?>  
                    <a href="<?php
                    if(isset($_COOKIE['user'])){
                        echo'applylogged.php?ID='.$rows['Dojo_name'];
                    }else{
                        echo'apply.php?ID='.$rows['Dojo_name'];
                    };
                    ?>"> 
                    
                    <div class="grid grid-cols-2 bg-green-200 mx-20 my-20 rounded-lg">
                        <div>
                            <h3 class="text-2xl pt-3 px-5"><?php echo"".$rows["Dojo_name"]?></h3>
                            <hr class="mx-10 border-gray-800 my-3">
                            <p class="mx-5"><?php echo"".$rows["Dojo_desc"]?></p>
                            <p class="mx-5 pt-3">Activities:</p>
                            <p class="mx-5"><?php echo"".$rows["Dojo_activities"]?></p>
                            <p class="py-3 mx-5">Date: <?php echo"".$rows["Dojo_date"]?></p>
                        </div>
                        <?php echo "<img src='data:image;base64,".base64_encode($rows["Dojo_img"])."'>"; ?>
                    </div> 
                    </a> 
                <?php
                
                    } 
                }catch(Exception $e){
                    echo"ERROR (1005): Database request rejected for sessions!";
                }
                ?>
            </div> 
        </div>
    </body>
</html>