@extends('frontend.layout.master')


@section('content')


<!-- BEGIN PAGE TITLE -->
@include('frontend.layout.page_head')    
<!-- END PAGE TITLE -->

<!-- Content
        ============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix" ng-controller="EventsController">

            <div id="posts" class="events small-thumbs">


                <div class="entry clearfix" ng-repeat="event in events |  eventDateFilter:'start_datetime' | orderBy:'start_datetime':reverse" >
                <!--<div class="entry clearfix" ng-repeat="event in events" >-->
                    <div class="entry-image">
                        <a href="{!! url('/') !!}/event/[[event.id]]">
                            <img src="[[event.cover[2].thumb]]" alt="Inventore voluptates velit totam ipsa tenetur">
                            <div class="entry-date">[[event.start_datetime | date: 'dd']]<span>[[event.start_datetime | date: 'MMM']]</span></div>
                        </a>
                    </div>
                    <div class="entry-c">
                        <div class="entry-title">
                            <h2><a href="{!! url('/') !!}/event/[[event.id]]">[[event.name]]</a></h2>
                        </div>
                        <ul class="entry-meta clearfix">
                            <li><span class="label label-warning">Private</span></li>
                            <li><a href="{!! url('/') !!}/event/[[event.id]]"><i class="icon-time"></i> [[event.start_datetime | date: 'shortTime' ]]</a></li>
                            <li><a href="{!! url('/') !!}/event/[[event.id]]"><i class="icon-map-marker2"></i> [[event.city]]</a></li>
                        </ul>
                        <div class="entry-content">
                            <div ng-bind-html="event.description"></div>
                            <a href="{!! url('/') !!}/event/[[event.id]]" class="btn btn-danger">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination
            ============================================= -->
            <ul class="pager nomargin">
                <li class="previous"><a href="#">&larr; Older</a></li>
                <li class="next"><a href="#">Newer &rarr;</a></li>
            </ul><!-- .pager end -->

        </div>

    </div>

</section><!-- #content end -->

@stop