<!-- Footer
        ============================================= -->
<footer id="footer" class="dark" style="background: url('{{ asset('images/footer-bg.jpg') }}') repeat fixed; background-size: 100% 100%;">

    <div class="container">

        <!-- Footer Widgets
        ============================================= -->
        <div class="footer-widgets-wrap clearfix">

            <div class="col_two_third">

                <div class="widget clearfix">


                    {!! HTML::image('images/footer-widget-logo.png',"", array('class'=>'alignleft','style' => 'margin-top: 8px; padding-right: 18px; border-right: 1px solid #4A4A4A;')) !!}
                    <p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards with a Retina &amp; Responsive Approach. Browse the amazing Features this template offers.</p>

                    <div class="line" style="margin: 30px 0;"></div>

                    <div class="col_half">
                        <div class="widget clearfix">

                            <div class="hidden-xs hidden-sm"><div class="clear" style="padding-top: 10px;"></div></div>

                            <div class="col-md-6 bottommargin-sm center">
                                <div class="counter counter-small" style="color: #35BBAA;"><span data-from="50" data-to="15065425" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
                                <h5 class="nobottommargin">Total Downloads</h5>
                            </div>

                            <div class="col-md-6 bottommargin-sm center col_last">
                                <div class="counter counter-small" style="color: #2CAACA;"><span data-from="100" data-to="18465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
                                <h5 class="nobottommargin">Clients Served</h5>
                            </div>

                        </div>
                    </div>

                    <div class="col_half col_last">
                        <div class="widget subscribe-widget clearfix">
                            <h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
                            <div id="widget-subscribe-form-result" data-notify-type="success" data-notify-msg=""></div>
                            <form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                                <div class="input-group divcenter">
                                    <span class="input-group-addon"><i class="icon-email2"></i></span>
                                    <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="submit">Subscribe</button>
                                    </span>
                                </div>
                            </form>
                            <script type="text/javascript">
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
                        </div>
                    </div>

                </div>

            </div>

            <div class="col_one_third col_last">

                <div class="widget clearfix">
                    <h4>Instagram Photos</h4>
                    <div id="instagram_widget" class="instagram-photos masonry-thumbs col-5" data-user="armannadim" data-count="10" data-type="user"></div>
                </div>

            </div>

        </div><!-- .footer-widgets-wrap end -->

    </div>

    <!-- Copyrights
    ============================================= -->
    <div id="copyrights">

        <div class="container clearfix">

            <div class="col_half">
                <div class="copyrights-menu copyright-links clearfix">
                    <a href="#">Home</a>/<a href="#">About</a>/<a href="#">Features</a>/<a href="#">Portfolio</a>/<a href="#">FAQs</a>/<a href="#">Contact</a>
                </div>
                Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.
            </div>

            <div class="col_half col_last tright">
                <div class="fright clearfix">
                    <a href="#" class="social-icon si-small si-borderless nobottommargin si-facebook">
                        <i class="icon-facebook"></i>
                        <i class="icon-facebook"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-borderless nobottommargin si-twitter">
                        <i class="icon-twitter"></i>
                        <i class="icon-twitter"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-borderless nobottommargin si-gplus">
                        <i class="icon-gplus"></i>
                        <i class="icon-gplus"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-borderless nobottommargin si-pinterest">
                        <i class="icon-pinterest"></i>
                        <i class="icon-pinterest"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-borderless nobottommargin si-vimeo">
                        <i class="icon-vimeo"></i>
                        <i class="icon-vimeo"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-borderless nobottommargin si-github">
                        <i class="icon-github"></i>
                        <i class="icon-github"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-borderless nobottommargin si-yahoo">
                        <i class="icon-yahoo"></i>
                        <i class="icon-yahoo"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-borderless nobottommargin si-linkedin">
                        <i class="icon-linkedin"></i>
                        <i class="icon-linkedin"></i>
                    </a>
                </div>
            </div>

        </div>

    </div><!-- #copyrights end -->

</footer><!-- #footer end -->