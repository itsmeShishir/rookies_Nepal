  <!-- Footer Area Start -->
  <div class="footer-area" Style="background-color:black">
    <div class="footer-container">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-md-30px mb-lm-30px">
                        <div class="single-wedge">
                            <h4 class="footer-herading" style="color: #23A455;">ABOUT US</h4>
                            <p class="text-infor">{{$headerDetails->about}}</p>
                            <div class="need-help">
                                <p class="phone-info">
                                    NEED HELP?
                                    <span>
                                    {{$headerDetails->mobile}} <br />
                                    {{$headerDetails->phone}}
                                        </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 mb-md-30px mb-lm-30px">
                        <div class="single-wedge">
                            <h4 class="footer-herading" style="color: #23A455;">Information</h4>
                            <div class="footer-links">
                                <ul>
                                    <li><a href="#">Delivery Area</a></li>
                                    <li><a href="/about">About Us</a></li>
                                    <li><a href="/policies">Policies</a></li>
                                    <li><a href="/contact-us">Contact Us</a></li>
                                    <li><a href="/terms-and-conditions">Terms & Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 mb-sm-30px mb-lm-30px">
                        <div class="single-wedge">
                            <h4 class="footer-herading" style="color: #23A455;">Quick Links</h4>
                            <div class="footer-links">
                                <ul>
                                    <li><a href="/faqs">FAQ</a></li>
                                    <li><a href="/day-deals">Daily Deals</a></li>
                                    <li><a href="#">New Products</a></li>
                                    <li><a href="#">Best Sellers</a></li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 ">
                        <div class="single-wedge">
                            <h4 class="footer-herading" style="color: #23A455;">NEWSLETTER</h4>
                            <div class="subscrib-text">
                                <p>Please enter your email to get exclusive offers (You may unsubscribe at any time .) </p>
                            </div>
                            <div id="mc_embed_signup" class="subscribe-form">
                                <form id="mc-embedded-subscribe-form" class="validate" novalidate="" name="mc-embedded-subscribe-form" method="post" action="/add-newsletter-subscriber">{{ csrf_field() }}
                                    <div id="mc_embed_signup_scroll" class="mc-form">
                                        <input class="email" type="email" required="" placeholder="Enter your email here.." name="EMAIL" value="" />
                                        <div class="clear">
                                            <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="Sign Up" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="social-info">
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/Rookies-Nepal-Pvt-Ltd-114649500240996/"><i class="icon-social-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/NepalRookies"><i class="icon-social-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/rookiesnepal/"><i class="icon-social-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="mailto:exclusive.intcon@gmail.com"><i class="icon-social-google"></i></a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom" style="color:#23A455">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="copy-text">Copyright © <a href="https://hasthemes.com/"> Rookies Nepal Pvt Ltd</a>. All Rights Reserved</p>    <p>Devloped by <a href="https://trioplustechnology.com/"> Trioplus Technology</a></p>
                    </div>
                    <div class="col-md-6 text-right">
                    
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Area End -->
<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            facebook: "114649500240996", // Facebook page ID
            call_to_action: "Message us", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->