<?php
include_once 'config/config.php';
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ((!empty($_SESSION['ForgetPasswordHash'])) && ($_SESSION['ForgetPasswordHash'] == $_POST['hash'])) {
    $email = checkEmail(xssFilter($_POST['email']));

    if ($email != false) {

        $checkEmail = numRows("SELECT `email` , `password` FROM `user` WHERE `email` = '$email'");
        if ($checkEmail == 1) {
            ?>
            <div class="alert alert-success margin-50">
                <strong>Success!</strong> Password Sent To Email.
            </div>
            <script>
                $('#forget-password-btn').attr('value', 'Resend');
            </script>
            <?php
        } else {
            ?>
            <div class="alert alert-danger margin-50">
                <strong>Error!</strong> Email Not Sent, Please Check Your Email .
            </div>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-danger margin-50">
            <strong>Error!</strong> Enter a valid Email.
        </div>
        <?php
    }
}