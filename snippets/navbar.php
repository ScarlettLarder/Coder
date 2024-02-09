<nav class="navbar mb-10"> 
    <h1 class="text-5xl p-2"><a href="page.php">Coder Dojo</a></h1>
    <div class="nav_heading">
        <a href="aboutus.php"> About us </a>  
        <a href="sessions.php"> Sessions </a>    
        <?php
            if(isset($_COOKIE["user"])) {
                echo"<a href='admin_script.php'>Hi, ".$_COOKIE["user"]."</a>";
            }else{
                echo"<a href='login.php'>Login</a>";
            }
        ?> 
        <?php
            if(isset($_COOKIE["user"])) {
                echo"<a class='nav_apply' href='applylogged.php'>Apply</a>";
            }else{
                echo"<a class='nav_apply' href='apply.php'>Apply</a>";
            }
        ?>
    </div>
</nav>