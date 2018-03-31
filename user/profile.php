<?php
include_once 'session.php';
$_SESSION['profileUpdateHash'] = token(10);

if (!empty($_GET['msg'])) {
    $msg = xssFilter($_GET['msg']);
    $action = xssFilter($_GET['action']);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>VC Portal | Profile</title>
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
        <script type="text/JavaScript" src='../js/state.js'></script>
        <script type="text/JavaScript" src='../js/state_jquery.js'></script>

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
                                <li ><a href="../index.php">Home</a></li>
                                <li><a href="../about.php">About</a></li>
                                <li><a href="../support.php">Support</a></li>
                                <li><a href="../faq.php">FAQ</a></li>
                                <li class="active dropdown" id="login-signup">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Hi, <?php echo $_SESSION['user']['name']; ?><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                                    </a>
                                    <ul class="dropdown-menu agile_short_dropdown">
                                        <li><a href="profile.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a></li>
                                        <li><a href="AppliedNominations.php"> Applied Nominations</a></li>
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
        $getUser = runQuery("SELECT * FROM vcportal.`user` u WHERE u.`email` = '$username'");
        ?>
        <!-- profile -->
        <div class="profile-body"> 
            <div class="container">
                <div class="update-profile col-md-6">
                    <?php if (!empty($msg)) { ?>
                        <div class="alert alert-<?php echo strtolower($action); ?> text-center">
                            <strong><?php echo $action; ?> !</strong> <?php
                            echo $msg;
                            ?>
                        </div>
                    <?php } ?>
                    <div id="ajax-update">
                    </div> <!-- close .text-group -->
                    <div class="header__text-grou">
                        <h1 class="header__heading text-center">User Profile</h1>
                        <hr style="border:1px solid;color:#5bc0de;">
                    </div> <!-- close .text-group -->

                    <div class=" form-group">
                        <label for="user_first_name">
                            Full Name
                        </label>
                        <input value="<?php echo $getUser[0]['name']; ?>" autocomplete="off" class="input-full form-control" type="text" id="name">
                    </div> <!-- close .form-group -->

                    <div class="form-group">
                        <label for="user_email">
                            Email address
                        </label>
                        <input readonly="readonly" autocomplete="off" class="input-full form-control" type="email" value="<?php echo $getUser[0]['email']; ?>" id="email">
                    </div> <!-- close .form-group -->

                    <div class="form-group">
                        <label for="user_mobile">
                            Mobile No
                        </label>
                        <input autocomplete="off" class="form-control" type="test" value="<?php echo $getUser[0]['mobile']; ?>" id="mobile">
                    </div> <!-- close .form-group -->

                    <div class="form-group">
                        <label for="user_username">
                            Username
                        </label>
                        <input <?php
                        if (!empty($getUser[0]['username'])) {
                            echo 'readonly="readonly"';
                        }
                        ?> autocomplete="off" value="<?php echo $getUser[0]['username']; ?>" class="form-control input-full" type="text" id="username">
                    </div> <!-- close .form-group -->

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="from_date">Gender</label>
                                <select id="gender" autocomplete="off" name="gender" class="form-control">
                                    <option <?php
                                    if ($getUser[0]['gender'] == 'M') {
                                        echo "selected";
                                    }
                                    ?> value="M">Male </option>
                                    <option <?php
                                    if ($getUser[0]['gender'] == 'F') {
                                        echo "selected";
                                    }
                                    ?> value="F">Female </option>
                                </select>
                            </div> <!-- close .form-group -->
                        </div> <!-- close .col -->

                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="to_date">Experience</label>
                                <input autocomplete="off" value="<?php echo $getUser[0]['experience']; ?>" class="input-full form-control" type="text" id="experience">
                            </div> <!-- close .form-group -->
                        </div> <!-- close .col -->
                    </div> <!-- close .row -->

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="to_date">Qualification</label>
                                <select autocomplete="off" class="input-full form-control" id="qualification">
                                    <option value="Btech">B.Tech</option>
                                    <option value="Mtech">M.Tech</option>
                                    <option value="Phd">Phd</option>
                                    <option value="Mca">MCA</option>
                                    <option value="Bed">Bed</option>
                                    <option value="Msc">Msc</option>
                                </select>
                            </div> <!-- close .form-group -->
                        </div> <!-- close .col -->

                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="to_date">Designation</label>
                                <select autocomplete="off" class="input-full form-control" id="designation">
                                    <option value="asoc_professor">Associate Professor</option>
                                    <option value="asst_professor">Assistant Professor</option>
                                    <option value="professor">Professor</option>
                                </select>

                            </div> <!-- close .form-group -->
                        </div> <!-- close .col -->
                    </div> <!-- close .row -->


                    <div class="row" style="">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label style="margin-top:20px;" for="to_date">Department</label>
                                <select  autocomplete="off" class="input-full form-control" id="department">
                                    <option value="Health">Health</option>
                                    <option value="Education">Education</option>
                                    <option value="Employement/Bussiness">Employement/Bussiness</option>
                                    <option value="Housing">Housing</option>
                                    <option value="Anti Corruption">Anti Corruption</option>
                                    <option value="Law & Order">Law & Order</option>
                                    <option value="Senior Citizen Corner">Senior Citizen Corner</option>
                                    <option value="Home and Community">Home and Community</option>
                                    <option value="Home and Community">Travel & Tourism</option>
                                    <option value="Transport">Transport</option>
                                    <option value="Taxes & Finance">Taxes & Finance</option>
                                </select>
                            </div> <!-- close .form-group -->
                        </div> <!-- close .col -->

                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="user_password">
                                    Password <span class="text-secondary">(Enter Password to Update)</span>
                                </label>
                                <input autocomplete="off" class="form-control input-full" type="password" id="password">

                            </div> <!-- close .form-group -->
                        </div> <!-- close .col -->
                    </div> <!-- close .row -->

                    <div class="form-group">
                        <center>
                            <input id="ProfileUpdate" type="submit" value="Update" class="btn btn-primary">
                        </center>
                    </div>
                </div>
            </div>
        </div>

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
        <script>

                    $(document).ready(function () {
                        $('#ProfileUpdate').click(function () {
                            var name = $('#name').val();
                            var username = $('#username').val();
                            var mobile = $('#mobile').val();
                            var gender = $('#gender').val();
                            var experience = $('#experience').val();
                            var qualification = $('#qualification').val();
                            var designation = $('#designation').val();
                            var password = $('#password').val();
                            var department = $('#department').val();

                            var data = "department=" + department + "&hash=<?php echo $_SESSION['profileUpdateHash']; ?>&name=" + name + "&username=" + username + "&mobile=" + mobile + "&gender=" + gender + "&experience=" + experience + "&qualification=" + qualification + "&designation=" + designation + "&password=" + password;
//                   alert(data);
                            $.ajax({
                                type: "POST",
                                url: "UpdateProfile.php",
                                data: data,
                                success: function (dataString) {
                                    alert(dataString);
                                    $('#ajax-update').html(dataString);
                                }
                            });
                        });
                    });
        </script>

    </body>
</html>