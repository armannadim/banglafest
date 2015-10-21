@extends('frontend.layout.master')


@section('content')


<!-- BEGIN PAGE TITLE -->
@include('frontend.layout.page_head')    
<!-- END PAGE TITLE -->

<!-- Content
                ============================================= -->
<section id="content" ng-controller="EventController">

    <div class="content-wrap">

        <div class="single-event">

            <div class="entry-image parallax overlay-right header-stick nobottommargin">
                <div class="section nopadding nomargin slider-parallax" style="height:600px">
                    <div class="video-wrap">
                        <video poster="../images/videos/explore-poster.jpg" preload="auto" loop autoplay muted>
                            <source src='../images/videos/explore.mp4' type='video/mp4' />
                            <source src='../images/videos/explore.webm' type='video/webm' />
                        </video>
                        <div class="video-overlay"></div>
                    </div>
                    <div class="entry-overlay-meta">
                        <h2><a href="#">[[event.city]]: [[event.name]]</a></h2>
                        <ul class="iconlist">
                            <li><i class="icon-calendar3"></i> <strong>Date:</strong> [[event.start_datetime | date: 'longDate']]</li>
                            <li><i class="icon-time"></i> <strong>Timing:</strong> [[event.start_datetime | date: 'shortTime']] - [[event.end_datetime | date: 'shortTime']]</li>
                            <li><i class="icon-map-marker2"></i> <strong>Location:</strong> [[event.city]], [[event.country]]</li>                            
                        </ul>
                        <a href="#" class="btn btn-danger btn-block btn-lg">Open for all</a>
                    </div>
                    <div class="entry-overlay">
                        <div id="event-countdown" class="countdown"></div>
                    </div>                    

                </div>
            </div>

            <div class="container topmargin clearfix">

                <div class="col_three_fourth">

                    <h3>Details</h3>


                    <div ng-bind-html="[[event.description]]"></div>


                    <div class="col_half nobottommargin" ng-if="event.guests.length > 0">
                        <h4>Guests</h4>
                        <ul class="iconlist nobottommargin">
                            <li ng-repeat="guest in event.guests">
                                <i class="icon-ok"></i> [[guest.name]],[[guest.description]]
                            </li>                            
                        </ul>
                    </div>
                    <div class="col_half nobottommargin" ng-if="event.associations.length > 0">
                        <h4>Organizers</h4>
                        <ul class="iconlist nobottommargin">
                            <li ng-repeat="organizer in event.associations">
                                <i class="icon-ok"></i> [[organizer.name]],[[organizer.city]]
                            </li>                                        
                        </ul>
                    </div>
                    <div class="col_half nobottommargin col_last" ng-if="event.performers.length > 0">
                        <h4>Performers</h4>
                        <ul class="iconlist nobottommargin">
                            <li ng-repeat="performer in event.performers">
                                <i class="icon-ok"></i> [[performer.name]],[[performer.description]]
                            </li>                                        
                        </ul>
                    </div>

                </div>

                <div class="col_one_fourth col_last">

                    <h4>Location</h4>

                    <section id="event-location" class="gmap" style="height: 300px;"></section>

                    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                    <script type="text/javascript" src="../js/jquery.gmap.js"></script>
                    <input type="hidden" id="event_city" value="[[event.city]]"/>
                    <input type="hidden" id="event_country" value="[[event.country]]"/>
                    <input type="hidden" id="event_venue" value="[[event.venue]]"/>


                </div>

                <div class="clear"></div>

                <div class="col_two_fifth nobottommargin">

                    <h4>Gallery</h4>

                    <!-- Events Single Gallery Thumbs
                    ============================================= -->
                    <div class="masonry-thumbs col-4" data-lightbox="gallery">
                        <a data-lightbox="gallery-item" ng-repeat="photo in event.photos" href="[[photo.filename]]" >
                            <img class="image_fade" src="[[photo.thumb]]" alt="[[photo.filename]]"> 
                        </a>                                                
                    </div>

                    <div class="col-4" ng-if="event.photos.length <= 0">
                        <h5>No photos/videos available.</h5>
                    </div><!-- Event Single Gallery Thumbs End -->

                </div>



                <div class="col_three_fifth nobottommargin col_last">

                    <h4>Events Timeline</h4>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Timings</th>
                                    <th>Location</th>
                                    <th>Events</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-if="event.events.length <= 0"><td colspan="4">Timetable not published yet.</td></tr>
                                <tr ng-repeat="event in event.events">
                                    <td><span class="label label-danger">[[event.start_time | dateToISO | date: 'mediumDate']]</span></td>
                                    <td><span class="label label-danger">[[event.start_time | dateToISO | date: 'shortTime']] - [[event.end_time | dateToISO | date: 'shortTime']]</span></td>
                                    <td>[[event.location]]</td>
                                    <td>[[event.events]]</td>
                                </tr>                                
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section><!-- #content end -->

@stop