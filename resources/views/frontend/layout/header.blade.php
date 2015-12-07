<!-- Header
============================================= -->
<header id="header" class="transparent-header full-header" data-sticky-class="not-dark">

    <div id="header-wrap">

        <div class="container clearfix">

            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="{!! url('/') !!}" class="standard-logo" data-dark-logo="images/logo-dark.png">{!! HTML::image('images/logo.png', 'Canvas Logo') !!}</a>
                <a href="{!! url('/') !!}" class="retina-logo" data-dark-logo="images/logo-dark@2x.png">{!! HTML::image('images/logo@2x.png', 'Canvas Logo') !!}</a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu" class="dark">

                <ul>
                    <li class="{{Request::path()=='/'?'current':''}}"><a href="{!! url('/') !!}"><div>Home</div></a></li>
                    <!--<li class="{{(Request::path()=='aboutus')||(Request::path()=='services')||(Request::path()=='sponsors')||(Request::path()=='team')?'current':''}}"><a href="{!! url('aboutus') !!}"><div>About us</div></a>
                        <ul>
                            <li><a href="{!! url('team') !!}"><div><i class="icon-stack"></i>Heros behind the scene</div></a></li>
                            <li><a href="{!! url('services') !!}"><div><i class="icon-stack"></i>Services</div></a></li>
                            <li><a href="{!! url('sponsors') !!}"><div><i class="icon-stack"></i>Sponsors</div></a></li>                            
                        </ul>
                    </li>-->
                    <li class="{{Request::path()=='aboutus'?'current':''}}"><a href="{!! url('team') !!}"><div>About us</div></a></li>
                    <li class="{{Request::path()=='live'?'current':''}}"><a href="{!! url('live') !!}"><div>Live videos</div></a></li>
                    <!--<li class="{{Request::path()=='all-events'?'current':''}}"><a href="{!! url('all-events') !!}"><div>Events</div></a></li>-->
                    <li class="{{(Request::path()=='calendar')||(Request::path()=='all-events')||(Request::path()=='past')?'current':''}}"><a href="{!! url('all-events') !!}"><div>Events</div></a>
                        <ul>
                            <li><a href="{!! url('calendar') !!}"><div><i class="icon-stack"></i>Calendar</div></a></li>
                            <li><a href="{!! url('past-events') !!}"><div><i class="icon-stack"></i>Past events</div></a></li>
                        </ul>
                    </li>
                    <li class="{{Request::path()=='contact'?'current':''}}"><a href="{!! url('contact') !!}"><div>Contact us</div></a></li>
                </ul>



                <!-- Top Search
                ============================================= -->
                <div id="top-search">
                    <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                    <form action="{!! url('search') !!}" method="get">
                        <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                    </form>
                </div><!-- #top-search end -->

            </nav><!-- #primary-menu end -->

        </div>

    </div>

</header><!-- #header end -->