<?php
include_once '../config/config.php';
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ((!empty($_SESSION['userRegHash'])) && ($_SESSION['userRegHash'] == $_POST['hash'])) {
    $email = xssfilter($_POST['email']);
    $mobile = xssfilter($_POST['mobile']);
    $fname = xssfilter($_POST['fname']);
    $lname = xssfilter($_POST['lname']);
    $pass = xssfilter($_POST['pass']);

    $encPass = aes($pass, 'encrypt');

    $checkEmail = numRows("SELECT * FROM `user` WHERE `email` = '$email'");
    $checkMobile = numRows("SELECT * FROM `user` WHERE `mobile` = '$mobile'");

    if ($checkEmail == 1) {
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> Email Already Used.
        </div>
        <?php
        exit();
    }
    if ($checkMobile == 1) {
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> Mobile No Already Used.
        </div>
        <?php
        exit();
    }

    $regUser = exeQuery("INSERT INTO `user`(`name`, `email`, `mobile`,`password`, `verify`) VALUES "
            . "('$fname $lname','$email','$mobile','$encPass','N')");
    if ($regUser == true) {
        ?>
        <script>
            window.location = 'index.php';
        </script>
        <?php
    }
} else {
    ?>
    <div class="alert alert-danger">
        <strong>Error!</strong> Bad Request.
    </div>
    <?php
}
