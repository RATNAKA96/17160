<?php
include_once 'session.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ((!empty($_SESSION['profileUpdateHash'])) && ($_SESSION['profileUpdateHash'] == $_POST['hash'])) {
    $name = xssFilter($_POST['name']);
    $mobile = xssFilter($_POST['mobile']);
    $username = xssFilter($_POST['username']);
    $gender = xssFilter($_POST['gender']);
    $experience = xssFilter($_POST['experience']);
    $qualification = xssFilter($_POST['qualification']);
    $designation = xssFilter($_POST['designation']);
    $password = xssFilter($_POST['password']);
    $department = xssFilter($_POST['department']);

    $checkUsername = runQuery("SELECT * FROM `user` WHERE `username` = '$username'");

    if ($checkUsername[0]['username'] == $username) {
        if ($checkUsername[0]['email'] != $email) {
            ?>
            <div class="alert alert-danger">
                <strong>Error!</strong> Username Already Used.
            </div>
            <?php
            exit();
        }
    }

    $encPass = aes($password, 'encrypt');
    $checkUser = runQuery("SELECT * FROM vcportal.`user` u WHERE u.`email` = '$email'");
    $pass = aes($checkUser[0]['password'], 'decrypt');
    if ((!empty($checkUser[0])) && ($pass == $password)) {
        $update = exeQuery("UPDATE `user` SET `name`='$name',`mobile`='$mobile',`gender`='$gender',`experience`='$experience',`dept` = '$department',`qualification`='$qualification',`designation`='$designation',`username`='$username' WHERE `email` = '$email'");
        if ($update == true) {
            ?>
            <script>
                window.location = 'profile.php?action=Success&msg=Profile Updated.';
            </script>
            <?php
            exit();
        } else {
            ?>
            <div class="alert alert-danger">
                <strong>Error!</strong> Something Went Wrong Try Again Later.
            </div>
            <?php
            exit();
        }
    } else {
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> Invalid Password.
        </div>
        <?php
    }
} else {
    ?>
    <div class="alert alert-danger">
        <strong>Error!</strong> Bad Request.
    </div>
    <?php
}