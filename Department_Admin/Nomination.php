<?php
include_once 'session.php';
session_start();
$_SESSION['NominationHash'] = token(10);
$_SESSION['SelectNomineeHash'] = token(10);
$_SESSION['RemoveNomineeHash'] = token(10);
if ((!empty($_SESSION['AdminNominationHash'])) && ($_SESSION['AdminNominationHash'] == $_GET['hash'])) {
    unset($_SESSION['AdminNominationHash']);
    if (!empty($_GET['nid'])) {
        $nid = xssFilter($_GET['nid']);
        ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <title>VC Portal | Training Sessions </title>
                <!-- for-mobile-apps -->
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <!-- //for-mobile-apps -->
                <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
                <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
                <!-- js -->
                <script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
                <!-- //js -->
                <!--FlexSlider-->
                <link rel="stylesheet" href="../css/flexslider.css" type="text/css" media="screen" />
                <script defer src="../js/jquery.flexslider.js"></script>

                <!--End-slider-script-->
                <!-- font-awesome icons -->
                <link rel="stylesheet" href="../css/font-awesome.min.css" />
                <!-- //font-awesome icons -->
                <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
                <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
            </head>
            <style>
                .input-full{
                    width:100% !important;
                    min-width: 220px;
                } 
            </style>
            <body>

                <div style="position:relative !important;" class="header">
                    <div class="container">
                        <nav class="navbar navbar-default">
                            <div class="navbar-header navbar-left">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                        <h1><a class="navbar-brand" href="../index.php"><img src="../images/logo2.png"></a></h1>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                                <nav class="cl-effect-13" id="cl-effect-13">
                                    <ul class="nav navbar-nav">
                                        <li class="active"><a href="../index.php">Home</a></li>
                                        <li><a href="../about.php">About</a></li>
                                        <li><a href="../support.php">Support</a></li>
                                        <li><a href="../faq.php">FAQ</a></li>
                                        <li class="dropdown" id="login-signup">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Hi, <?php echo $_SESSION['admin']['name']; ?><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                                            </a>
                                            <ul class="dropdown-menu agile_short_dropdown">
                                                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </nav>
                    </div>
                </div>

                <?php
                $getAppliedNominations = runQuery("SELECT * FROM `applications` a , `nominations` n , `user` u WHERE n.`nid` = '$nid' AND a.`uid` = u.`uid` AND a.`nid` = n.`nid`");
                //var_dump($getAppliedNominations);
                $index = 0;
                if ($fh = fopen('student.txt', 'r')) {
                    while (!feof($fh)) {
                        $lines[$index] = trim(fgets($fh));
                        $index++;
                    }
                    fclose($fh);
                }

                $index = 0;
                $NoOfApplicants = 0;
                foreach ($getAppliedNominations as $key => $value) {

                    $qualification = $getAppliedNominations[$key]['qualification'];
                    $experience = $getAppliedNominations[$key]['experience'];

                    $count = 0;
                    $rating = $getAppliedNominations[$key]['rating'];
                    switch ($qualification) {
                        case "Btech":
                            $count = $count + 10;
                            break;
                        case "BE":
                            $count = $count + 10;
                            break;
                        case "Mtech":
                            $count = $count + 20;
                            break;
                        case "Mca":
                            $count = $count + 20;
                            break;
                        case "Bed":
                            $count = $count + 10;
                            break;
                        case "Msc":
                            $count = $count + 20;
                            break;
                        case "Phd":
                            $count = $count + 30;
                            break;
                        default:
                            $count = $count + 8;
                    }
                    if ($experience > 1 && $experience < 6)
                        $count = $count + 10;
                    elseif ($experience > 5 && $experience < 10)
                        $count = $count + 15;
                    elseif ($experience > 10 && $experience < 15)
                        $count = $count + 20;
                    elseif ($experience > 15)
                        $count = $count + 30;
                    $count_array[$key] = $count + $rating;
                    $count_array1[$key] = $count + $rating;


                    $NoOfApplicants++;
                    $nid = $getAppliedNominations[$key]['nid'];
                    $count = runQuery("SELECT count(*) FROM `applications` a WHERE `nid` = '$nid'");
                    $rating = " " . $getAppliedNominations[$key]['rating'] . "";
                    $s = $getAppliedNominations[$key]['qualification'] . "," . $getAppliedNominations[$key]['designation'] . "," . $getAppliedNominations[$key]['experience'] . ",5,yes";
                    $line = in_array($s, $lines);
                    if ($line) {
                        $UserIDs[$index] = $getAppliedNominations[$key]['uid'];
                        $index++;
                    }
                    $recommended = $index;
                }

                $getNominations = runQuery("SELECT * FROM `nominations` WHERE `nid` = '$nid'");
                ?>

                <!-- news -->
                <div class="admin-body">
                    <div class="container">
                        <div style="border:1px solid #c5c5c5;min-height:300px;margin-top: 50px;padding:30px;" class="col-md-12 w3_agile_about_grid_left">
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
                                        <p style="text-align: justify;"><?php echo $getNominations[0]['experience']; ?> Years</p>
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
                                        <p style="text-align: justify;"><?php echo $getNominations[0]['dept']; ?> Years</p>
                                    </div>
                                </div>
                            </div>
                            <h3>Dates:</h3>
                            <div class="col-md-8">
                                <p>Application Closing On <?php echo $getNominations[0]['last_date_apply'] ?></p>
                                <p>Training Starts From <?php echo $getNominations[0]['date_of_session'] ?></p>
                            </div>
                        </div>
                    </div>
                    
                <div id="ajax-result" class="margin-50">
                </div>
                    <?php if (!empty($getAppliedNominations)) {
                        ?>
                        <div class="container">
                            <h2 class="text-center margin-50">Nominees Sorted Based On Criteria</h2>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Experience</th>
                                        <th>Designation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    arsort($count_array);
                                    $index123 = 1;
                                    foreach ($count_array as $key => $value) {
//                                        echo $key;
                                        $nid = $getAppliedNominations[$key]['nid'];
                                        $dept = $getAppliedNominations[$key]['dept'];

                                        $getSelectedNominee = runQuery("SELECT `allocated` FROM `nominations` WHERE `nid` = '$nid' AND `dept` = '$dept'");

                                        if ($getSelectedNominee[0]['allocated'] != 'N') {
                                            $SelectedNominees = explode(',', $getSelectedNominee[0]['allocated']);
                                        }

                                        $searchForUser = in_array($getAppliedNominations[$key]['uid'], $SelectedNominees);
                                        ?>
                                        <tr style="text-align: center;">
                                            <td style="margin:5px;"><?php echo $index123; ?></td>
                                            <td onclick="ShowUser('<?php echo $getAppliedNominations[$key]['uid']; ?>')" style="margin:5px;"><?php echo $getAppliedNominations[$key]['name']; ?></td>
                                            <td style="margin:5px;"><?php echo $getAppliedNominations[$key]['experience']; ?></td>
                                            <td style="margin:5px;"><?php echo $getAppliedNominations[$key]['designation']; ?></td>
                                            <td style="margin:5px;">
                                                <?php if ($searchForUser) { ?>
                                                    <button id="Remove-btn-<?php echo $getAppliedNominations[$key]['uid']; ?>" onclick="RemoveNominee('<?php echo $getAppliedNominations[$key]['uid']; ?>', '<?php echo $getAppliedNominations[$key]['nid']; ?>', '<?php echo $getAppliedNominations[$key]['dept']; ?>')" class="btn btn-danger btn-sm"> Hold </button>
                                                <?php } else { ?>
                                                    <button id="Add-btn-<?php echo $getAppliedNominations[$key]['uid']; ?>" onclick="SelectNominee('<?php echo $getAppliedNominations[$key]['uid']; ?>', '<?php echo $getAppliedNominations[$key]['nid']; ?>', '<?php echo $getAppliedNominations[$key]['dept']; ?>')" class="btn btn-success btn-sm"> Allot </button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $index123++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else { ?>
                        <h2 class="text-center margin-50">No Applications Found For This Nomination</h2>
                    <?php } ?>

                </div>
                <div class="container">
                    <div class="col-sm-12">
                        <button onclick="window.location = 'dashboard.php'" style="float:right;margin:50px;" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back</button>
                    </div>
                </div>
                <!-- //news -->

                <!-- footer -->
                <div class="footer-top">
                    <div class="container">
                        <div class="col-md-3 w3ls-footer-top">
                            <h3>QUICK LINKS</h3>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="support.php">Support</a></li>
                                <li><a href="faq.php">FAQ</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 wthree-footer-top">
                            <h3>Address</h3>
                            <ul>
                                <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Street no, Colony, City.</li>
                                <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">info@example.com</a></li>
                                <li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> +91 9999999999</li>
                            </ul>
                        </div>
                        <div class="col-md-5 w3l-footer-top">
                            <h3>NEWSLETTER</h3>
                            <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit reprehenderit qui in ea.</p>
                            <form action="#" method="post" class="newsletter">
                                <input class="email" type="email" placeholder="Your email..." required="">
                                <input type="submit" class="submit"  value="">
                            </form>
                        </div>
                        <div class="clearfix"></div>
                        <div class="footer-w3layouts">
                            <div class="agile-copy">
                                <p>© 2018 All rights reserved</p>
                            </div>
                            <div class="agileits-social">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    <li><a href="#"><i class="fa fa-vk"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- footer -->
                <script src="../js/responsiveslides.min.js"></script>
                <!-- for bootstrap working -->
                <script src="../js/bootstrap.js"></script>
                <!-- for bootstrap working -->
                <script>
                            function SelectNominee(uid, nid, dept) {
                                var data = "uid=" + uid + "&nid=" + nid + "&dept=" + dept + "&hash=<?php echo $_SESSION['SelectNomineeHash']; ?>"
                                $.ajax({
                                    type: "POST",
                                    url: "SelectNominee.php",
                                    data: data,
                                    success: function (dataString) {
                                        $('#ajax-result').html(dataString);
                                    }
                                });
                            }
                            function RemoveNominee(uid, nid, dept) {
                                var data = "uid=" + uid + "&nid=" + nid + "&dept=" + dept + "&hash=<?php echo $_SESSION['RemoveNomineeHash']; ?>"
                                $.ajax({
                                    type: "POST",
                                    url: "RemoveNominee.php",
                                    data: data,
                                    success: function (dataString) {
                                        $('#ajax-result').html(dataString);
                                    }
                                });
                            }
                </script>
            </body>
        </html>
        <?php
    } else {
        ?>
        <script type="text/javascript">
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
?>