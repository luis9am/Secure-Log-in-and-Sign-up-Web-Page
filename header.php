<!--
 * Created by PhpStorm.
 * User: Luis A Mireles
 * Date: 10/28/2017
 * Time: 5:24 PM
-->
<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Project 3</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css">
</head >
<body>

<header>
    <nav>
        <div class="main-wrapper">
        <ul>
            <li><a href="mainpage.php">Home</a> </li>
            <!--more pages -->
        </ul>
        <div class="nav-login">
            <?php
            if(isset($_SESSION['u_id'])){
                echo '<form action="includes/logout.inc.php" method="POST">
                        <button type="submit" name="submit">Logout</button>
                        </form>';
            } else {
                echo '<form action ="includes/login.inc.php" method="POST">
                <input type="text" name="uid" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <button type="submit" name="submit">Login</button>
            </form>';
            }
            ?>
        </div>
        </div>
    </nav>
</header>
</body>
</html>