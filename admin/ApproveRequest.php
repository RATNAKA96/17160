<?php
include_once 'session.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//var_dump($_SESSION['ApproveRequest']);
if ((!empty($_SESSION['ApproveRequest'])) && ($_SESSION['ApproveRequest']) == $_POST['hash']) {
    $nid = (int)xssFilter($_POST['nid']);
    $dept = (string)xssFilter($_POST['dept']);

    $getReqNom = runQuery("SELECT * FROM `nomination_request` WHERE `nid` = '$nid' AND `dept` = '$dept'");
    var_dump($getReqNom);
    var_dump("SELECT * FROM `nomination_request` WHERE `nid` = '$nid' AND `dept` = '$dept'");
    
    $title = xssFilter($getReqNom[0]['title']);
    $eligibility = xssFilter($getReqNom[0]['eligibility']);
    $experience = xssFilter($getReqNom[0]['experience']);
    $description = xssFilter($getReqNom[0]['description']);
    $status = 'Pending';
    $date_of_session = xssFilter($getReqNom[0]['date_of_session']);
    $last_date_apply = xssFilter($getReqNom[0]['last_date_apply']);
    $session_duration = xssFilter($getReqNom[0]['session_duration']);
    $allocated = 'N';
    $date = TodayDate();

    if (!empty($getReqNom)) {
        $insertNomination = exeQuery("INSERT INTO `nominations`(`title`, `eligibility`, `experience`, `description`, `status`, `date_of_session`, `date`, `last_date_apply`, `allocated`, `dept`, `session_duration`) VALUES "
                . "('$title','$eligibility','$experience','$description','$status','$date_of_session','$date','$last_date_apply','N','$dept','$session_duration')");
        if ($insertNomination != false) {
            $query = exeQuery("UPDATE `nomination_request` SET `verify`='Y' WHERE `nid` = '$nid' AND `dept` = '$dept'");
            ?>
            <div class="alert alert-success">
                <strong>Success!</strong>Nomination Approved Sucessfully.
            </div>
            <script type="text/javascript">
                window.location = 'RequestedTrainingSessions.php';
            </script>
            <?php
        } else {
            ?>
            <div class="alert alert-danger">
                <strong>Error!</strong>Something Went Wrong Try Later.
            </div>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong>Training Session Not Found.
        </div>
        <?php
    }
} else {
    ?>
    <script type="text/javascript">
        window.location = 'RequestedTrainingSessions.php';
    </script>
    <?php
}
