<?php
include_once '../config/config.php';
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (session_destroy()) {
    ?>
    <script>
        window.location = 'index.php';
    </script>
    <?php

}
?>
