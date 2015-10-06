<!DOCTYPE html>
<!--
This project has been created by Aseq A Arman Nadim.
Anyone can use this project and its contents but with permission of the author of this project.
Email: armannadim@msn.com

Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 4.0.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
-->


<html dir="ltr" lang="en-US" ng-app="banglaFest">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="Bangladeshi Festival around the world." name="description">
        <meta content="Nadim Aseq A Arman" name="author">

        @include('frontend.layout.meta_top')


        <title>BanglaFest - {{$title}}</title>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
    <!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->

    <body class="stretched" data-loader="8">

        <div id="wrapper" class="clearfix">
            <!-- BEGIN HEADER -->
            @include('frontend.layout.header')    
            <!-- END HEADER -->

            <!-- BEGIN PAGE CONTENT -->
            @yield('content')
            <!-- END PAGE CONTENT -->

            <!-- BEGIN FOOTER -->
            @include('frontend.layout.footer')
            <!-- END FOOTER -->

            <!-- BEGIN JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->
            @include('frontend.layout.meta_bottom')
            <!-- END JAVASCRIPTS -->

    </body>
</html>
