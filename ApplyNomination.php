<?php
include_once 'config/config.php';
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ((!empty($_SESSION['user']['username'])) && ($_SESSION['user']['username'] == $_POST['email'])) {
    if ((!empty($_SESSION['nominationHash'])) && ($_SESSION['nominationHash'] == $_POST['hash'])) {
        $nid = xssFilter($_POST['nid']);
        $email = $_SESSION['user']['username'];

        $getUserId = runQuery("SELECT `uid` FROM vcportal.`user` u WHERE u.`email` = '$email'");
        $user_id = $getUserId[0]['uid'];
        $date = TodayDate();

        $applyToNom = exeQuery("INSERT INTO `applications`(`nid`, `uid`, `time`) VALUES "
                . "('$nid','$user_id','$date')");
        if ($applyToNom == true) {
            ?>
            <div class="alert alert-success">
                <strong>Success!</strong> Applied Successfully.
            </div>
            <script>
                ShowNomination('<?php echo $nid; ?>', '<?php echo $_SESSION['nominationHash']; ?>');
            </script>
            <?php
        } else {
            ?>
            <div class="alert alert-danger">
                <strong>Error!</strong> Something Went Wrong Try Again Later.
            </div>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> Bad Request.
        </div>
        <?php
    }
} else {
    ?>
    <div class="alert alert-danger">
        <strong>Error!</strong> Bad Request.
    </div>
    <?php
}