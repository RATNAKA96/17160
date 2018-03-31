<?php
include_once 'session.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//var_dump($_POST);
if ((!empty($_SESSION['NominationHash'])) && ($_SESSION['NominationHash'] == $_POST['hash'])) {
    $title = xssFilter($_POST['title']);
    $description = xssFilter($_POST['description']);
    $fdate = xssFilter($_POST['fdate']);
    $ldate = xssFilter($_POST['ldate']);
    $qualification = xssFilter($_POST['qualification']);
    $experience = xssFilter($_POST['experience']);
    $dept = xssFilter($_POST['dept']);
    $dur = xssFilter($_POST['dur']);

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
    if (empty($fdate)) {
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> From Date Is Empty.
        </div>
        <?php
        exit();
    }
    if (empty($dept)) {
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> Select Department.
        </div>
        <?php
        exit();
    }
    if (empty($ldate)) {
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> To Date Is Empty.
        </div>
        <?php
        exit();
    }
    if (empty($qualification)) {
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> Qualification Is Empty.
        </div>
        <?php
        exit();
    }
    if (empty($experience)) {
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> Experience Is Empty.
        </div>
        <?php
        exit();
    }
    if (empty($dur)) {
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> Duration is empty.
        </div>
        <?php
        exit();
    }

    $postNomination = exeQuery("INSERT INTO `nominations`(`title`, `eligibility`, `experience`, `description`, `status`, `date_of_session`, `last_date_apply`,  `dept`, `session_duration` , `allocated`) VALUES "
            . "('$title','$qualification','$experience','$description','Pending','$fdate','$ldate','$dept','$dur','N')");

    if ($postNomination == true) {
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

