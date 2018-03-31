<?php
include_once 'session.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$uid = xssFilter($_POST['uid']);
$nid = xssFilter($_POST['nid']);
$dept = xssFilter($_POST['dept']);
if ((!empty($_SESSION['RemoveNomineeHash'])) && ($_SESSION['RemoveNomineeHash']) == $_POST['hash']) {



    $getSelectedNominee = runQuery("SELECT `allocated` FROM `nominations` WHERE `nid` = '$nid' AND `dept` = '$dept'");

    if ($getSelectedNominee[0]['allocated'] != 'N') {
        $SelectedNominees = explode(',', $getSelectedNominee[0]['allocated']);
        $members_count = count($SelectedNominees);
        $key = array_search($uid, $SelectedNominees);
        unset($SelectedNominees[$key]);
        foreach ($SelectedNominees as $key => $value) {
            $Nominee .= $SelectedNominees[$key] . ",";
        }
        $Nominee = rtrim($Nominee, ',');
        $status = "$members_count Members Selected";
        if (empty($Nominee)) {
            $Nominee = 'N';
            $status = 'Pending';
        }

        $updateNominee = exeQuery("UPDATE `nominations` SET `status`='$status',`allocated`='$Nominee' WHERE `nid` = '$nid' AND `dept` = '$dept'");

        if ($updateNominee != true) {
            ?>
            <div class="alert alert-danger">
                <strong>Error!</strong> Unable To Hold, Try Again Later.
            </div>
            <?php
        } else {
            ?>
            <div class="alert alert-success">
                <strong>Success!</strong> Removed Successfully.
            </div>
            <script>
                window.location = 'dashboard.php';
            </script>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-success">
            <strong>Success!</strong> Removed Successfully.
        </div>
        <script>
            window.location = 'dashboard.php';
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
