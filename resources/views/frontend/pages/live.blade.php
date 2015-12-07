@extends('frontend.layout.master')
<link type="text/css" rel="stylesheet" href="include/lightGallery/css/lightGallery.css" /> 

@section('content')


<!-- BEGIN PAGE TITLE -->
@include('frontend.layout.page_head')    
<!-- END PAGE TITLE -->

<!-- Content
                ============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="heading-block title-center nobottomborder">
                <h1>This feature is not available yet.</h1>
                <span>Soon this option will be available to watch programs live.</span>
                <span>Till then enjoy videos of live performence of bangladeshi artists around the world. If you want to show your videos on this page, please send all the youtube links of your video to us using contact us form.</span>
            </div>
            <div id="lightgallery">
                <a data-src="https://www.youtube.com/watch?v=gjkV2EcEe7M" href="https://www.youtube.com/watch?v=gjkV2EcEe7M" >
                    <img src="img/thumb1.jpg" />
                </a>
                <a data-src="https://vimeo.com/1084537" href="https://vimeo.com/1084537" >
                    <img src="img/thumb2.jpg" />
                </a>
            </div>
            <!-- <div id="countdown-ex1" class="countdown countdown-large divcenter bottommargin" style="max-width:700px;"></div>
 
             <div class="clear"></div>
 
             <div class="progress progress-striped active topmargin divcenter" style="height: 10px; max-width:600px;">
                 <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                     <span class="sr-only">80% Complete</span>
                 </div>
             </div>
 
             <div class="divider divider-center divider-short divider-margin"><i class="icon-time"></i></div>
            -->
            <!--<div id="widget-subscribe-form-result" data-notify-type="success" data-notify-msg=""></div>
            <form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                <div class="input-group input-group-lg divcenter" style="max-width:600px;">
                    <span class="input-group-addon"><i class="icon-email2"></i></span>
                    <input type="email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Subscribe Now</button>
                    </span>
                </div>
            </form>
            -->

        </div>

    </div>

</section><!-- #content end -->


<!-- jQuery version must be >= 1.8.0; -->

<script src="include/lightGallery/js/lightgallery.min.js"></script>

<!-- A jQuery plugin that adds cross-browser mouse wheel support. (Optional) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>

<!-- lightgallery plugins -->
<script src="include/lightGallery/js/lg-video.js"></script>
<script src="include/lightGallery/js/lg-thumbnail.min.js"></script>
<script src="include/lightGallery/js/lg-fullscreen.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        $("#lightgallery").lightGallery({
            loadYoutubeThumbnail: true,
            youtubeThumbSize: 'default',
            loadVimeoThumbnail: true,
            vimeoThumbSize: 'thumbnail_medium',
        });


        var newDate = new Date(2016, 2, 31);
        $('#countdown-ex1').countdown({until: newDate});
    });
    $("#widget-subscribe-form").validate({
        submitHandler: function(form) {
            $(form).find('.input-group-addon').find('.icon-email2').removeClass('icon-email2').addClass('icon-line-loader icon-spin');
            $(form).ajaxSubmit({
                target: '#widget-subscribe-form-result',
                success: function() {
                    $(form).find('.input-group-addon').find('.icon-line-loader').removeClass('icon-line-loader icon-spin').addClass('icon-email2');
                    $('#widget-subscribe-form').find('.form-control').val('');
                    $('#widget-subscribe-form-result').attr('data-notify-msg', $('#widget-subscribe-form-result').html()).html('');
                    SEMICOLON.widget.notifications($('#widget-subscribe-form-result'));
                }
            });
        }
    });
</script>

@stop