<?php

include_once '../config/config.php';
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ((!empty($_SESSION['admin']['username'])) && (!empty($_SESSION['admin']['password']))) {
    $username = $_SESSION['admin']['username'];
    $password = $_SESSION['admin']['password'];
    $checkAdmin = runQuery("SELECT * FROM `admin` a WHERE a.`email` = '$username'");
    if ((!empty($checkAdmin[0])) && ($checkAdmin[0]['password'] == $password)) {
        
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
