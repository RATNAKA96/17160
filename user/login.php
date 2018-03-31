<?php

include_once '../config/config.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if ((!empty($_SESSION['userLoginHash'])) && ($_SESSION['userLoginHash'] == $_POST['hash'])) {
    $username = xssFilter($_POST['username']);
    $password = xssFilter($_POST['password']);

    $checkUser = runQuery("SELECT * FROM vcportal.`user` u WHERE u.`email` = '$username'");
    $pass = aes($checkUser[0]['password'], 'decrypt');

    if ((!empty($checkUser[0])) && ($pass == $password)) {
        $_SESSION['user']['name'] = $checkUser[0]['name'];
        $_SESSION['user']['username'] = $checkUser[0]['email'];
        $_SESSION['user']['password'] = $checkUser[0]['password'];
        $_SESSION['user']['verify'] = $checkUser[0]['verify'];
        $_SESSION['user']['uid'] = $checkUser[0]['uid'];

        if (xssFilter($_POST['action']) == 'loginForm') {
            if ((empty($checkUser[0]['gender'])) || (empty($checkUser[0]['qualification'])) || (empty($checkUser[0]['experience'])) || (empty($checkUser[0]['designation'])) || (empty($checkUser[0]['username']))) {
                ?>
                <script>
                    window.location = 'profile.php?msg=Enter all the fields&action=Success';
                </script>
                <?php

            } else {
                ?>
                <script>
                    window.location = '../index.php';
                </script>
                <?php

            }
        } else {
            if ((empty($checkUser[0]['gender'])) || (empty($checkUser[0]['qualification'])) || (empty($checkUser[0]['experience'])) || (empty($checkUser[0]['designation'])) || (empty($checkUser[0]['username']))) {
                ?>
                <script>
                    window.location = 'user/profile.php?msg=Enter all the fields';
                </script>
                <?php

            } else {
                ?>
                <script>
                    window.location = 'index.php';
                </script>
                <?php

            }
        }
    } else {
        if (xssFilter($_POST['action']) == 'loginForm') {
            ?>
            <script>
                window.location = 'index.php?msg=Invalid Username or Password';
            </script>
            <?php

        } else {
            ?>
            <script>
                window.location = 'user/index.php?msg=Invalid Username or Password';
            </script>
            <?php

        }
    }
} else {
    if (xssFilter($_POST['action']) == 'loginForm') {
        ?>
        <script>
            window.location = 'index.php?msg=Bad Request';
        </script>
        <?php

    } else {
        ?>
        <script>
            window.location = 'user/index.php?msg=Bad Request';
        </script>
        <?php

    }
}

    