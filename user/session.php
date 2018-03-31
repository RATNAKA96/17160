<?php

include_once '../config/config.php';
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ((!empty($_SESSION['user']['username'])) && (!empty($_SESSION['user']['password']))) {
    $username = $_SESSION['user']['username'];
    $email = $_SESSION['user']['username'];
    $password = aes($_SESSION['user']['password'],'decrypt');
    $checkUser = runQuery("SELECT * FROM vcportal.`user` u WHERE u.`email` = '$username'");
    $user_id = $checkUser[0]['uid'];
    $_SESSION['dept'] = $checkUser[0]['dept'];
    $pass = aes($checkUser[0]['password'], 'decrypt');
    if ((!empty($checkUser[0])) && ($pass == $password)) {
        
    } else {
        ?>
        <script>
            window.location = 'index.php';
        </script>
        <?php

    }
} else {
    ?>
    <script>
        window.location = 'index.php';
    </script>
    <?php

}
