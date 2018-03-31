<?php
include_once 'session.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ((!empty($_SESSION['SelectNomineeHash'])) && ($_SESSION['SelectNomineeHash']) == $_POST['hash']) {
    $uid = xssFilter($_POST['uid']);
    $nid = xssFilter($_POST['nid']);
    $dept = xssFilter($_POST['dept']);

    $getSelectedNominee = runQuery("SELECT `allocated` FROM `nominations` WHERE `nid` = '$nid' AND `dept` = '$dept'");

    if ($getSelectedNominee[0]['allocated'] != 'N') {
        $NomineeList = explode(',', $getSelectedNominee[0]['allocated']);
        $members_count = count($NomineeList);
        $checkNomineeInList = in_array($uid, $NomineeList);
        if ($checkNomineeInList != true) {
            $Nominee = rtrim($getSelectedNominee[0]['allocated'], ',');
            if (!empty($Nominee)) {
                $Nominee .= "," . $uid;
            } else {
                $Nominee = $uid;
            }
            $updateNominee = exeQuery("UPDATE `nominations` SET `status`='$members_count Members Selected',`allocated`='$Nominee' WHERE `nid` = '$nid' AND `dept` = '$dept'");
        } else {
            ?>
            <div class="alert alert-danger">
                <strong>Error!</strong> Unable To Allot, Try Again Later.
            </div>
            <?php
            exit();
        }
    } else {
        $updateNominee = exeQuery("UPDATE `nominations` SET `status`='1 Member Selected',`allocated`='$uid' WHERE `nid` = '$nid' AND `dept` = '$dept'");
    }
    if ($updateNominee != true) {
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> Unable To Allot, Try Again Later.
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-success">
            <strong>Success!</strong> Allocated Successfully.
        </div>
        <script>
            $('#Add-btn-<?php echo $uid; ?>').html('Hold');
            $("#Add-btn-<?php echo $uid; ?>").attr("onclick", "RemoveNominee('<?php echo $uid; ?>','<?php echo $nid; ?>','<?php echo $dept; ?>')");
            $("#Add-btn-<?php echo $uid; ?>").attr('class', 'btn btn-danger btn-sm');
        </script>
        <?php
    }
} else {
    ?>
    <script type="text/javascript">
        window.location = 'dashboard.php';
    </script>
    <?php
}
