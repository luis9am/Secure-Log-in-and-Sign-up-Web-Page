<?php
/**
 * Created by PhpStorm.
 * User: luui9
 * Date: 11/2/2017
 * Time: 3:00 PM
 */

if(isset($_POST['submit'])){
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../mainpage.php");
    exit();
}