<?php
include_once 'session.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!empty($_POST['nid'])) {
    $nid = xssFilter($_POST['nid']);
    $getNominations = runQuery("SELECT * FROM `nominations` WHERE `nid` = '$nid'");
    ?>
    <style>
        #ajax-result{
            position: fixed;
            background: rgba(255, 255, 255, 0.8);
            width: 100% ;
            z-index: 100;
            height: 100% ;
        }
        .nomination-popup{
            background-color: #f9fbff;
            border: none;
            margin: 5% 25%;
            border-radius:4px;
        }
    </style>
    <script>
        $('#ajax-result').show();
    </script>
    <div style="border:1px solid #c5c5c5;min-height:300px;" class="col-md-6 w3_agile_about_grid_left nomination-popup">
        <button onclick="$('#ajax-result').hide();" type="button" style="margin:7px 0px;" class="close" data-dismiss="modal">&times;</button>
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
                    <p style="text-align: justify;"><?php echo $getNominations[0]['experience']; ?></p>
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
                    <p style="text-align: justify;"><?php echo $getNominations[0]['dept']; ?></p>
                </div>
            </div>
        </div>
        <h3>Dates:</h3>
        <div class="col-md-8">
            <p>Application Closing On <?php echo $getNominations[0]['last_date_apply'] ?></p>
            <p>Training Starts From <?php echo $getNominations[0]['date_of_session'] ?></p>
        </div>
    </div>
    <?php
}
?>