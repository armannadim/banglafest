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

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="width=device-width, initial-scale=1" name="viewport">
            <meta content="Bangladeshi Festival around the world." name="description">
            <meta content="Nadim Aseq A Arman" name="author">

            @include('static.meta_top')


            <title>BanglaFest Admin Panel - {{$title}}</title>
        </head>
        <!-- END HEAD -->
        <!-- BEGIN BODY -->
        <!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
        <!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->

        <body>
            <!-- BEGIN HEADER -->
            <div class="page-header">
                <!-- BEGIN HEADER TOP -->
                @include('layout.header')    
                <!-- END HEADER TOP -->
                <!-- BEGIN HEADER MENU -->
                @include('layout.menu')
                <!-- END HEADER MENU -->
            </div>
            <!-- END HEADER -->

            <!-- BEGIN PAGE CONTAINER -->
            <div class="page-container">
                <!-- BEGIN PAGE HEAD -->
                @include('layout.page_head')
                <!-- END PAGE HEAD -->
                <!-- BEGIN PAGE CONTENT -->
                @yield('content')
                <!-- END PAGE CONTENT -->
            </div>

            <!-- BEGIN FOOTER -->
            @include('layout.footer')
            <!-- END FOOTER -->
            <!-- BEGIN JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->
            @include('static.meta_bottom')
            <!-- END JAVASCRIPTS -->
            
            @section('js')
            @show
        </body>
    </html>
