<?php
include_once 'session.php';
$_SESSION['NominationHash'] = token(10);
$_SESSION['NewsHash'] = token(10);
$_SESSION['AdminNominationHash'] = token(10);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>VC Portal | Admin</title>
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
        <div class="modal fade" id="NomintionModel" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="container">
                        <div class="col-md-6">
                            <div class="nomination-header">
                                <button style="margin-top:0px;" type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="header__text-group text-center">
                                    <h1 class="header__heading">Add Training Session</h1>
                                    <div id="ajax-result"></div>
                                </div> <!-- close .text-group -->
                            </div> <!-- close .header -->

                            <div class="form-register">
                                <div class="form-group">
                                    <label for="user_email">
                                        Title
                                    </label>
                                    <input class="input-full form-control" type="text" value="" id="title" autofocus>
                                    <input type="hidden" value="<?php echo $_SESSION['NominationHash']; ?>" id="hash">

                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="from_date">Session Start Date</label>
                                            <input class="form-control" type="date" id="from-date">
                                        </div> <!-- close .form-group -->
                                    </div> <!-- close .col -->

                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="to_date">Last Date To Apply</label>
                                            <input class="form-control" type="date" id="to-date">
                                        </div> <!-- close .form-group -->
                                    </div> <!-- close .col -->
                                </div> <!-- close .row -->

                                <div class="form-group">
                                    <label for="user_email">
                                        Department
                                    </label>
                                    <select id="dept" class="input-full form-control">
                                        <option value="HLT">Health</option>
                                        <option value="EDU">Education</option>
                                        <option value="BUS">Employement/Bussiness</option>
                                        <option value="HSG">Housing</option>
                                        <option value="AC">Anti Corruption</option>
                                        <option value="LO">Law & Order</option>
                                        <option value="SC">Senior Citizen</option> Corner</option>
                                        <option value="HC">Home and Community</option>
                                        <option value="TT">Travel & Tourism</option>
                                        <option value="TRN">Transport</option>
                                        <option value="TF">Taxes & Finance</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="user_email">
                                        Session Duration
                                    </label>
                                    <input class="input-full form-control" type="text" value="" id="dur" >

                                </div> 
                                <div class="form-group">
                                    <label for="user_email">
                                        Description
                                    </label>
                                    <textarea rows="3" class="input-full form-control" id="description"></textarea>

                                </div>

                                <div class="form-group">
                                    <label for="user_email">
                                        Minimum Qualification
                                    </label>
                                    <input class="input-full form-control" type="text" value="" id="qualification" >

                                </div>

                                <div class="form-group">
                                    <label for="user_email">
                                        Experience Required
                                    </label>
                                    <input class="input-full form-control" type="text" value="" id="experience" >

                                </div>

                                <div class="form-group">
                                    <center>
                                        <input onclick="AddNomination()" type="submit" value="Submit" class="btn btn-primary">
                                    </center>
                                </div> <!-- close .form-group -->

                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="NewsModel" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" id="news-box">
                    <div class="container">
                        <div class="col-md-6">
                            <div class="nomination-header">
                                <button style="margin-top:0px;" type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="header__text-group text-center">
                                    <h1 class="header__heading">Add News</h1>
                                    <div id="news-ajax-result"></div>
                                </div> <!-- close .text-group -->
                            </div> <!-- close .header -->

                            <div class="form-register">
                                <div class="form-group">
                                    <label for="title">
                                        Title
                                    </label>
                                    <input class="input-full form-control" type="text" value="" id="news-title" autofocus>
                                    <input type="hidden" value="<?php echo $_SESSION['NewsHash']; ?>" id="news-hash">

                                </div>
                                <div class="form-group">
                                    <label for="Description">
                                        Description
                                    </label>
                                    <textarea rows="3" class="input-full form-control" id="news-description"></textarea>

                                </div>
                                <div class="form-group">
                                    <label for="from_date">Date</label>
                                    <input class="form-control" type="date" id="news-date">
                                </div>

                                <div class="form-group">
                                    <center>
                                        <input onclick="AddNews()" type="submit" value="Submit" class="btn btn-primary">
                                    </center>
                                </div> <!-- close .form-group -->

                            </div> 
                        </div>
                    </div>
                </div>

            </div>
        </div>
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
                                <li><a href="reports.php">Reports</a></li>
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
        $getAppliedNominations = runQuery("SELECT * FROM `nominations` n");
        ?>

        <div id="ajax-result">

        </div>
        <!-- news -->
        <div class="admin-body"> 
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" style="margin: 20% 10%;" data-toggle="modal" data-target="#NomintionModel" class="add-nomie btn btn-info btn-lg">Add Training Session</button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" style="margin: 20% 10%;" data-toggle="modal" data-target="#NewsModel" class="add-news btn btn-info btn-lg">Add News</button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" onclick="ShowRequests()" style="margin: 20% 10%;" class="add-news btn btn-info btn-lg">Requested Training Sessions</button>
                    </div>
                </div>
            </div>
            <div class="container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Training Session Title</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>published Date</th>
                            <th>No of Applications</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($getAppliedNominations as $key => $value) {
                            $nid = $getAppliedNominations[$key]['nid'];
                            $count = runQuery("SELECT count(*) FROM `applications` a WHERE `nid` = '$nid'");
                            $allocated = $getAppliedNominations[$key]['allocated'];
                            $members_count = count(explode(',', $allocated));

                            $status = $getAppliedNominations[$key]['status'];

                            if ($status != 'Complete' && $status != 'Pending') {
                                $status = "$members_count Members Selected";
                            } else {
                                $status = $getAppliedNominations[$key]['status'];
                            }
                            ?>
                            <tr <?php if ($status == 'Completed') { ?> style="background-color: #FFFBCB;" <?php } else if ($status == 'Pending') { ?> style="background-color: #FFFBCB;" <?php } else { ?> style="background-color: #deffe3;" <?php } ?> style="cursor:pointer;" onclick="openNomination('<?php echo $getAppliedNominations[$key]['nid']; ?>')">
                                <td style="margin:5px;"><?php echo $key + 1; ?></td>
                                <td  style="margin:5px;"><?php echo $getAppliedNominations[$key]['title']; ?></td>
                                <td  style="margin:5px;"><?php echo $getAppliedNominations[$key]['dept']; ?></td>
                                <td style="margin:5px;"><?php echo $status; ?></td>
                                <td style="margin:5px;"><?php echo $getAppliedNominations[$key]['date']; ?></td>
                                <td style="margin:5px;"><?php echo $count[0]['count(*)']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
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
        <!-- for bootstrap working -->
        <script type="text/javascript">
                    function ShowRequests() {
                        window.location = 'RequestedTrainingSessions.php'
                    }
                    function showNomination(nid) {
                        var data = "nid=" + nid;
                        alert(data);
                        $.ajax({
                            type: "POST",
                            url: "ShowNomination.php",
                            data: data,
                            success: function (dataString) {
                                alert(dataString)
                                $('#ajax-result').html(dataString);
                            }
                        });
                    }
                    function openNomination(nid) {
                        window.location = 'Nomination.php?nid=' + nid + "&hash=<?php echo $_SESSION['AdminNominationHash']; ?>";
                    }
                    function AddNomination() {
                        var title = $('#title').val();
                        var topic = $('#topic').val();
                        var fdate = $('#from-date').val();
                        var ldate = $('#to-date').val();
                        var qualification = $('#qualification').val();
                        var experience = $('#experience').val();
                        var description = $('#description').val();
                        var hash = $('#hash').val();
                        var dept = $('#dept').val();
                        var dur = $('#dur').val();

                        var data = "dur=" + dur + "&dept=" + dept + "&hash=" + hash + "&title=" + title + "&topic=" + topic + "&fdate=" + fdate + "&ldate=" + ldate + "&qualification=" + qualification + "&experience=" + experience + "&description=" + description;
                        //alert(data);
                        $.ajax({
                            type: "POST",
                            url: "AddNomination.php",
                            data: data,
                            success: function (dataString) {
                                $('#ajax-result').html(dataString);
                            }
                        });
                    }
                    function AddNews() {
                        var title = $('#news-title').val();
                        var date = $('#news-date').val();
                        var description = $('#news-description').val();
                        var hash = $('#news-hash').val();

                        var data = "hash=" + hash + "&title=" + title + "&date=" + date + "&description=" + description;
                        //alert(data);
                        $.ajax({
                            type: "POST",
                            url: "AddNews.php",
                            data: data,
                            success: function (dataString) {
                                $('#news-ajax-result').html(dataString);
                            }
                        });
                    }
        </script>

    </body>
</html>