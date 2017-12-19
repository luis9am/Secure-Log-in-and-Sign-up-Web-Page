<?php
/**
 * Created by PhpStorm.
 * User: Luis A. Mireles
 * Date: 11/2/2017
 * Time: 10:30 AM
 */

session_start();

if(isset($_POST['submit'])){
    include 'dbh.inc.php';

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //error handlers

    //check if inputs are empty
    if(empty($uid) || empty($pwd)){
        header("Location: ../mainpage.php?login=empty");
        exit();
    } else{
        $sql = "SELECT * FROM users WHERE username='$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        //if no results match within database
        if($resultCheck < 1) {
            header("Location: ../mainpage.php?login=errorl1");
            exit();
        } else {
            //check rows associated with field username
            if($row = mysqli_fetch_assoc($result)) {
                //custom salt
                $salt = "LmP3" . $uid;
                $hashedPwdCheck = password_verify($salt.$pwd, $row['password']);
                //$hashedPwdCheck = $row['password']; //bypass hash

                //password check
                if ($hashedPwdCheck == false) {
                    header("Location: ../mainpage.php?login=error12");
                    exit();
                } elseif ($hashedPwdCheck == true) {
                    //set SESSION variables & log in the user
                    $_SESSION['u_id'] = $row['username'];
                    $_SESSION['u_fn'] = $row['firstname'];
                    $_SESSION['u_ln'] = $row['lastname'];
                    $_SESSION['u_uid'] = $row['username'];
                    $_SESSION['u_admin'] = $row['is_admin'];
                    header("Location: ../mainpage.php?login=success");

                    //Insert the last login into DB
                    $timestamp = date("Y-m-d H:i:s");
                    $sqlEntry = "INSERT INTO users (last_login) VALUES ('$timestamp')";
                    exit();
                }
            } else {
                header("Location: ../mainpage.php?login=error");
                exit();
            }
        }
    }
} else {
    header("Location: ../mainpage.php?login=error");
    exit();
}