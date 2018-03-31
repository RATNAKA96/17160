<?php
include_once 'config/config.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if ((!empty($_SESSION['newsHash'])) && ($_SESSION['newsHash'] == $_POST['hash'])) {
    $nid = xssFilter($_POST['nid']);
    $getNews = runQuery("SELECT * FROM news WHERE `nid` = '$nid'");
    ?>
    <div style="border:1px solid #c5c5c5;min-height:300px;padding:30px;" class="col-md-12 w3_agile_about_grid_left">
        <h2 style="text-align:center;"><?php echo $getNews[0]['title']; ?></h2><hr>
        <h3>Description:</h3>
        <div class="col-md-12">
            <p style="text-align: justify;"><?php echo $getNews[0]['content']; ?></p>
        </div>
        
        <h3>Date:</h3>
        <div class="col-md-8">
            <p>published: <?php echo $getNews[0]['date'] ?></p>
        </div>
    </div>
    <?php
}


