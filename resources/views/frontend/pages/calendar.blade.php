@extends('frontend.layout.master')


@section('content')


<!-- BEGIN PAGE TITLE -->
@include('frontend.layout.page_head')    
<!-- END PAGE TITLE -->

<!-- Content
============================================= -->
<section id="content" >

    <div class="content-wrap">

        <div ng-controller="CalendarController" class="parallax header-stick bottommargin-lg light" style="padding: 60px 0; background-image: url('images/calendar.jpg'); height: auto;" data-stellar-background-ratio="0.5">

            <div class="container clearfix">

                <div class="events-calendar">
                    <div class="events-calendar-header clearfix">
                        <h2>Events Overview</h2>
                        <h3 class="calendar-month-year">
                            <span id="calendar-month" class="calendar-month"></span>
                            <span id="calendar-year" class="calendar-year"></span>
                            <nav>
                                <span id="calendar-prev" class="calendar-prev"><i class="icon-chevron-left"></i></span>
                                <span id="calendar-next" class="calendar-next"><i class="icon-chevron-right"></i></span>
                                <span id="calendar-current" class="calendar-current" title="Go to current date"><i class="icon-reload"></i></span>
                            </nav>
                        </h3>
                    </div>
                    <div id="calendar" class="fc-calendar-container"></div>
                </div>
            </div>
        </div>

        <!--<div class="container clearfix">

            <div class="col_one_fourth nobottommargin">
                <div class="feature-box fbox-effect fbox-center fbox-outline nobottomborder">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-calendar i-alt"></i></a>
                    </div>
                    <h3>Interactive Sessions<span class="subtitle">Lorem ipsum dolor sit</span></h3>
                </div>
            </div>

            <div class="col_one_fourth nobottommargin">
                <div class="feature-box fbox-effect fbox-center fbox-outline nobottomborder">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-map i-alt"></i></a>
                    </div>
                    <h3>Great Locations<span class="subtitle">Officia ipsam laudantium</span></h3>
                </div>
            </div>

            <div class="col_one_fourth nobottommargin">
                <div class="feature-box fbox-effect fbox-center fbox-outline nobottomborder">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-microphone2 i-alt"></i></a>
                    </div>
                    <h3>Global Speakers<span class="subtitle">Laudantium cum dignissimos</span></h3>
                </div>
            </div>

            <div class="col_one_fourth nobottommargin col_last">
                <div class="feature-box fbox-effect fbox-center fbox-outline nobottomborder">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-food2 i-alt"></i></a>
                    </div>
                    <h3>In-between Meals<span class="subtitle">Perferendis accusantium quae</span></h3>
                </div>
            </div>
        -->
        <div class="clear"></div>

        <div class="divider divider-center"><i class="icon-circle-blank"></i></div>
        <div class="container clearfix">
            <h3>Upcoming Events</h3>


            <div id="posts" class="events small-thumbs" ng-controller="EventsController">


                <div class="entry clearfix" ng-repeat="event in events|  eventDateFilter:'start_datetime' | orderBy:'start_datetime':reverse" >
                    <!--<div class="entry clearfix" ng-repeat="event in events" >-->
                    <div class="entry-image">
                        <a href="http://localhost:9090/banglafest/event/[[event.id]]">
                            <img src="[[event.cover[2].thumb]]" alt="Inventore voluptates velit totam ipsa tenetur">
                            <div class="entry-date">[[event.start_datetime | date: 'dd']]<span>[[event.start_datetime | date: 'MMM']]</span></div>
                        </a>
                    </div>
                    <div class="entry-c">
                        <div class="entry-title">
                            <h2><a href="http://localhost:9090/banglafest/event/[[event.id]]">[[event.name]]</a></h2>
                        </div>
                        <ul class="entry-meta clearfix">
                            <li><span class="label label-warning">Private</span></li>
                            <li><a href="http://localhost:9090/banglafest/event/[[event.id]]"><i class="icon-time"></i> [[event.start_datetime | date: 'shortTime' ]]</a></li>
                            <li><a href="http://localhost:9090/banglafest/event/[[event.id]]"><i class="icon-map-marker2"></i> [[event.city]]</a></li>
                        </ul>
                        <div class="entry-content">
                            <div ng-bind-html="event.description"></div>
                            <a href="http://localhost:9090/banglafest/event/[[event.id]]" class="btn btn-danger">Read More</a>
                        </div>
                    </div>
                </div>
            </div>           

        </div>
    </div>
</div>

</section><!-- #content end -->
@stop