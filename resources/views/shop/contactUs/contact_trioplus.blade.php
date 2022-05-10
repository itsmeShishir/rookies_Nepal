@extends('shop.layouts.master')
@section('content')
  <!-- contact area start -->
  <div class="contact-area mtb-40px">
    <div class="container">
       
        <div class="custom-row-2">
            <div class="col-lg-4 col-md-5 mb-lm-25px">
                <div class="contact-info-wrap">
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="ion-android-call"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p><a href="tel://+012 345 678 102">{{$headerDetails->phone}}</a></p>
                            <p><a href="tel://+012 345 678 102">{{$headerDetails->mobile}}</a></p>
                        </div>
                    </div>
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="ion-android-globe"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p><a href="mailto://urname@email.com">{{$headerDetails->email}}</a></p>
                           
                        </div>
                    </div>
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="ion-android-pin"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p>Link Road Pushpalal </p>
                            <p>Nayabazar , Kathmandu </p>
                        </div>
                    </div>
                    <div class="contact-social">
                        <h3>Follow Us</h3>
                        <div class="social-info">
                            <ul>
                                <li>
                                    <a href="#"><i class="ion-social-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="ion-social-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="ion-social-youtube"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="ion-social-google"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="ion-social-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="contact-form">
                    <div class="contact-title mb-30">
                        <h2>Get In Touch</h2>
                    </div>
                    <form class="contact-form-style" id="contact-form" action="/contact-us" method="post">{{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6">
                                <input name="name" placeholder="Name" type="text" />
                            </div>
                            <div class="col-lg-6">
                                <input name="email" placeholder="Email" type="email" />
                            </div>
                            <div class="col-lg-12">
                                <input name="subject" placeholder="Subject" type="text" />
                            </div>
                            <div class="col-lg-12">
                                <textarea name="message" placeholder="Your Message"></textarea>
                                <button class="submit mt-2" type="submit">SEND</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.9950217188425!2d85.30337181506229!3d27.717439982787706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7b3624f5d5cc1eed!2sRookies%20Nepal%20Pvt%20Ltd!5e0!3m2!1sen!2snp!4v1608224656017!5m2!1sen!2snp" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
<!-- contact area end -->
@endsection