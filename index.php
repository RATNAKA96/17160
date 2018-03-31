<?php
session_start();

include_once 'config/config.php';
if (!empty($_SESSION['user'])) {
    include_once 'user/session.php';
}


$_SESSION['userLoginHash'] = token(10);
$_SESSION['nominationHash'] = token(10);
?>
<!DOCTYPE html>
<head>
    <title>VC Portal | Home</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Proprietorship Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
          Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel='stylesheet prefetch' href='http://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.css'>
    <link rel='stylesheet prefetch' href='http://cdn.jsdelivr.net/jquery.slick/1.5.0/slick-theme.css'>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- js -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- //js -->
    <script type="text/javascript">
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                start: function (slider) {
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
    <!--End-slider-script-->
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <!-- //font-awesome icons -->
    <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>
<body>
    <!-- Modal -->
    <div class="modal fade" id="SignUpModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" id="login-box">
                <div class="login">
                    <div class="left">
                        <h2 style="color: #000;text-align: center;margin-top: 0px;">Sign In</h2>
                        <h5 style="text-align: center;color: red;padding: 5px;"></h5>
                        <label class="login-signup-label">Username:</label>
                        <input id="username" type="text" name="email" placeholder="" required/>
                        <label class="login-signup-label">Password:</label>
                        <input id="password" type="password" name="password" placeholder="" required/>
                        <input id="hash" type="hidden" name="hash" value="<?php echo $_SESSION['userLoginHash']; ?>" />
                        <center><input style="margin-bottom: 10px;" onclick="userLogin()" type="submit" name="signup_submit" value="Sign In" /></center> 

                        <a class="Forget-password text-center" href="forgetPassword.php">Forget Password</a>
                    </div>
                    <div class="right">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <span class="loginwith">New User Sign Up Here</span>

                        <a href="user/register.php"><input style="margin-left: 50px;" type="submit" value="Sign Up" /></a>
                    </div>
                    <div class="or">OR</div>
                </div>
            </div>

        </div>
    </div>

    <div class="header">
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
                            <li class="active"><a href="index.php">Home</a></li>
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
                            <li><a href="support.php">Support</a></li>
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
    <div id="home" class="banner">
        <div class="container">
            <div class="slider">
                <div class="callbacks_container">
                    <ul class="rslides callbacks callbacks1" id="slider4">
                        <li>
                            <div class="agileits_w3layouts_banner_info">

                                <div class="col-md-12 w3-agileits-bann">
                                    <h2 class="w3l_head w3l_head1">Welcome</h2>
                                    <!--<p class="w3ls-p">This portal will let you know about different training activities to be held and vacant trainee positions at the GNCT. The portal will make sure to save your data and will notify you by mails so that you will never miss any news about the vacancies. This is open to all will take suggestions from every well-wisher of the community.</p>-->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="clearfix"> </div>
                <div class="arrow bounce">
                    <span><a class="fa fa-arrow-down fa-2x bounce-arrow" href="#notification"></a></span>
                </div>
                <script>
                    $(document).ready(function () {
                        // Add smooth scrolling to all links
                        $("a").on('click', function (event) {

                            // Make sure this.hash has a value before overriding default behavior
                            if (this.hash !== "") {
                                // Prevent default anchor click behavior
                                event.preventDefault();

                                // Store hash
                                var hash = this.hash;

                                // Using jQuery's animate() method to add smooth page scroll
                                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                                $('html, body').animate({
                                    scrollTop: $(hash).offset().top
                                }, 800, function () {

                                    // Add hash (#) to URL when done scrolling (default click behavior)
                                    window.location.hash = hash;
                                });
                            } // End if
                        });
                    });
                </script>
                <script>
                    // You can also use "$(window).load(function() {"
                    $(function () {
                        // Slideshow 4
                        $("#slider4").responsiveSlides({
                            auto: true,
                            pager: true,
                            nav: false,
                            speed: 500,
                            namespace: "callbacks",
                            before: function () {
                                $('.events').append("<li>before event fired.</li>");
                            },
                            after: function () {
                                $('.events').append("<li>after event fired.</li>");
                            }
                        });

                    });
                </script>
                <!--banner Slider starts Here-->
            </div>
        </div>
    </div>

    <!-- //banner -->
    <?php
    $lastdate = TodayDate();
    $latest = ForwardDate(5);
//    echo $lastdate;
    $getNominations = runQuery("SELECT * FROM `nominations` WHERE `last_date_apply` >= '$lastdate' ORDER BY `date` DESC");
    if (!empty($getNominations)) {
        ?>
        <!-- news -->
        <div id="notification" class="notification"> 
            <div class="container">
                <h3 class="w3l_head w3l_head1">Training Sessions</h3>

                <div class="alert-show-hide text-center" id="nomination-application-result"></div>
    <!--                <p class="w3ls-p">Donec semper rutrum ipsum et bibendum. Sed condimentum dolor velit semper rutrum ipsum et velit semper  bibendum.</p>-->
                <div class="new-agileinfo">
                    <div class="col-md-3 nomination-right">
                        <marquee style="display: flex;max-height: 340px;" direction="up" speed="1" ondblclick="this.start();" onmouseover="this.stop();" onmouseout="this.start();">
                            <?php
                            if (!empty($getNominations)) {
                                $_SESSION['nominationHash'] = token(10);
                                ?>
                                <?php
                                foreach ($getNominations as $key => $value) {

                                    $description = substr($getNominations[$key]['description'], 0, 20) . "....";
                                    ?>  
                                    <div style="display: block;" onclick="ShowNomination('<?php echo $getNominations[$key]['nid']; ?>', '<?php echo $_SESSION['nominationHash']; ?>')" class="news-w3text">
                                        <div class="new-line"><h4 class="marquee-h4"><?php echo $getNominations[$key]['title']; ?></h4><?php
                                            if ($getNominations[$key]['date'] <= $lastdate) {
                                                echo "<span><img src='images/new.gif'></span></div>";
                                            }
                                            ?>
                                            <h6 class="marquee-h6"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $getNominations[$key]['date']; ?></h6>	
                                            <p class="marquee-p"><?php echo $description; ?></p>
                                            <hr>
                                        </div> 
                                        <?php
                                    }
                                } else {
                                    
                                }
                                ?>
                        </marquee>
                    </div>
                    <div id="nomination-main" class="col-md-8  nomination-left"></div>
                    <div class="clearfix"></div>
                </div>    

            </div>
        </div>
        <!-- //news -->

        <?php
    }
    $getNews = runQuery("SELECT * FROM news n ORDER BY `date` DESC");
    ?>

    <!-- news -->
    <div class="news"> 
        <div class="container">
            <h3 class="w3l_head w3l_head1">Recent News</h3>
            <div class="new-agileinfo">
                <div class="col-md-3 news-right">
                    <marquee style="display: flex;max-height: 340px;" ondblclick="this.start();" loop="infinity" direction="up" speed="1" onmouseover="this.stop();" onmouseout="this.start();">
                        <?php
                        if (!empty($getNews)) {
                            $_SESSION['newsHash'] = token(10);
                            ?>
                            <?php
                            foreach ($getNews as $key => $value) {
                                $description = substr($getNews[$key]['content'], 0, 20) . "....";
                                ?>  
                                <div style="display: block;" onclick="ShowNews('<?php echo $getNews[$key]['nid']; ?>', '<?php echo $_SESSION['newsHash']; ?>')" class="news-w3text">
                                    <h4 class="marquee-h4"><?php echo $getNews[$key]['title']; ?></h4><?php
                                    if ($getNews[$key]['date'] <= $lastdate) {
                                        echo "<span><img src='images/new.gif'></span></div>";
                                    }
                                    ?>
                                    <h6 class="marquee-h6"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $getNews[$key]['date']; ?></h6>	
                                    <p class="marquee-p"><?php echo $description; ?></p>
                                    <hr class="news-hr">
                                </div> 
                                <?php
                            }
                        } else {
                            
                        }
                        ?>
                    </marquee>
                </div>
                <div id="news-main" class="col-md-8  news-right"></div>
                <div class="clearfix"></div>
            </div>    
            <script>
                function ShowNomination(nid, hash) {
                    var data = "nid=" + nid + "&hash=" + hash;
                    $.ajax({
                        type: "POST",
                        url: "ShowNomination.php",
                        data: data,
                        success: function (dataString) {
                            $('#nomination-main').html(dataString);
                        }
                    });
                }
                ShowNomination('<?php echo $getNominations[0]['nid']; ?>', '<?php echo $_SESSION['nominationHash']; ?>');

                function ShowNews(nid, hash) {
                    var data = "nid=" + nid + "&hash=" + hash;
                    $.ajax({
                        type: "POST",
                        url: "ShowNews.php",
                        data: data,
                        success: function (dataString) {
                            $('#news-main').html(dataString);
                        }
                    });
                }
                ShowNews('<?php echo $getNews[0]['nid']; ?>', '<?php echo $_SESSION['newsHash']; ?>');
                function userLogin() {
                    var username = $('#username').val();
                    var password = $('#password').val();
                    var hash = $('#hash').val();
                    var data = "username=" + username + "&password=" + password + "&hash=" + hash;
                    $.ajax({
                        type: "POST",
                        url: "user/login.php",
                        data: data,
                        success: function (dataString) {
                            $('#userLogin-request').html(dataString);

                        }
                    });
                }
            </script>
            <div id="userLogin-request">
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

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.min.js'></script>
    <!-- //for bootstrap working -->
    <script>
                $('.quotes').slick({
                    dots: true,
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 6000,
                    speed: 800,
                    slidesToShow: 1,
                    adaptiveHeight: true
                });

                $(document).ready(function () {
                    $('.no-fouc').removeClass('no-fouc');
                });

                $(document).scroll(function () {
                    var y = $(this).scrollTop();
                    if (y > 600) {
                        $('.header').fadeIn();
                    } else {
                        $('.header').fadeOut();
                    }
                });

                function ApplyNomination(nid, hash) {
                    var data = "hash=" + hash + "&nid=" + nid + "&email=<?php echo $email; ?>";
                    $.ajax({
                        type: "POST",
                        url: "ApplyNomination.php",
                        data: data,
                        success: function (dataString) {
                            $('#nomination-application-result').html(dataString);
                        }
                    });
                }
    </script>   
</body>
</html>