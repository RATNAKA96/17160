<?php
include_once 'session.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ((!empty($_SESSION['NewsHash'])) && ($_SESSION['NewsHash'] == $_POST['hash'])) {
    $title = xssFilter($_POST['title']);
    $description = xssFilter($_POST['description']);
    $date = xssFilter($_POST['date']);

    if (empty($title)) {
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> Title Is Empty.
        </div>
        <?php
        exit();
    }
    if (empty($description)) {
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> Description Is Empty.
        </div>
        <?php
        exit();
    }
    if (empty($date)) {
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> Date Is Empty.
        </div>
        <?php
        exit();
    }
    

    $postNews = exeQuery("INSERT INTO `news`(`title`, `content`, `date`) VALUES "
            . "('$title','$description','$date')");

    if ($postNews == true) {
        ?>
        <div class="alert alert-success">
            <strong>Success!</strong> Posted Sucessfully.
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-warning">
            <strong>Warning!</strong> Something Went Wrong, Try Again Later.
        </div>
        <?php
    }
}

