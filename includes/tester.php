<?php
/**
 * Created by PhpStorm.
 * User: luui9
 * Date: 11/2/2017
 * Time: 2:36 PM
 */
include_once "dbh.inc.php";

$query = mysqli_query("SELECT * FROM users") or die(mysqli_error());
$results = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($results)) {
    echo '<tr>';
    foreach ($row as $field) {
        echo '<td>' . htmlspecialchars($field) . '</td>';
    }
    echo '</tr>';
}