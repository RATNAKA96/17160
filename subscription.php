<?php

include_once 'config/config.php';
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ((!empty($_SESSION['scbscribeHash'])) && ($_SESSION['scbscribeHash'] == $_POST['hash'])) {
    $email = checkEmail(xssFilter($_POST['email']));
    $date = TodayDate();
    if ($email != false) {
        $subscribe = exeQuery("INSERT INTO `subscription`(`email`, `time`) VALUES ('$email','$date')");
        if ($subscribe != true) {
            echo "Something Went Wrong.";
        } else {
            echo "Subscribed";
        }
    } else {
        echo "Invalid Email Format";
    }
} else {
    echo "Bad Request";
}
