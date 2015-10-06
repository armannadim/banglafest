<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 4.0.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Metronic | Login Form 4</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        {!! HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') !!}
        {!! HTML::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
        {!! HTML::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
        {!! HTML::style('assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}
        {!! HTML::style('assets/global/plugins/uniform/css/uniform.default.css') !!}
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        {!! HTML::style('assets/global/plugins/select2/select2.css') !!}
        {!! HTML::style('assets/admin/pages/css/login-soft.css') !!}
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME STYLES -->
        {!! HTML::style('assets/global/css/components-rounded.css') !!}
        {!! HTML::style('assets/global/css/plugins.css') !!}
        {!! HTML::style('assets/admin/layout/css/layout.css') !!}
        {!! HTML::style('assets/admin/layout/css/themes/default.css') !!}
        {!! HTML::style('assets/admin/layout/css/custom.css') !!}        
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="../../assets/admin/layout3/img/logo-big.png" alt=""/>
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="menu-toggler sidebar-toggler">
        </div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- BEGIN LOGIN -->
        <div class="content">

            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="/password/reset" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h3>Reset password</h3>
                <p>
                    Enter your e-mail address and new password below to reset your password.
                </p>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label class="col-md-4 control-label">E-Mail Address</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Confirm Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Reset Password
                        </button>
                    </div>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->           
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright">
            2015 &copy; BanglaFest Admin panel.
        </div>
        <!-- END COPYRIGHT -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
        {!! HTML::script('assets/global/plugins/jquery.min.js'); !!}
        {!! HTML::script('assets/global/plugins/jquery.min.js'); !!}
        <script src="../../assets/global/plugins/respond.min.js"></script>
        <script src="../../assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        {!! HTML::script('assets/global/plugins/jquery.min.js'); !!}
        {!! HTML::script('assets/global/plugins/jquery-migrate.min.js'); !!}
        {!! HTML::script('assets/global/plugins/bootstrap/js/bootstrap.min.js'); !!}
        {!! HTML::script('assets/global/plugins/jquery.blockui.min.js'); !!}
        {!! HTML::script('assets/global/plugins/uniform/jquery.uniform.min.js'); !!}
        {!! HTML::script('assets/global/plugins/jquery.cokie.min.js'); !!}
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {!! HTML::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js'); !!}
        {!! HTML::script('assets/global/plugins/backstretch/jquery.backstretch.min.js'); !!}
        {!! HTML::script('assets/global/plugins/select2/select2.min.js'); !!}
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        {!! HTML::script('assets/global/scripts/metronic.js'); !!}
        {!! HTML::script('assets/admin/layout/scripts/layout.js'); !!}
        {!! HTML::script('assets/admin/layout/scripts/demo.js'); !!}
        {!! HTML::script('assets/admin/pages/scripts/login-soft.js'); !!}
        <!-- END PAGE LEVEL SCRIPTS -->
        <script>
            jQuery(document).ready(function() {
                Metronic.init(); // init metronic core components
                Layout.init(); // init current layout
                Login.init();
                Demo.init();
                // init background slide images
                $.backstretch([
                    "../../assets/admin/pages/media/bg/1.jpg",
                    "../../assets/admin/pages/media/bg/2.jpg",
                    "../../assets/admin/pages/media/bg/3.jpg",
                    "../../assets/admin/pages/media/bg/4.jpg"
                ], {
                    fade: 1000,
                    duration: 8000
                }
                );
            });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>