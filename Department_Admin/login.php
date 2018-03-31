<?php

include_once '../config/config.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

if ((!empty($_SESSION['admin']['loginHash'])) && ($_SESSION['admin']['loginHash'] == $_POST['hash'])) {
    $username = xssFilter($_POST['username']);
    $password = xssFilter($_POST['password']);

    $checkAdmin = runQuery("SELECT * FROM `departments` WHERE `username` = '$username'");
    if ((!empty($checkAdmin[0])) && ($checkAdmin[0]['password'] == $password)) {
        $_SESSION['admin']['name'] = "Admin( $username )";
        $_SESSION['admin']['username'] = $checkAdmin[0]['username'];
        $_SESSION['admin']['password'] = $checkAdmin[0]['password'];
        ?>
        <script>
            window.location = 'dashboard.php';
        </script>
        <?php

    } else {
        ?>
        <script>
            window.location = 'index.php?msg=Invalid Username or Password';
        </script>
        <?php

    }
} else {
    ?>
    <script>
        window.location = 'index.php?msg=Bad Request';
    </script>
    <?php

}

