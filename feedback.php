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
        <title>VC Portal | Feedback</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- //for-mobile-apps -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- js -->
        <!--<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>-->
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

        <!-- news -->
        <div class="Feedback-body">
            <div class="container">
                <main class="Feedback">
                    <form action="rating.php"  name="feedback" method="post">
                        <div class="survey-container">
                            <div class="survey-wrapper">
                                <div class="survey-content"> 
                                    <h1>Student Feedback Form</h1>
                                    <table>
                                        <tr>
                                            <td>Nomination_id:</td>
                                            <td><input type="text" name="nomination_id" required></td>
                                        </tr>
                                        <tr>
                                            <td>UserId:</td>
                                            <td><input type="text" name="user_id"></td>
                                        </tr>
                                        <tr>
                                            <td>StudentId:</td>
                                            <td><input type="text" name="student_id"></td>	
                                        </tr>
                                    </table>
                                    <div class="parameter-text"><label>Q1</label></div> 
                                    <div class="rating-slider"> 
                                        <input type="radio" data-name="rating0" name="Q1" class="star-1" id="rating-10" data-rating="1" value="10" required> <label class="star-1" for="rating-10"></label> 
                                        <input type="radio" data-name="rating0" name="Q1" class="star-2" id="rating-20" data-rating="2" value="20" required> <label class="star-2" for="rating-20"></label>
                                        <input type="radio" data-name="rating0" name="Q1" class="star-3" id="rating-30" data-rating="3" value="30" required> <label class="star-3" for="rating-30"></label>
                                        <input type="radio" data-name="rating0" name="Q1" class="star-4" id="rating-40" data-rating="4" value="40" required> <label class="star-4" for="rating-40"></label> 
                                        <input type="radio" data-name="rating0" name="Q1" class="star-5" id="rating-50" data-rating="5" value="50" required> <label class="star-5" for="rating-50"></label> 
                                        <span class="filler">
                                            <span class="arrow arrow-rating0"> 
                                            </span>
                                        </span>
                                    </div> 
                                    <div class="parameter-text"><label>Q1</label></div>
                                    <div class="rating-slider"> 
                                        <input type="radio" data-name="rating1" name="Q2" class="star-1" id="rating-11" data-rating="1" value="10" required> <label class="star-1" for="rating-11"></label> 
                                        <input type="radio" data-name="rating1" name="Q2" class="star-2" id="rating-21" data-rating="2" value="20" required> <label class="star-2" for="rating-21"></label> 
                                        <input type="radio" data-name="rating1" name="Q2" class="star-3" id="rating-31" data-rating="3" value="30" required> <label class="star-3" for="rating-31"></label> 
                                        <input type="radio" data-name="rating1" name="Q2" class="star-4" id="rating-41" data-rating="4" value="40" required> <label class="star-4" for="rating-41"></label> 
                                        <input type="radio" data-name="rating1" name="Q2" class="star-5" id="rating-51" data-rating="5" value="50" required> <label class="star-5" for="rating-51"></label>
                                        <span class="filler"> 
                                            <span class="arrow arrow-rating1"> 
                                            </span>
                                        </span> 
                                    </div>
                                    <div class="parameter-text"><label>Q1</label></div>
                                    <div class="rating-slider"> 
                                        <input type="radio" data-name="rating2" name="Q3" class="star-1" id="rating-12" data-rating="1" value="10" required> <label class="star-1" for="rating-12"></label> 
                                        <input type="radio" data-name="rating2" name="Q3" class="star-2" id="rating-22" data-rating="2" value="20" required> <label class="star-2" for="rating-22"></label> 
                                        <input type="radio" data-name="rating2" name="Q3" class="star-3" id="rating-32" data-rating="3" value="30" required> <label class="star-3" for="rating-32"></label> 
                                        <input type="radio" data-name="rating2" name="Q3" class="star-4" id="rating-42" data-rating="4" value="40" required> <label class="star-4" for="rating-42"></label> 
                                        <input type="radio" data-name="rating2" name="Q3" class="star-5" id="rating-52" data-rating="5" value="50" required> <label class="star-5" for="rating-52"></label>
                                        <span class="filler"> 
                                            <span class="arrow arrow-rating2"> 
                                            </span>
                                        </span>
                                    </div> 
                                    <div class="parameter-text"><label>Q1</label></div> 
                                    <div class="rating-slider">
                                        <input type="radio" data-name="rating3" name="Q4" class="star-1" id="rating-13" data-rating="1" value="10" required> <label class="star-1" for="rating-13"></label> 
                                        <input type="radio" data-name="rating3" name="Q4" class="star-2" id="rating-23" data-rating="2" value="20" required> <label class="star-2" for="rating-23"></label>
                                        <input type="radio" data-name="rating3" name="Q4" class="star-3" id="rating-33" data-rating="3" value="30" required> <label class="star-3" for="rating-33"></label>
                                        <input type="radio" data-name="rating3" name="Q4" class="star-4" id="rating-43" data-rating="4" value="40" required> <label class="star-4" for="rating-43"></label> 
                                        <input type="radio" data-name="rating3" name="Q4" class="star-5" id="rating-53" data-rating="5" value="50" required> <label class="star-5" for="rating-53"></label> 
                                        <span class="filler"> 
                                            <span class="arrow arrow-rating3"> 
                                            </span>
                                        </span> 
                                    </div> 
                                    <div class="parameter-text"><label>Q1</label></div> 
                                    <div class="rating-slider"> 
                                        <input type="radio" data-name="rating4" name="Q5" class="star-1" id="rating-14" data-rating="1" value="10" required> <label class="star-1" for="rating-14"></label> 
                                        <input type="radio" data-name="rating4" name="Q5" class="star-2" id="rating-24" data-rating="2" value="20" required> <label class="star-2" for="rating-24"></label>
                                        <input type="radio" data-name="rating4" name="Q5" class="star-3" id="rating-34" data-rating="3" value="30" required> <label class="star-3" for="rating-34"></label>
                                        <input type="radio" data-name="rating4" name="Q5" class="star-4" id="rating-44" data-rating="4" value="40" required> <label class="star-4" for="rating-44"></label> 
                                        <input type="radio" data-name="rating4" name="Q5" class="star-5" id="rating-54" data-rating="5" value="50" required> <label class="star-5" for="rating-54"></label> 
                                        <span class="filler">
                                            <span class="arrow arrow-rating4"> 
                                            </span>
                                        </span>
                                    </div>
                                    <div class="parameter-text"><label>Q1</label></div> 
                                    <div class="rating-slider"> 
                                        <input type="radio" data-name="rating5" name="Q6" class="star-1" id="rating-15" data-rating="1" value="10" required> <label class="star-1" for="rating-15"></label> 
                                        <input type="radio" data-name="rating5" name="Q6" class="star-2" id="rating-25" data-rating="2" value="20" required> <label class="star-2" for="rating-25"></label>
                                        <input type="radio" data-name="rating5" name="Q6" class="star-3" id="rating-35" data-rating="3" value="30" required> <label class="star-3" for="rating-35"></label>
                                        <input type="radio" data-name="rating5" name="Q6" class="star-4" id="rating-45" data-rating="4" value="40" required> <label class="star-4" for="rating-45"></label> 
                                        <input type="radio" data-name="rating5" name="Q6" class="star-5" id="rating-55" data-rating="5" value="50" required> <label class="star-5" for="rating-55"></label> 
                                        <span class="filler">
                                            <span class="arrow arrow-rating5"> 
                                            </span>
                                        </span>
                                    </div>
                                    <div class="parameter-text"> Any other feedback? 
                                    </div>
                                    <div class="answer"> 
                                        <textarea name="comment" class="feedback-text"rows="4" cols="50"></textarea> 
                                    </div>
                                    <center>
                                        <input type="submit" value="submit" style=" width: 10em;  height: 3em; padding-left: 1.8em;"/>
                                        <input type="reset"  value="reset" style=" width: 10em;  height: 3em;"/> 
                                    </center>
                                </div>
                                <script type="text/javascript" src="../js/file.js">
                                </script>
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $('.radioGroup input').on('click', function () {
                                            var rating = $(this).attr('data-val');
                                            var inputName = $(this).attr('data-af');
                                            var $Feedback = $('.additional-feedback.' + inputName);
                                            $('.additional-feedback:not(.' + inputName + ')').slideUp('fast');
                                            if (rating == 1) {
                                                $Feedback.slideDown('fast');
                                            } else
                                                $Feedback.slideUp('fast');
                                        });

                                        $('.rating-slider input').on('click', function () {
                                            var rating = $(this).data("rating");
                                            var inputName = $(this).data('name');
                                            var $Feedback = $('.additional-feedback.' + inputName);
                                            var $Arrow = $('span.arrow-' + inputName);
                                            $('.arrow:not(.arrow-' + inputName + ')').removeClass('rotated');
                                            $('.additional-feedback:not(.' + inputName + ')').slideUp('fast');
                                        });
                                        $('textarea').on('focus', function () {
                                            collapseAddModule();
                                        });
                                    });

                                    var collapseAddModule = function () {
                                        $('.additional-feedback:visible').slideUp('fast');
                                    };
                                </script>
                            </div>
                        </div>
                    </form>
                </main>
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
            <!--<script src="js/responsiveslides.min.js"></script>-->
        <!-- for bootstrap working -->
        <!--<script src="js/bootstrap.js"></script>-->
        <script src="js/file.js"></script>
        <!-- //for bootstrap working -->

    </body>
</html>



