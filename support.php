<?php
include_once 'config/config.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>VC Portal | Support</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- //for-mobile-apps -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- js -->
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <!-- //js -->
        <!--FlexSlider-->
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
        <script defer src="js/jquery.flexslider.js"></script>

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
                                <li ><a href="index.php">Home</a></li>
                                <li class="dropdown" id="login-signup">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        Departments<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                                    </a>
                                    <ul class="dropdown-menu agile_short_dropdown">
                                        <li><a href="department.php?dept=Anti Corruption">Anti Corruption</a></li>
                                        <li><a href="department.php?dept=Education">Education</a></li>
                                        <li><a href="department.php?dept=Employement/Bussiness">Employement/Bussiness</a></li>
                                        <li><a href="department.php?dept=Health">Health</a></li>
                                        <li><a href="department.php?dept=Housing">Housing</a></li>
                                        <li><a href="department.php?dept=Law & Order">Law & Order</a></li>
                                        <li><a href="department.php?dept=Senior Citizen">Senior Citizen</a></li>
                                        <li><a href="department.php?dept=Travel & Tourism">Travel & Tourism</a></li>
                                        <li><a href="department.php?dept=Transport">Transport</a></li>
                                        <li><a href="department.php?dept=Transport"></a></li>
                                    </ul>
                                </li>
                                <li><a href="about.php">About</a></li>
                                <li class="active"><a href="support.php">Support</a></li>
                                <li><a href="faq.php">FAQ</a></li>
                                <?php
                                if (!empty($_SESSION['user'])) {
                                    $checkUser = runQuery("SELECT * FROM vcportal.`user` u WHERE u.`email` = '$email'");
                                    if ((empty($checkUser[0]['gender'])) || (empty($checkUser[0]['qualification'])) || (empty($checkUser[0]['experience'])) || (empty($checkUser[0]['designation'])) || (empty($checkUser[0]['username']))) {
                                        ?>
                                        <script>
                                            window.location = 'user/profile.php?msg=Enter all the fields&action=Warning';
                                        </script>
                                        <?php
                                    }
                                    ?>
                                    <li class="dropdown" id="login-signup">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Hi, <?php echo $_SESSION['user']['name']; ?><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                                        </a>
                                        <ul class="dropdown-menu agile_short_dropdown">
                                            <li><a href="user/profile.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a></li>
                                            <li><a href="user/AppliedNominations.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Applied Nominations</a></li>
                                            <li><a href="user/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
                                        </ul>
                                    </li>
                                    <?php
                                } else {
                                    ?>
                                    <li class="dropdown" id="login-signup">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Login / Register<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                                        </a>
                                        <ul class="dropdown-menu agile_short_dropdown">
                                            <li><a href="admin/index.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Admin Login</a></li>
                                            <li><a href="Department_admin/index.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Department Admin Login</a></li>
                                            <li id="login-signup" data-toggle="modal" data-target="#SignUpModal"><a><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Login/Sign Up</a></li>
                                        </ul>
                                    </li>
                                <?php } ?>
                            </ul>

                        </nav>
                    </div>
                </nav>
            </div>
        </div>

        <div class="container ">
            <div class="margin-50">
                <div class="col-md-12 w3-agileits-bann">
                    <h2 class="w3l_head w3l_head1">Support</h2>
                    <hr>
                </div>
                <p style=" margin-top: 100px !important;color:#000;font-size: 20px; margin: 80px;">
                    Admin contact:<br>
                    Location:<br>
                    Training Location:<br>
                    <br>
                    Helpline Center:<br>
                    1031 anticorruption - 011-27357169<br>
                    PWD Helpline - Toll Free No. 1800110093<br>
                    (e-Mail to complaint@pwddelhi.com)<br>
                    Businessmen/Taxatation Helpline -1800 4250 0025<br>
                    Water Helpline - 1916<br>
                    Auto/Transport Deptt Helpline - 011-23958836<br>
                    DDMA Helpline -1077<br>

                </p>
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
        <!-- //for bootstrap working -->

    </body>
</html>



