<?php
/**
 * Created by PhpStorm.
 * User: Luis A. Mireles
 * Date: 10/28/2017
 * Time: 4:41 PM
 */

if(isset($_POST["submit"])){

    //include db file
    include_once 'dbh.inc.php';

    $first = mysqli_real_escape_string($conn, $_POST["first"]);
    $last = mysqli_real_escape_string($conn, $_POST["last"]);
    $uid = mysqli_real_escape_string($conn, $_POST["uid"]);
    $pwd = mysqli_real_escape_string($conn, $_POST["pwd"]);
    $isAdmin = mysqli_real_escape_string($conn, (int)(bool)$_POST["isadmin"]);

    //error handlers
    //Layer1: Check if any fields are left empty
    if(empty($first) || empty($last) || empty($uid) || empty($pwd)){
        header("Location: ../admin.php?admin=empty");
        exit();
    } else {
        //Layer2: check if input chars are valid for first & lastname
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            header("Location: ../admin.php?admin=invalid");
            exit();
        } else {
            //Layer3: Check if username is already taken
            $sql = "SELECT * FROM users WHERE username='$uid'";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../mainpage.php?login=error");
                exit();
            } else {
                //Bind parameters to the placeholder
                mysqli_stmt_bind_param($stmt, "s", $uid);
                //Run query in database
                mysqli_stmt_execute($stmt);
                //Check if username exists
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0) {
                    header("Location: ../admin.php?admin=usertaken");
                    exit();
                } else {
                    //Layer4: Hashing password
                    $salt = "LmP3" . $uid;
                    $hashedPwd = password_hash($salt.$pwd, PASSWORD_DEFAULT);
                    $timestamp = date("Y-m-d H:i:s");

                    //Insert the user into DB
                    $sqlEntry = "INSERT INTO users (firstname, lastname, username, password, is_admin, creation_date) 
                VALUES ('$first','$last','$uid','$hashedPwd', '$isAdmin', '$timestamp')";

                    //run query
                    mysqli_query($conn, $sqlEntry);

                    header("Location: ../admin.php?admin=success");
                    exit();
                }
            }
        }
    }

}else{
    header("Location: ../admin.php"); //send to user if not member
    exit(); //stops script from running
}