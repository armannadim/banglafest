<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="SemiColonWeb" />

<!-- Stylesheets
============================================= -->

{!! HTML::style('http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic') !!}
{!! HTML::style('css/bootstrap.css') !!}
{!! HTML::style('css/style.css') !!}
{!! HTML::style('css/dark.css') !!}
{!! HTML::style('css/font-icons.css') !!}
{!! HTML::style('css/animate.css') !!}
{!! HTML::style('css/magnific-popup.css') !!}

@if(Request::path()=='calendar')
{!! HTML::style('css/calendar.css') !!}
@endif


{!! HTML::style('css/responsive.css') !!}
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<!-- External JavaScripts
============================================= -->
{!! HTML::script('js/jquery.js'); !!}
{!! HTML::script('js/plugins.js'); !!}

@if(Request::path()=='calendar')
{!! HTML::script('js/jquery.calendario.js'); !!}
{!! HTML::script('js/events-data.js'); !!}
@endif


{!! HTML::script('js/libs/angular.js/angular.js'); !!}
{!! HTML::script('js/libs/angular.js/angular-route.js'); !!}
{!! HTML::script('js/libs/angular.js/angular-sanitize.js'); !!}
{!! HTML::script('js/app.js'); !!}
