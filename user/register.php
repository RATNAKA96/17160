<?php
include_once '../config/config.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include_once '../config/config.php';
session_start();
$_SESSION['userRegHash'] = token(10);
if ($_GET['msg']) {
    $msg = xssFilter($_GET['msg']);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>VC Portal | User Registeration</title>
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
    <body>
        <style>
            .login-box{
                padding:20px 60px 40px 60px;
                height: 400px;
                background: url('../images/login-signup.jpg');
                background-size: cover;
                background-position: center;
            }
            .input-full{
                width:100% !important;
                min-width: 220px;
                border-radius:2px;
            } 
        </style>
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
                                <li class=""><a href="../index.php">Home</a></li>
                                <li><a href="../about.php">About</a></li>
                                <li><a href="../support.php">Support</a></li>
                                <li><a href="../faq.php">FAQ</a></li>
                                <li class="dropdown" id="login-signup">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Login / Register<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                                    </a>
                                    <ul class="dropdown-menu agile_short_dropdown">
                                        <li><a href="../admin/index.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Admin Login</a></li>
                                        <li><a href="../Department_admin/index.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Department Admin Login</a></li>
                                        <li><a href="index.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Login/Sign Up</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </nav>
            </div>
        </div>

        <!-- news -->
        <div class="admin-body"> 
            <div class="container">
                <div class="row">

                    <div class="user-login-form col-md-7">
                        <div id="ajax-result" class="text-center">
                        </div>
                        <div class="modal-content" id="login-box">
                            <div class="login-box">
                                <h2 style="color: #000;text-align: center;margin-top: 0px;">User LogIn</h2>
                                <hr style="border:1px solid;color:#5bc0de;">
                                <h5 style="text-align: center;color: red;padding: 5px;"></h5>
                                <!--<form >-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="login-signup-label">First Name:</label>
                                        <input class="input-full" type="text" id="fname" placeholder="" required/>
                                        <input class="input-full" type="hidden" id="hash" value="<?php echo $_SESSION['userRegHash']; ?>" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="login-signup-label">Last Name:</label>
                                        <input class="input-full" type="text" id="lname" placeholder="" required/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="login-signup-label">Email:</label>
                                        <input class="input-full" type="email" id="email" placeholder="" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="login-signup-label">Mobile:</label>
                                        <input class="input-full" type="text" id="mobile" placeholder="" required/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="login-signup-label">Password:</label>
                                        <input class="input-full" type="password" id="pass" placeholder="" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="login-signup-label">Confirm Password:</label>
                                        <input class="input-full" type="password" id="cpass" placeholder="" required/>
                                    </div>
                                </div>

                                <center><input id="userRegister" type="submit" name="signup_submit" value="Sign In" /></center>
                                <!--</form>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('#userRegister').click(function () {
                    var fname = $('#fname').val();
                    var lname = $('#lname').val();
                    var email = $('#email').val();
                    var mobile = $('#mobile').val();
                    var pass = $('#pass').val();
                    var cpass = $('#cpass').val();
                    var hash = $('#hash').val();
                    if (pass == cpass) {
                        var data = "fname=" + fname + "&lname=" + lname + "&email=" + email + "&mobile=" + mobile + "&pass=" + pass + "&hash=" + hash;
                        alert(data);
                        $.ajax({
                            type: "POST",
                            url: "NewRegister.php",
                            data: data,
                            success: function (dataString) {
                                alert(dataString);
                                $('#ajax-result').html(dataString);
                            }
                        });
                    } else {
                        var dataString = '<div class="alert alert-danger"><strong>Error!</strong> Password and Confirm Password Not Matched.</div>';
                        $('#ajax-result').html(dataString);
                    }

                });
            });
        </script>

        <!-- //news -->
        <!-- footer -->
        <?php
        $_SESSION['scbscribeHash'] = token(10);
        ?>
        <div class="footer-top">
            <div class="container">
                <div class="col-md-3 w3ls-footer-top">
                    <h3>QUICK LINKS</h3>
                    <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../about.php">About</a></li>
                        <li><a href="../support.php">Support</a></li>
                        <li><a href="../faq.php">FAQ</a></li>
                        <!--<li><a href="../feedback.php">Feedback</a></li>-->
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
                                url: "../subscription.php",
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
        <script src="../js/responsiveslides.min.js"></script>
        <!-- for bootstrap working -->
        <script src="../js/bootstrap.js"></script>
        <!-- //for bootstrap working -->

    </body>
</html>



