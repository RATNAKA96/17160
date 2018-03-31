<?php
include_once 'config/config.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if ((!empty($_SESSION['nominationHash'])) && ($_SESSION['nominationHash'] == $_POST['hash'])) {
    $nid = xssFilter($_POST['nid']);
    $getNominations = runQuery("SELECT * FROM nominations n WHERE `nid` = '$nid'");
    ?>
    <div style="border:1px solid #c5c5c5;min-height:300px;padding:30px;" class="col-md-12 w3_agile_about_grid_left">
        <h2 style="text-align:center;"><?php echo $getNominations[0]['title']; ?></h2><hr>
        <h3>Description:</h3>
        <div class="col-md-12">
            <p style="text-align: justify;"><?php echo $getNominations[0]['description']; ?></p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Qualification:</h3>
                <div class="col-md-12">
                    <p style="text-align: justify;"><?php echo $getNominations[0]['eligibility']; ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Experience:</h3>
                <div class="col-md-12">
                    <p style="text-align: justify;"><?php echo $getNominations[0]['experience']; ?> </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Duration:</h3>
                <div class="col-md-12">
                    <p style="text-align: justify;"><?php echo $getNominations[0]['session_duration']; ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Department:</h3>
                <div class="col-md-12">
                    <p style="text-align: justify;"><?php echo $getNominations[0]['dept']; ?> </p>
                </div>
            </div>
        </div>
        <h3>Dates:</h3>
        <div class="col-md-8">
            <p>Application Closing On <?php echo $getNominations[0]['last_date_apply'] ?></p>
            <p>Training Starts From <?php echo $getNominations[0]['date_of_session'] ?></p>
        </div>
        <div class="col-md-4">
            <?php
            if (!empty($_SESSION['user'])) {
                $uid = $_SESSION['user']['uid'];
                $check = numRows("SELECT * FROM `applications` WHERE `nid` = '$nid' AND `uid` = '$uid'");
            }

            if (!empty($_SESSION['user'])) {
                if ($check == 1) {
                    ?>
                    <button style="margin:10px" type="button" class="btn btn-success btn-lg">Applied</button>
                    <?php
                } else {
                    ?>
                    <button onclick="ApplyNomination('<?php echo $getNominations[0]['nid']; ?>', '<?php echo $_SESSION['nominationHash']; ?>')" style="margin:10px" type="button" class="btn btn-info btn-lg">Apply</button>
                    <?php
                }
            } else {
                ?>
                <button data-toggle="modal" data-target="#SignUpModal" style="margin:10px" type="button" class="btn btn-info btn-lg">Login & Apply</button>
            <?php }
            ?>
        </div>
    </div>
    <?php
}


