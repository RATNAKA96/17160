<?php
include_once 'config/config.php';
if (!empty($_SESSION['user'])) {
    include_once 'session.php';
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$_SESSION['nominationHash'] = token(10);

if (isset($_GET['dept'])) {
    $dept = xssFilter($_GET['dept']);
    session_start();
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>VC Portal | Departments</title>
            <!-- for-mobile-apps -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <!-- //for-mobile-apps -->
            <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
            <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
            <!-- js -->
            <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
            <!-- //js -->
            <!--End-slider-script-->
            <!-- font-awesome icons -->
            <link rel="stylesheet" href="css/font-awesome.min.css" />
            <link rel="stylesheet" href="css/file.css" />
            <!-- //font-awesome icons -->
            <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        </head>
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
                            <h1><a class="navbar-brand" href="index.php"><img src="images/logo2.png"></a></h1>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                            <nav class="cl-effect-13" id="cl-effect-13">
                                <ul class="nav navbar-nav">
                                    <li class=""><a href="index.php">Home</a></li>
                                    <li class="dropdown active" id="login-signup">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            Departments<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                                        </a>
                                        <ul class="dropdown-menu agile_short_dropdown">
                                            <li><a href="department.php?dept=Anti Corruption">Anti Corruption</a></li>
                                            <li><a href="department.php?dept=Education">Education</a></li>
                                            <li><a href="department.php?dept=Employement/Bussiness">Employement/Bussiness</a></li>
                                            <li><a href="department.php?dept=Health">Health</a></li>
                                            <li><a href="department.php?dept=HSG">Housing</a></li>
                                            <li><a href="department.php?dept=Law & Order">Law & Order</a></li>
                                            <li><a href="department.php?dept=Senior Citizen">Senior Citizen</a></li>
                                            <li><a href="department.php?dept=Travel & Tourism">Travel & Tourism</a></li>
                                            <li><a href="department.php?dept=TRN">Transport</a></li>
                                            <li><a href="department.php?dept=Taxes & Finance"></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about.php">About</a></li>
                                    <li ><a href="support.php">Support</a></li>
                                    <li><a href="faq.php">FAQ</a></li>
                                    <li class="dropdown" id="login-signup">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Login / Register<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                                        </a>
                                        <ul class="dropdown-menu agile_short_dropdown">
                                            <li><a href="admin/index.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Admin Login</a></li>
                                            <li><a href="Department_admin/index.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Department Admin Login</a></li>
                                            <li><a href="user/index.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Login/Sign Up</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </nav>
                </div>
            </div>
            <?php
            $query = runQuery("SELECT * FROM `nominations` WHERE `dept` = '$dept' ORDER BY `last_date_apply` DESC");
            ?>

            <div style="min-height: 300px;" class="container ">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="color:#0a9dbd; margin:20px;" class="text-center">Training Sessions For <?php echo $dept; ?></h2>
                        <div id="nomination-application-result"></div>
                        <?php
                        if (!empty($query)) {
                            foreach ($query as $key => $value) {
                                ?>
                                <div style="margin: 10px;background-color: #f9fbff;border:1px solid #c5c5c5;min-height:300px;padding:30px;" class="col-md-12 w3_agile_about_grid_left">
                                    <h2 style="text-align:center;"><?php echo $query[0]['title']; ?></h2><hr>
                                    <h3>Description:</h3>
                                    <div class="col-md-12">
                                        <p style="text-align: justify;"><?php echo $query[0]['description']; ?></p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Qualification:</h3>
                                            <div class="col-md-12">
                                                <p style="text-align: justify;"><?php echo $query[0]['eligibility']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h3>Experience:</h3>
                                            <div class="col-md-12">
                                                <p style="text-align: justify;"><?php echo $query[0]['experience']; ?> Years</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Duration:</h3>
                                            <div class="col-md-12">
                                                <p style="text-align: justify;"><?php echo $query[0]['session_duration']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h3>Department:</h3>
                                            <div class="col-md-12">
                                                <p style="text-align: justify;"><?php echo $query[0]['dept']; ?> Years</p>
                                            </div>
                                        </div>
                                    </div>
                                    <h3>Dates:</h3>
                                    <div class="col-md-8">
                                        <p>Application Closing On <?php echo $query[0]['last_date_apply'] ?></p>
                                        <p>Training Starts From <?php echo $query[0]['date_of_session'] ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <?php
                                        $nid = $query[0]['nid'];
                                        if (!empty($_SESSION['user'])) {
                                            $uid = $_SESSION['user']['uid'];
                                            $check = numRows("SELECT * FROM `applications` WHERE `nid` = '$nid' AND `uid` = '$uid'");
                                        }

                                        if (!empty($_SESSION['user'])) {
                                            if ($check == 1) {
                                                ?>
                                                <button style="margin:10px" type="button" class="btn btn-success btn-sm">Applied</button>
                                                <?php
                                            } else {
                                                ?>
                                                <button onclick="ApplyNomination('<?php echo $query[0]['nid']; ?>', '<?php echo $_SESSION['nominationHash']; ?>')" style="margin:10px" type="button" class="btn btn-info btn-sm">Apply</button>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <button id="UserLogin" type="button" class="btn btn-info btn-sm">Login & Apply</button>
                                        <?php }
                                        ?>
                                    </div>
                                </div>

                                <?php
                            }
                        } else {
                            ?>
                            <h2 style="color:#0a9dbd;" class="text-center">No Training Sessions Found For <?php echo $dept; ?></h2>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- footer -->
            <?php
            $_SESSION['scbscribeHash'] = token(10);
            ?>
            <div class="footer-top">
                <div class="container">
                    <div class="col-md-3 w3ls-footer-top">
                        <h3>QUICK LINKS</h3>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="support.php">Support</a></li>
                            <li><a href="faq.php">FAQ</a></li>
                            <!--<li><a href="feedback.php">Feedback</a></li>-->
                        </ul>
                    </div>
                    <div class="col-md-4 wthree-footer-top">
                        <h3>Contact</h3>
                        <ul>
                            <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">info@example.com</a></li>
                            <li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> +91 9999999999</li>
                            <li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> +91 9999999999</li>
                        </ul>
                    </div>
                    <div class="col-md-5 w3l-footer-top">
                        <h3>SUBSCRIPTION</h3>
                        <p>Enter your Email to receive notification for the new Nominations.</p>
                        <form action="#" method="post" class="newsletter">
                            <input class="email" id="subscription-email" type="email" placeholder="Your email..." required="">
                            <input id="submit-sub" type="submit" class="submit"  value="">
                        </form>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $('#submit-sub').click(function () {
                                var email = $('#subscription-email').val();
                                var data = "email=" + email + "&hash=<?php echo $_SESSION['scbscribeHash']; ?>";
                                alert(data);
                                $.ajax({
                                    type: "POST",
                                    url: "subscription.php",
                                    data: data,
                                    success: function (dataString) {
                                        alert(dataString);
                                    }
                                });
                            });
                        });
                        $(document).ready(function () {
                            $('#UserLogin').click(function () {
                                window.location = 'user/login.php';
                            });
                        });
                    </script>
                    <div class="clearfix"></div>
                    <div class="footer-w3layouts">
                        <div class="agile-copy">

                        </div>
                        <div class="agileits-social">
                            <p style="cursor: pointer;"><a style="color: #bbbbbb !important;font-size: 14px;" href="#home"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span> Back to top</a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- //footer -->
            <script src="js/responsiveslides.min.js"></script>
            <!-- for bootstrap working -->
            <script src="js/bootstrap.js"></script>
            <script src="js/file.js"></script>
            <script>
                        function ApplyNomination(nid, hash) {
                            var data = "hash=" + hash + "&nid=" + nid + "&email=<?php echo $_SESSION['user']['username']; ?>";
                            $.ajax({
                                type: "POST",
                                url: "ApplyNomination.php",
                                data: data,
                                success: function (dataString) {
                                    $('#nomination-application-result').html(dataString);
                                    window.location = 'department.php?dept=<?php echo xssFilter($_GET['dept']); ?>'
                                }
                            });
                        }
            </script>
        </body>
    </html>
    <?php
} else {
    ?>
    <script>
        window.location = 'index.php';
    </script>
<?php } ?>
