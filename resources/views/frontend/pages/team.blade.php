@extends('frontend.layout.master')


@section('content')


<!-- BEGIN PAGE TITLE -->
@include('frontend.layout.page_head')    
<!-- END PAGE TITLE -->

<!-- Content
        ============================================= -->
<section id="content" >

    <div class="content-wrap" ng-controller="AboutController">

        <div class="container clearfix">
            <div class="col_one_third">

                <div class="heading-block fancy-title nobottomborder title-bottom-border">
                    <h4>Who we <span>Are</span>?</h4>
                </div>

                <p>BanglaFest is not a association nor organization. BanglaFest not even a club or company. BanglaFest is a name that helps bangladeshi associations, organization or clubs to promote all their events and festivals.
                    It's a website to promote all kind of Bangladeshi festivals orgnazide by different person or association around the world.
                </p>

            </div>

            <div class="col_one_third col_last">

                <div class="heading-block fancy-title nobottomborder title-bottom-border">
                    <h4>Our <span>Mission</span>.</h4>
                </div>

                <p>Our mission is to help organizers to promote their activities to as much as people possible via internet. </p>

            </div>      

            <div class="col_one_third">

                <div class="heading-block fancy-title nobottomborder title-bottom-border">
                    <h4>What we <span>DO</span>?</h4>
                </div>

                <p>BanglaFest promotes all kind of celebration and festivals organized by Bangladeshi associations and organizations around the world. This site holds information of the upcoming activities, photo-gallery, videos, time table, venue, organizing information etc.
                    In future we've plan to provide service of live webcast of the program via our website.</p>
            </div>
        </div>


        <div class="row common-height clearfix">

            <div class="col-sm-5 col-padding" style="background: url('images/team/3.jpg') center center no-repeat; background-size: cover;"></div>

            <div class="col-sm-7 col-padding">
                <div>
                    <div class="heading-block">
                        <span class="before-heading color">Founder &AMP; Developer</span>
                        <h3>NADIM Aseq A Arman</h3>
                    </div>

                    <div class="row clearfix">

                        <div class="col-md-6">
                            <p>By profession I'm a computer programmer. This project has been initialized by myself in my spare time.</p>
                            <a href="https://www.facebook.com/Arman.Nadim" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="https://twitter.com/armannadim" class="social-icon inline-block si-small si-light si-rounded si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>
                            <a href="https://plus.google.com/+NadimArman" class="social-icon inline-block si-small si-light si-rounded si-gplus">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>
                            <a href="https://www.linkedin.com/in/armannadim" class="social-icon inline-block si-small si-light si-rounded si-linkedin">
                                <i class="icon-linkedin"></i>
                                <i class="icon-linkedin"></i>
                            </a>
                            <a href="http://www.armannadim.com" class="social-icon inline-block si-small si-light si-rounded si-link">
                                <i class="icon-link"></i>
                                <i class="icon-link"></i>
                            </a>
                        </div>

                        <!--<div class="col-md-6">
                            <ul class="skills">
                                <li data-percent="80">
                                    <span>Wordpress</span>
                                    <div class="progress">
                                        <div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="80" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
                                    </div>
                                </li>
                                <li data-percent="60">
                                    <span>CSS3</span>
                                    <div class="progress">
                                        <div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="60" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
                                    </div>
                                </li>
                                <li data-percent="90">
                                    <span>HTML5</span>
                                    <div class="progress">
                                        <div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="90" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
                                    </div>
                                </li>
                                <li data-percent="70">
                                    <span>jQuery</span>
                                    <div class="progress">
                                        <div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="70" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
                                    </div>
                                </li>
                                <li data-percent="85">
                                    <span>Ruby</span>
                                    <div class="progress">
                                        <div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="85" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
                                    </div>
                                </li>
                            </ul>
                        </div>-->

                    </div>

                </div>
            </div>

        </div>

        <div class="row common-height bottommargin-lg clearfix">

            <div class="col-sm-7 col-padding" style="background-color: #F5F5F5;">
                <div>
                    <div class="heading-block">
                        <span class="before-heading color">Developer, Designer, Video editor, Marketing</span>
                        <h3>?? ??</h3>
                    </div>

                    <div class="row clearfix">

                        <div class="col-md-6">
                            <p>I'm the only person who's working on this project at this moment. But I would love to have more hands to contribute on this project.</p>
                            <p>To make it big I need more people of different profile. As it's a none-profit activities that's why I don't ask people to join. But if anyone interested on this project I'd have him/her in my team.</p>
                            <!--<a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>
                            <a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>-->
                        </div>

                        <!--<div class="col-md-6">
                            <ul class="skills">
                                <li data-percent="80">
                                    <span>Wordpress</span>
                                    <div class="progress">
                                        <div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="80" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
                                    </div>
                                </li>
                                <li data-percent="60">
                                    <span>CSS3</span>
                                    <div class="progress">
                                        <div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="60" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
                                    </div>
                                </li>
                                <li data-percent="90">
                                    <span>HTML5</span>
                                    <div class="progress">
                                        <div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="90" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
                                    </div>
                                </li>
                                <li data-percent="70">
                                    <span>jQuery</span>
                                    <div class="progress">
                                        <div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="70" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
                                    </div>
                                </li>
                                <li data-percent="85">
                                    <span>Ruby</span>
                                    <div class="progress">
                                        <div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="85" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
                                    </div>
                                </li>
                            </ul>
                        </div>-->

                    </div>

                </div>
            </div>

            <div class="col-sm-5 col-padding" style="background: url('images/team/8.jpg') center center no-repeat; background-size: cover;"></div>

        </div>

        <div class="heading-block center">
            <h2>Collaborator</h2>
            <span>Our collaborators, without whom it won't be possible to give life to this project.</span>
        </div>

        <div class="row clearfix">

            <div ng-repeat="collab in collabs" class="col-md-6 bottommargin">
                <div class="team team-list clearfix">
                    <div class="team-image">
                        <img src="[[collab.pic]]" alt="[[collab.name]]">
                    </div>
                    <div class="team-desc">
                        <div class="team-title"><h4>[[collab.name]], [[collab.first_name]]&nbsp;[[collab.last_name]]</h4><span>[[collab.association[0].name]], [[collab.city]], [[collab.country]]</span></div>
                        <div class="team-content">
                            <div ng-bind-html="collab.short_text"></div>                                                        
                        </div>
                        <a href="http://www.facebook.com/[[collab.facebook]]" class="social-icon si-rounded si-small si-light si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                        <a href="http://www.twitter.com/[[collab.twitter]]" class="social-icon si-rounded si-small si-light si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                        <a href="http://www.google.com/[[collab.gplus]]" class="social-icon si-rounded si-small si-light si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!--<div class="col-md-6 bottommargin">
                <div class="team team-list clearfix">
                    <div class="team-image">
                        <img src="images/team/2.jpg" alt="Josh Clark">
                    </div>
                    <div class="team-desc">
                        <div class="team-title"><h4>Josh Clark</h4><span>Co-Founder</span></div>
                        <div class="team-content">
                            <p>Carbon emissions reductions giving, legitimize amplify non-partisan Aga Khan. Policy dialogue assessment expert free-speech cornerstone disruptor freedom. Cesar Chavez empower.</p>
                        </div>
                        <a href="#" class="social-icon si-rounded si-small si-light si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                        <a href="#" class="social-icon si-rounded si-small si-light si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                        <a href="#" class="social-icon si-rounded si-small si-light si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 bottommargin">
                <div class="team team-list clearfix">
                    <div class="team-image">
                        <img src="images/team/8.jpg" alt="Mary Jane">
                    </div>
                    <div class="team-desc">
                        <div class="team-title"><h4>Mary Jane</h4><span>Sales</span></div>
                        <div class="team-content">
                            <p>Carbon emissions reductions giving, legitimize amplify non-partisan Aga Khan. Policy dialogue assessment expert free-speech cornerstone disruptor freedom. Cesar Chavez empower.</p>
                        </div>
                        <a href="#" class="social-icon si-rounded si-small si-light si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                        <a href="#" class="social-icon si-rounded si-small si-light si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                        <a href="#" class="social-icon si-rounded si-small si-light si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 bottommargin">
                <div class="team team-list clearfix">
                    <div class="team-image">
                        <img src="images/team/4.jpg" alt="Nix Maxwell">
                    </div>
                    <div class="team-desc">
                        <div class="team-title"><h4>Nix Maxwell</h4><span>Support</span></div>
                        <div class="team-content">
                            <p>Carbon emissions reductions giving, legitimize amplify non-partisan Aga Khan. Policy dialogue assessment expert free-speech cornerstone disruptor freedom. Cesar Chavez empower.</p>
                        </div>
                        <a href="#" class="social-icon si-rounded si-small si-light si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                        <a href="#" class="social-icon si-rounded si-small si-light si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                        <a href="#" class="social-icon si-rounded si-small si-light si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>
                    </div>
                </div>
            </div>
            -->
        </div>

        <!--<div class="container clearfix">

            <div class="clear"></div>

            <div class="heading-block center">
                <h4>Our Clients</h4>
            </div>

            <ul class="clients-grid grid-6 nobottommargin clearfix">
                <li><a href="http://logofury.com/logo/enzo.html"><img src="images/clients/1.png" alt="Clients"></a></li>
                <li><a href="http://logofury.com"><img src="images/clients/2.png" alt="Clients"></a></li>
                <li><a href="http://logofaves.com/2014/03/grabbt/"><img src="images/clients/3.png" alt="Clients"></a></li>
                <li><a href="http://logofaves.com/2014/01/ladera-granola/"><img src="images/clients/4.png" alt="Clients"></a></li>
                <li><a href="http://logofaves.com/2014/02/hershel-farms/"><img src="images/clients/5.png" alt="Clients"></a></li>
                <li><a href="http://logofury.com/logo/food-fight-radio.html"><img src="images/clients/6.png" alt="Clients"></a></li>
                <li><a href="http://logofury.com"><img src="images/clients/7.png" alt="Clients"></a></li>
                <li><a href="http://logofury.com/logo/up-travel.html"><img src="images/clients/8.png" alt="Clients"></a></li>
                <li><a href="http://logofury.com/logo/caffi-bardi.html"><img src="images/clients/9.png" alt="Clients"></a></li>
                <li><a href="http://logofury.com/logo/bignix-design.html"><img src="images/clients/10.png" alt="Clients"></a></li>
                <li><a href="http://logofury.com/"><img src="images/clients/11.png" alt="Clients"></a></li>
                <li><a href="http://logofury.com/"><img src="images/clients/12.png" alt="Clients"></a></li>
            </ul>

        </div>

        <div class="section footer-stick">

            <h4 class="uppercase center">What <span>Clients</span> Say?</h4>

            <div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
                <div class="flexslider">
                    <div class="slider-wrap">
                        <div class="slide">
                            <div class="testi-image">
                                <a href="#"><img src="images/testimonials/3.jpg" alt="Customer Testimonails"></a>
                            </div>
                            <div class="testi-content">
                                <p>Similique fugit repellendus expedita excepturi iure perferendis provident quia eaque. Repellendus, vero numquam?</p>
                                <div class="testi-meta">
                                    Steve Jobs
                                    <span>Apple Inc.</span>
                                </div>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="testi-image">
                                <a href="#"><img src="images/testimonials/2.jpg" alt="Customer Testimonails"></a>
                            </div>
                            <div class="testi-content">
                                <p>Natus voluptatum enim quod necessitatibus quis expedita harum provident eos obcaecati id culpa corporis molestias.</p>
                                <div class="testi-meta">
                                    Collis Ta'eed
                                    <span>Envato Inc.</span>
                                </div>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="testi-image">
                                <a href="#"><img src="images/testimonials/1.jpg" alt="Customer Testimonails"></a>
                            </div>
                            <div class="testi-content">
                                <p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum!</p>
                                <div class="testi-meta">
                                    John Doe
                                    <span>XYZ Inc.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>-->

    </div>

</section><!-- #content end -->



@stop