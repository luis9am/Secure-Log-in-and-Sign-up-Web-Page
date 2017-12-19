<!--
/**
 * Created by PhpStorm.
 * User: Luis A Mireles
 * Date: 11/2/2017
 * Time: 5:08 PM
 */
-->


<?php
include_once 'header.php';
?>


<section class="main-container">
    <div class="main-wrapper">
        <h1>Welcome to the Home Page</h1>

        <?php
        //upon ADMIN successful login
        if(isset($_SESSION['u_id']) && ($_SESSION['u_admin'] == 1)){
            echo "Welcome Admin: ".$_SESSION['u_uid']." please visit any of the below links";
            echo '<ul style="list-style-type:disc"> <br><br>
                        <li><a href="admin.php">Navigate to the Admin Page</a></li>
                        <li><a href="user.php">Navigate to the User Page</a></li>';
        }
        //upon USER successful login
        elseif(isset($_SESSION['u_id'])){
            echo "Welcome: ".$_SESSION['u_uid']."You have successfully logged in! <br>";
            echo '<ul style="list-style-type:disc"> <br><br>
                        <li><a href="user.php">Navigate to the User Page</a></li>';
        }
        ?>

    </div>
</section>

<?php
include_once 'footer.php'
?>