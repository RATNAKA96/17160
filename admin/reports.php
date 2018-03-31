<?php
include_once '../config/config.php';
$date_today = TodayDate();
$year = explode('-', $date_today);
$number = $year[0];
$PresentYear = $year[0];
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
        <title>VC Portal | Reports</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- //for-mobile-apps -->
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- js -->
        <script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
        <!-- //js -->

        <!--End-slider-script-->
        <!-- font-awesome icons -->
        <link rel="stylesheet" href="../css/font-awesome.min.css" />
        <link rel="stylesheet" href="../css/file.css" />
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
                        <h1><a class="navbar-brand" href="../index.php"><img src="../images/logo2.png"></a></h1>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                        <nav class="cl-effect-13" id="cl-effect-13">
                            <ul class="nav navbar-nav">
                                <li class=""><a href="../index.php">Home</a></li>
                                <li><a href="../about.php">About</a></li>
                                <li ><a href="../support.php">Support</a></li>
                                <li><a href="../faq.php">FAQ</a></li>
                                <li class="active"><a href="reports.php">Reports</a></li>
                                <li><a href="../user/index.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Login</a></li>
                            </ul>
                        </nav>
                    </div>
                </nav>
            </div>
        </div>

        <div class="container "  style="background-color:#0a9dbd; width: 650px;margin:5% 25%;border: 2px solid #73AD21; border-radius: 10px; padding:30px; background : #fff; ">

            <h3 class="text-center" style="margin:10px">Training Sessions Conducted In Year <?php echo $PresentYear; ?></h3><hr>
            <div class="bar-graph" >
                <style>
                    @-moz-keyframes bar-scale {
                        0% {
                            -moz-transform: scaleY(0);
                            transform: scaleY(0);
                        }
                        100% {
                            -moz-transform: scaleY(1);
                            transform: scaleY(1);
                        }
                    }
                    @-webkit-keyframes bar-scale {
                        0% {
                            -webkit-transform: scaleY(0);
                            transform: scaleY(0);
                        }
                        100% {
                            -webkit-transform: scaleY(1);
                            transform: scaleY(1);
                        }
                    }
                    @keyframes bar-scale {
                        0% {
                            -moz-transform: scaleY(0);
                            -ms-transform: scaleY(0);
                            -webkit-transform: scaleY(0);
                            transform: scaleY(0);
                        }
                        100% {
                            -moz-transform: scaleY(1);
                            -ms-transform: scaleY(1);
                            -webkit-transform: scaleY(1);
                            transform: scaleY(1);
                        }
                    }

                    .barContainer {
                        position: relative;
                        width: 550px;
                        height: 265px;
                        margin-top: 50px;
                    }
                    .barContainer .yaxis {
                        margin-right: 8px;
                        display: flex;
                        flex-direction: column-reverse;
                        float: left;
                    }
                    .barContainer .yaxis span {
                        margin: 4px 0;

                    }
                    .barContainer .bars {
                        display: -webkit-flex;
                        display: flex;
                        height: inherit;
                        -webkit-align-items: flex-end;
                        align-items: flex-end;
                        border-left: 1px solid #999;
                        border-bottom: 1px solid #999;
                    }
                    .barContainer .bars span {
                        display: inline-block;
                        vertical-align: bottom;
                        *vertical-align: auto;
                        *zoom: 1;
                        *display: inline;
                        -webkit-flex: 1 0;
                        flex: 1 0;
                        background: #0088CC;
                        margin: 0 4px;
                        -moz-transform-origin: 0% bottom;
                        -ms-transform-origin: 0% bottom;
                        -webkit-transform-origin: 0% bottom;
                        transform-origin: 0% bottom;
                        -moz-transform: scaleY(0);
                        -ms-transform: scaleY(0);
                        -webkit-transform: scaleY(0);
                        transform: scaleY(0);
                    }
                    .barContainer .bars span i {
                        position: relative;
                        top: -28px;
                        background: #000;
                        color: #fff;
                        font-size: 10px;
                        font-style: normal;
                        padding: 2px 4px;
                        -moz-border-radius: 2px;
                        -webkit-border-radius: 2px;
                        border-radius: 2px;
                    }
                    .barContainer .bars span i:before {
                        content: '';
                        position: absolute;
                        top: 100%;
                        left: 30%;
                        width: 0;
                        height: 0;
                        border-style: solid;
                        border-width: 4px 3px 0 3px;
                        border-color: #000000 transparent transparent transparent;
                    }
                    .barContainer .bars span:nth-child(1) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.1s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.1s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.1s forwards;
                    }
                    .barContainer .bars span:nth-child(2) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.2s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.2s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.2s forwards;
                    }
                    .barContainer .bars span:nth-child(3) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.3s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.3s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.3s forwards;
                    }
                    .barContainer .bars span:nth-child(4) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.4s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.4s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.4s forwards;
                    }
                    .barContainer .bars span:nth-child(5) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.5s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.5s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.5s forwards;
                    }
                    .barContainer .bars span:nth-child(6) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.6s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.6s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.6s forwards;
                    }
                    .barContainer .bars span:nth-child(7) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.7s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.7s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.7s forwards;
                    }
                    .barContainer .bars span:nth-child(8) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.8s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.8s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.8s forwards;
                    }
                    .barContainer .bars span:nth-child(9) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.9s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.9s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 0.9s forwards;
                    }
                    .barContainer .bars span:nth-child(10) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1s forwards;
                    }
                    .barContainer .bars span:nth-child(11) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.1s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.1s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.1s forwards;
                    }
                    .barContainer .bars span:nth-child(12) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.2s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.2s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.2s forwards;
                    }
                    .barContainer .bars span:nth-child(13) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.3s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.3s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.3s forwards;
                    }
                    .barContainer .bars span:nth-child(14) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.4s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.4s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.4s forwards;
                    }
                    .barContainer .bars span:nth-child(15) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.5s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.5s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.5s forwards;
                    }
                    .barContainer .bars span:nth-child(16) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.6s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.6s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.6s forwards;
                    }
                    .barContainer .bars span:nth-child(17) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.7s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.7s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.7s forwards;
                    }
                    .barContainer .bars span:nth-child(18) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.8s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.8s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.8s forwards;
                    }
                    .barContainer .bars span:nth-child(19) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.9s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.9s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 1.9s forwards;
                    }
                    .barContainer .bars span:nth-child(20) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2s forwards;
                    }
                    .barContainer .bars span:nth-child(21) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.1s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.1s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.1s forwards;
                    }
                    .barContainer .bars span:nth-child(22) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.2s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.2s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.2s forwards;
                    }
                    .barContainer .bars span:nth-child(23) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.3s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.3s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.3s forwards;
                    }
                    .barContainer .bars span:nth-child(24) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.4s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.4s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.4s forwards;
                    }
                    .barContainer .bars span:nth-child(25) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.5s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.5s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.5s forwards;
                    }
                    .barContainer .bars span:nth-child(26) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.6s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.6s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.6s forwards;
                    }
                    .barContainer .bars span:nth-child(27) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.7s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.7s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.7s forwards;
                    }
                    .barContainer .bars span:nth-child(28) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.8s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.8s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.8s forwards;
                    }
                    .barContainer .bars span:nth-child(29) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.9s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.9s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 2.9s forwards;
                    }
                    .barContainer .bars span:nth-child(30) {
                        -moz-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 3s forwards;
                        -webkit-animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 3s forwards;
                        animation: bar-scale 0.4s cubic-bezier(0.74, 0.62, 0.62, 1.44) 3s forwards;
                    }
                    .barContainer .xaxis {
                        margin: 8px 0 0 16px;
                        display: -webkit-flex;
                        display: flex;
                        flex-direction: row;
                    }
                    .barContainer .xaxis span {
                        margin: 0 8.6px;
                    }
                    .y-axis{
                        color:#fff;   
                    }
                </style>

                <?php
                $jan = 0;
                $feb = 0;
                $mar = 0;
                $apr = 0;
                $may = 0;
                $jun = 0;
                $jul = 0;
                $aug = 0;
                $sep = 0;
                $oct = 0;
                $nov = 0;
                $dec = 0;
                $dates = runQuery("SELECT * FROM `nominations` WHERE `date` like '$number%'");
                $count_nominations = count($dates);
                foreach ($dates as $key => $value) {
                    $year = explode('-', $dates[$key]['date_of_session']);
                    $number = $year[1];
                    switch ((int) $number) {
                        case "01":
                            $jan++;
                            break;
                        case "02":
                            $feb++;
                            break;
                        case "03":
                            $mar++;
                            break;
                        case "04":
                            $apr++;
                            break;
                        case "05":
                            $may++;
                            break;
                        case "06":
                            $jun++;
                            break;
                        case "07":
                            $jul++;
                            break;
                        case "08":
                            $aug++;
                            break;
                        case "09":
                            $sec++;
                            break;
                        case "10":
                            $oct++;
                            break;
                        case "11":
                            $nov++;
                            break;
                        default :
                            $dec++;
                            break;
                    }
                }
                ?>
                <div class="barContainer">
                    <div class="yaxis">
                        <span class="y-axis"></span>
                        <span class="y-axis">1</span>
                        <span class="y-axis">2</span>
                        <span class="y-axis">3</span>
                        <span class="y-axis">4</span>
                        <span class="y-axis">5</span>
                        <span class="y-axis">6</span>
                        <span class="y-axis">7</span>
                        <span class="y-axis">8</span>
                        <span class="y-axis">9</span>
                        <span class="y-axis">10</span>
                    </div>
                    <div class="bars">
                        <span style="height:<?php echo $jan * 10; ?>%"><i><?php echo $jan; ?></i></span>
                        <span style="height:<?php echo $feb * 10; ?>%"><i><?php echo $feb; ?></i></span>
                        <span style="height:<?php echo $mar * 10; ?>%"><i><?php echo $mar; ?></i></span>
                        <span style="height:<?php echo $apr * 10; ?>%"><i><?php echo $apr; ?></i></span>
                        <span style="height:<?php echo $may * 10; ?>%"><i><?php echo $may; ?></i></span>
                        <span style="height:<?php echo $jun * 10; ?>%"><i><?php echo $jun; ?></i></span>
                        <span style="height:<?php echo $jul * 10; ?>%"><i><?php echo $jul; ?></i></span>
                        <span style="height:<?php echo $aug * 10; ?>%"><i><?php echo $aug; ?></i></span>
                        <span style="height:<?php echo $sep * 10; ?>%"><i><?php echo $sep; ?></i></span>
                        <span style="height:<?php echo $oct * 10; ?>%"><i><?php echo $oct; ?></i></span>
                        <span style="height:<?php echo $nov * 10; ?>%"><i><?php echo $nov; ?></i></span>
                        <span style="height:<?php echo $dec * 10; ?>%"><i><?php echo $dec; ?></i></span>
                    </div>
                    <div class="xaxis">
                        <span>Jan</span>
                        <span>Feb</span>
                        <span>Mar</span>
                        <span>Apr</span>
                        <span>May</span>
                        <span>Jun</span>
                        <span>Jul</span>
                        <span>Aug</span>
                        <span>Sep</span>
                        <span>Oct</span>
                        <span>Nov</span>
                        <span>Dec</span>
                    </div>
                </div>
            </div>
        </div>


        <?php
        $pending = numRows("SELECT * FROM `nominations` WHERE `status` = 'Pending'");
        $closed = numRows("SELECT * FROM `nominations` WHERE `status` = 'Closed'");
//        $count_nominations
        $others = 5;
        ?>
        <div class="container" style="background-color:#0a9dbd; width: 650px;margin:5% 25%;border: 2px solid #73AD21; border-radius: 10px; padding:30px; background : #fff; ">
            
            <h3 class="text-center" style="margin:10px">Training Sessions Status</h3><hr>
            
            <div id="piechart"></div>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <script type="text/javascript">
                // Load google charts
                google.charts.load('current', {'packages': ['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                // Draw the chart and set the chart values
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        ['Total', <?php echo $count_nominations; ?>],
                        ['Pending', <?php echo $pending; ?>],
                        ['Closed', <?php echo $closed; ?>],
                        ['Other', <?php echo $others; ?>]
                    ]);

                    // Optional; add a title and set the width and height of the chart
                    var options = {'title': '', 'width': 550, 'height': 400};

                    // Display the chart inside the <div> element with id="piechart"
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data, options);
                }
            </script>
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
        <script src="../js/file.js"></script>
        <!-- //for bootstrap working -->

    </body>
</html>



