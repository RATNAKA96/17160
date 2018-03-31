<?php
include_once 'session.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<button style="display:none;" type="button" data-toggle="modal" data-target="#UserDetails" class="add-nomie btn btn-info btn-lg">Add Nomination</button>

<div class = "modal fade" id = "UserDetails" role = "dialog">
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
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script>
                                    jQuery(function () {
                                        jQuery('#UserDetails').click();
                                    });
</script>