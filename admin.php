<?php
/**
 * Created by PhpStorm.
 * User: Luis A. Mireles
 * Date: 11/2/2017
 * Time: 10:30 AM
 * 
 */

include_once 'header.php';
?>


<section class="main-container">
    <div class="main-wrapper">
        <h1>Welcome to the Admin Page</h1>

        <?php
        //if user login matches db records and is admin
        if(isset($_SESSION['u_id']) && ($_SESSION['u_admin'] == 1)){
            echo "Signed in as: ".$_SESSION['u_uid'];

            echo '<ul style="list-style-type:disc"> <br><br>
                        <li><a href="mainpage.php">Navigate to the Main Page</a></li>
                        <li><a href="user.php">Navigate to the User Page</a></li>';

            //form
            echo '<br><br>User sign up: 
                <br><form class="form-group" action="includes/signup.inc.php" method="POST">
                <br><input type="text" name="first" placeholder="Firstname">
                <br><input type="text" name="last" placeholder="Lastname">
                <br><input type="text" name="uid" placeholder="Username">
                <br><input type="password" name="pwd" placeholder="Password">
                <br><label><input type="checkbox" name="isadmin" value=1>Give admin rights?</label>
                <br><button type="submit" name="submit">Sign up</button>
            </form>';

            //form
            echo '<br><br>
                <form class="form-group" action="includes/viewtable.inc.php" method="POST">
                <br><br><button type="submit" name="userlist">View Current User List</button>
            </form>';

        }
        //if user is logged in but not admin
        elseif(isset($_SESSION['u_id'])){
                echo "<br>Welcome ".$_SESSION['u_fn'].", unfortunately you are not an administrator. Please visit one of the links below";
                echo '<ul style="list-style-type:disc"> <br><br>
                        <li><a href="mainpage.php">Navigate to the Main Page</a></li>
                        <li><a href="user.php">Navigate to the User Page</a></li>';
        }
        //if user is not logged in
        else{
            echo "You are unable to access this page.. Please visit our main webpage ";
            echo '<ul style="list-style-type:disc"> <br><br>
                    <li><a href="mainpage.php">Navigate to the Main Page</a></li>
                  </ul>';
        }
        ?>

    </div>
</section>

<?php
include_once 'footer.php'
?>