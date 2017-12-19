<?php
/**
 * Created by PhpStorm.
 * User: luui9
 * Date: 11/16/2017
 * Time: 4:45 PM
 */

include_once 'dbh.inc.php';


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

if (isset($_POST['userlist'])) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<br>Name: " . $row['firstname'] . " " . $row['lastname'];
            echo "<br>Username: " . $row['username'];
            echo "<br>Password: " . $row['password'];
            echo "<br>Date: " . $row['last_login'];
            echo "<br>Admin: " . $row['is_admin'];
            echo "<br><br>";
        }
    }
        mysqli_close($conn);
}