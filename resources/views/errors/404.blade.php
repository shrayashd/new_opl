@extends('layouts.frontend.master')

@section('content')
    <div class="popup-search-box d-none d-lg-block  ">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input class="border-theme" type="text" placeholder="What are you looking for">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>

    <!-- breadcumb -->
    <section class="z-index-common breadcumb-wrapper">
        <div class="hero-bg" data-bg-src="assets/img/bg/b-1-1.png"></div>
        <div class="breadcumb-shape"></div>
        <div class="hero-leaf3">
            <img src="assets/img/hero/h-1-4.png" alt="hero leaf 3">
        </div>
        <div class="container">
            <div class="row gy-4 justify-content-between align-items-center">
                <div class="col-xl-auto mb-30">
                    <div class="error-content">
                        <h1 class="sec-title">404</h1>
                        <h2 class="sec-subtitle"><span>Ooops,</span> Page Not Found</h2>
                        <p class="sec-text">We Can't Seem to find the page you're looking for.</p>
                        {{-- <div class="subscriber-form">
                                <input class="form-control" type="email" placeholder="Enter your email address...">
                                <button class="vs-btn">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div> --}}
                        <div class="d-inline-flex">
                            <a class="vs-btn style2" href="index.html">Back to Home</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-auto mb-30">
                    <div class="error-img">
                        <img class="img1" src="assets/img/others/404.png" alt="hero image 1">
                        <div class="hero-certificate">
                            <img src="assets/img/logos/l-1-1.png" alt="logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="widget-area style3" data-bg-src="assets/img/bg/footer-bg-3-1.png">
        <img class="footer-overlay" src="assets/img/leafs/footer-3-1.png" alt="footer leafs">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="widget footer-widget">
                        <div class="vs-widget-about">
                            <div class="footer-logo">
                                <a href="index.html"><img class="logo" src="assets/img/logo-white.png" alt="Cannabo"></a>
                            </div>
                            <p class="footer-text style3">Aliquet eget sit amet tellus cras adipiscing
                                enim eu turpis. Hac habitasse platea dictu
                                mst quisque.</p>
                            <div class="footer-social style3">
                                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget footer-widget">
                        <h3 class="widget_title style3">Contact Information</h3>
                        <div class="footer-info style3">
                            <div class="footer-info__icon">
                                <i>
                                    <img src="assets/img/icons/footer-info-1-1.png" alt="footer info">
                                </i>
                            </div>
                            <div class="media-body">
                                <div class="footer-info__link">
                                    <p>New Town Western King Street, 5th Avenue, New York</p>
                                </div>
                            </div>
                        </div>
                        <div class="footer-info style3">
                            <div class="footer-info__icon">
                                <i>
                                    <img src="assets/img/icons/footer-info-1-2.png" alt="footer info">
                                </i>
                            </div>
                            <div class="media-body">
                                <span class="footer-info__label">Phone No:</span>
                                <div class="footer-info__link">
                                    <a href="tel:+1800-2355-2356">1800-2355-2356</a>
                                </div>
                            </div>
                        </div>
                        <div class="footer-info style3">
                            <div class="footer-info__icon">
                                <i>
                                    <img src="assets/img/icons/footer-info-1-3.png" alt="footer info">
                                </i>
                            </div>
                            <div class="media-body">
                                <span class="footer-info__label">Email Address:</span>
                                <div class="footer-info__link">
                                    <a href="mailto:username@domain.com">username@domain.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget footer-widget">
                        <h3 class="widget_title style3">Useful Links</h3>
                        <div class="footer-menu--style style3">
                            <ul>
                                <li><a href="about.html">Our Process</a></li>
                                <li><a href="index.html">Payments</a></li>
                                <li><a href="contact.html">Special Offers</a></li>
                                <li><a href="faq.html">Shipping</a></li>
                                <li><a href="blog.html">Regulations</a></li>
                                <li><a href="index-2.html">Product Returns</a></li>
                                <li><a href="contact.html">About Us</a></li>
                                <li><a href="project.html">FAQ</a></li>
                                <li><a href="services.html">Our Team</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Instagram Area -->

    </body>
@endsection
