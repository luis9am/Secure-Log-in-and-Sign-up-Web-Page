<!--
 * Created by PhpStorm.
 * User: Luis A Mireles
 * Date: 10/28/2017
 * Time: 12:34 AM

                                This is the User Page
 -->

<?php
include_once 'header.php'
?>


<section class="main-container">
    <div class="main-wrapper">
        <h1>User Page:</h1>

        <?php
        //admin access
        if(isset($_SESSION['u_id']) && ($_SESSION['u_admin'] == 1)){
            echo "Welcome Admin: ".$_SESSION['u_uid']." please visit any of the below links";
            echo '<ul style="list-style-type:disc"> <br><br>
                        <li><a href="admin.php">Navigate to the Admin Page</a></li>
                        <li><a href="mainpage.php">Navigate to the Main Page</a></li>';
        }
        //user access
        elseif(isset($_SESSION['u_id'])){
            echo "<br>Welcome ".$_SESSION['u_fn']."!!";
            echo '<ul style="list-style-type:disc"> <br><br>
                        <li><a href="mainpage.php">Navigate to the Main Page</a></li>
                    </ul>';
        }
        //no access
        else {
            echo "You are unable to access functionality of this page.. Please login";
        }
        ?>

    </div>
</section>

<?php
include_once 'footer.php'
?>