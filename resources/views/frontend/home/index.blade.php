@extends('layouts.frontend.master')
@section('content')
    <section class="hero-style1">
        <div class="hero-bg"
            style="background-image: url('{{ asset('frontend/assets/img/bg/bg3
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            .jpg') }}');">
        </div>

        <div class="hero-leaf2 wow fadeInUp" data-wow-delay="1s">
            <img src="{{ asset('frontend/assets/img/hero/topp.png') }}" alt="hero leaf 2">
        </div>

        <div class="hero-leaf3 wow fadeInUp" data-wow-delay="1.2s">
            <img src="{{ asset('frontend/assets/img/hero/med.png') }}" alt="hero leaf 3">
        </div>

        <div class="container">
            <div class="vs-carousel" data-dots="true" data-fade="true">

                {{-- Slide 1 --}}
                <div>
                    <div class="row gy-4 justify-content-between align-items-center">
                        <div class="col-xxl-6 col-xl-6 col-lg-8 mx-auto">
                            <div class="hero-content">
                                <h1 class="hero-title wow fadeInUp" data-wow-delay="0.2s">High-Quality Guernsey</h1>
                                <p class="hero-text wow fadeInUp" data-wow-delay="0.4s">
                                    Working with a global network of wellbeing enthusiasts and health experts
                                </p>
                                <span class="hero-subtitle wow fadeInUp" data-wow-delay="0.6s">
                                    <img src="{{ asset('frontend/assets/img/icons/i-1-1.png') }}" alt="icon">
                                    1000MG, Whole Extract.
                                </span>
                                <div class="d-flex wow fadeInUp" data-wow-delay="0.8s">
                                    <a class="vs-btn style1" href="#">
                                        Explore More <i class="fas fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-auto col-xl-6 col-lg-8 mx-auto">
                            <div class="hero-img wow fadeInUp" data-wow-delay="0.4s">
                                <img src="{{ asset('frontend/assets/img/hero/h-1-1.png') }}" alt="hero image 1">
                                <span class="circle"></span>
                                <div class="hero-certificate">
                                    <img src="{{ asset('frontend/assets/img/logos/roundd.png') }}" alt="logo">
                                </div>
                                <div class="hero-leaf">
                                    <img src="{{ asset('frontend/assets/img/hero/h-1-2.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Slide 2 --}}
                <div>
                    <div class="row gy-4 justify-content-between align-items-center">
                        <div class="col-xxl-6 col-xl-6 col-lg-8 mx-auto">
                            <div class="hero-content">
                                <h1 class="hero-title wow fadeInUp" data-wow-delay="0.2s">Pure Extracted from Swiss Alps
                                </h1>
                                <p class="hero-text wow fadeInUp" data-wow-delay="0.4s">
                                    Working with a global network of wellbeing enthusiasts and health experts
                                </p>
                                <span class="hero-subtitle wow fadeInUp" data-wow-delay="0.6s">
                                    <img src="{{ asset('frontend/assets/img/icons/i-1-1.png') }}" alt="icon">
                                    1000MG, Whole Plant Extract.
                                </span>
                                <div class="d-flex wow fadeInUp" data-wow-delay="0.8s">
                                    <a class="vs-btn style1" href="{{ url('products-grid') }}">
                                        Start Exploring <i class="fas fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-auto col-xl-6 col-lg-8 mx-auto">
                            <div class="hero-img">
                                <img src="{{ asset('frontend/assets/img/hero/h-1-1.png') }}" alt="hero image 1">
                                <span class="circle"></span>
                                <div class="hero-certificate">
                                    <img src="{{ asset('frontend/assets/img/logos/l-1-1.png') }}" alt="logo">
                                </div>
                                <div class="hero-leaf">
                                    <img src="{{ asset('frontend/assets/img/hero/h-1-2.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Slide 3 --}}
                <div>
                    <div class="row gy-4 justify-content-between align-items-center">
                        <div class="col-xxl-6 col-xl-6 col-lg-8 mx-auto">
                            <div class="hero-content">
                                <h1 class="hero-title wow fadeInUp" data-wow-delay="0.2s">Superior Grown in Oregon's
                                </h1>
                                <p class="hero-text wow fadeInUp" data-wow-delay="0.4s">
                                    Working with a global network of wellbeing enthusiasts and health experts
                                </p>
                                <span class="hero-subtitle wow fadeInUp" data-wow-delay="0.6s">
                                    <img src="{{ asset('frontend/assets/img/icons/i-1-1.png') }}" alt="icon">
                                    1000MG, Whole Plant Extract.
                                </span>
                                <div class="d-flex wow fadeInUp" data-wow-delay="0.8s">
                                    <a class="vs-btn style1" href="#">
                                        Explore More <i class="fas fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-auto col-xl-6 col-lg-8 mx-auto">
                            <div class="hero-img">
                                <img src="{{ asset('frontend/assets/img/hero/h-1-1.png') }}" alt="hero image 1">
                                <span class="circle"></span>
                                <div class="hero-certificate">
                                    <img src="{{ asset('frontend/assets/img/logos/l-1-1.png') }}" alt="logo">
                                </div>
                                <div class="hero-leaf">
                                    <img src="{{ asset('frontend/assets/img/hero/h-1-2.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Hero Area End -->
    <!-- Category Are Start -->
    <section class="cate space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="title-area text-center">
                        <div class="sec-icon">
                            <img src="{{ asset('frontend/assets/img/icons/s-1-1.png') }}" alt="icon">
                        </div>
                        <span class="sec-subtitle">Browser Category</span>
                        <h2 class="sec-title">Pick Your Product Type</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-auto">
                    <div class="cate-style text-center">
                        <div class="cate-figure">
                            <img class="cate-img" src="{{ asset('frontend/assets/img/cate/try.png') }}"
                                alt="cate image">
                        </div>
                        <div class="cate-content">
                            <h3 class="cate-title">
                                <a class="cate-title__link" href="#">UROLOGY</a>
                            </h3>
                            <span class="cate-num">
                                <a class="cate-num__link" href="#">10 Products</a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="cate-style text-center">
                        <div class="cate-figure">
                            <img class="cate-img" src="{{ asset('frontend/assets/img/cate/hormones.png') }}"
                                alt="cate image">
                        </div>
                        <div class="cate-content">
                            <h3 class="cate-title">
                                <a class="cate-title__link" href="#">HORMONES</a>
                            </h3>
                            <span class="cate-num">
                                <a class="cate-num__link" href="#">15 Products</a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="cate-style text-center">
                        <div class="cate-figure">
                            <img class="cate-img" src="{{ asset('frontend/assets/img/cate/general.png') }}"
                                alt="cate image">
                        </div>
                        <div class="cate-content">
                            <h3 class="cate-title">
                                <a class="cate-title__link" href="#">GENERAL</a>
                            </h3>
                            <span class="cate-num">
                                <a class="cate-num__link" href="#">10 Products</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Area End -->
    <!-- About Area Start  -->
    <!-- About Area Start -->
    <section class="about-layout1 z-index-common space-extra-bottom">
        <img class="about-ele1" src="{{ asset('frontend/assets/img/about/about-ele1-1.png') }}" alt="about element">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-30">
                    <div class="img-box1">
                        <div class="img1">
                            <img class="img" src="{{ asset('frontend/assets/img/about/c-about-1-1.jpg') }}"
                                alt="about 1 1">
                        </div>
                        <div class="video-thumb1">
                            <img class="img" src="{{ asset('frontend/assets/img/about/about-1-2.jpg') }}"
                                alt="about 2 2">
                            <a class="play-btn style7 popup-video" href="https://www.youtube.com/watch?v=bJNLrJ7MUzM"
                                tabindex="0">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-30">
                    <div class="about-content1">
                        <div class="title-area">
                            <span class="sec-subtitle">Welcome to OHM Pharmaceuticals</span>
                            <h2 class="sec-title">We Provide High Quality And Certified Products</h2>
                        </div>
                        <div class="about-body">
                            <p class="about-text">
                                There are variations of passages of Lorem Ipsum available, bhe mred aln ine form,
                                by injected humour, or randomised words which don't look even slilievable. If you're going
                                to
                                use a passage of variations of
                            </p>
                            <div class="list-style1">
                                <ul>
                                    <li>
                                        <i><img src="{{ asset('frontend/assets/img/icons/shield.png') }}"
                                                alt="shield"></i>
                                        100% Tested
                                    </li>
                                    <li>
                                        <i><img src="{{ asset('frontend/assets/img/icons/marijuana.png') }}"
                                                alt="marijuana"></i>
                                        Plant Based Ingredients
                                    </li>
                                    <li>
                                        <i><img src="{{ asset('frontend/assets/img/icons/microscope.png') }}"
                                                alt="microscope"></i>
                                        Lab Tested
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->

    <!-- Review Area Start -->
    <section class="space-bottom">
        <div class="container">
            <div class="position-relative">
                <div class="review-wrap">
                    <div class="row g-md-3 align-items-center justify-content-center justify-content-lg-between">
                        <div class="col-lg-8">
                            <div class="review-content">
                                <div class="review-content__left">
                                    <div class="review-logo">
                                        <img src="{{ asset('frontend/assets/img/logos/l-1-2.png') }}" alt="logo">
                                    </div>
                                </div>
                                <div class="review-content__right">
                                    <h2 class="review-title h3">No.1 ABCD Specialist</h2>
                                    <p class="review-text">
                                        ABC oils, joint & muscle rubs, skin care & cosmetics, edibles, drinks,
                                        e-, & isolates, vapes & more
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-center text-lg-end">
                            <span class="review-subtitle">Rated 4.9 / 5</span>
                            <img class="review-star" src="{{ asset('frontend/assets/img/others/ot-1-1.png') }}"
                                alt="review star">
                            <p class="review-subtitle2">Based on 848 reviews</p>
                            <img class="review-trust" src="{{ asset('frontend/assets/img/logos/l-1-3.png') }}"
                                alt="review logo">
                        </div>
                    </div>
                </div>
                <img class="shape-1" src="{{ asset('frontend/assets/img/shapes/s-1-1.png') }}" alt="shape">
            </div>
        </div>
    </section>
    <!-- Review Area End -->

    <!-- Products Area -->
    <section class="space-top space-bottom" data-bg-src="{{ asset('frontend/assets/img/bg/bg-1-1.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="title-area text-center">
                        <div class="sec-icon">
                            <img src="{{ asset('frontend/assets/img/icons/s-1-2.png') }}" alt="icon">
                        </div>
                        <span class="sec-subtitle">Quality Products</span>
                        <h2 class="sec-title">Trending Product</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @for ($i = 1; $i <= 8; $i++)
                    <div class="col-lg-3 col-md-6">
                        <div class="vs-product product-style1">
                            <div class="product-img">
                                <a href="#">
                                    <img class="img w-100"
                                        src="{{ asset('frontend/assets/img/products/p-1-' . $i . '.png') }}"
                                        alt="Product Image {{ $i }}">
                                </a>

                                @if (in_array($i, [1, 3, 5, 7]))
                                    <a class="product-tag2" href="#">
                                        {{ $i === 1 ? '30% OFF' : 'Out of Stock' }}
                                    </a>
                                @endif
                            </div>

                            <div class="product-content">
                                <div class="star-rating" role="img" aria-label="Rated 5 out of 5">
                                    <span style="width:100%">Rated <strong class="rating">5</strong> out of 5</span>
                                </div>
                                <h3 class="product-title">
                                    <a href="shop-details.html">Full Spectrum CBD Oil 1000 mg (10%)</a>
                                </h3>
                                <span class="product-cate">CBD 100MG</span>
                                <span class="product-price">$39.00</span>

                                <div class="product-actions">
                                    <a class="vs-btn" href="cart.html">Add to Cart</a>
                                    <a class="cart-btn" href="cart.html">
                                        <i class="fas fa-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <div class="row justify-content-center">
                <div class="col-auto">
                    <div class="d-inline-flex pt-30">
                        <a class="vs-btn style2" href="products-grid.html">View All Products</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Area End -->
    <!-- Features Area -->
    <section class="space-top space-extra-bottom overflow-hidden">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="title-area">
                        <span class="sec-subtitle">What Makes Different?</span>
                        <h2 class="sec-title">What Makes OHM pharmaceuticals Different?</h2>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="call-card">
                        <div class="call-card__content">
                            <span class="call-card__title">Need Help?</span>
                            <a class="call-card__number" href="tel:01-4110761">01-4110761</a>
                        </div>
                        <div class="call-card__icon">
                            <img src="{{ asset('frontend/assets/img/icons/phone-1-1.png') }}" alt="phone icon">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="feature-item">
                                <div class="feature-header">
                                    <img class="feature-icon-bg"
                                        src="{{ asset('frontend/assets/img/features/feature-1-1.png') }}"
                                        alt="feature icon">
                                    <div class="feature-icon">
                                        <img src="{{ asset('frontend/assets/img/icons/feature-1-1.png') }}"
                                            alt="feature icon 1">
                                    </div>
                                </div>
                                <h3 class="feature-title">
                                    <a href="about.html">
                                        Direct From Our Farm
                                    </a>
                                </h3>
                                <p class="feature-text">
                                    Sed perspiciatis is tus error voluptatem
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <div class="feature-header">
                                    <img class="feature-icon-bg"
                                        src="{{ asset('frontend/assets/img/features/feature-1-1.png') }}"
                                        alt="feature icon">
                                    <div class="feature-icon">
                                        <img src="{{ asset('frontend/assets/img/icons/feature-1-2.png') }}"
                                            alt="feature icon 2">
                                    </div>
                                </div>
                                <h3 class="feature-title">
                                    <a href="about.html">
                                        Soil Association Certified
                                    </a>
                                </h3>
                                <p class="feature-text">
                                    Sed ut perspiciatis unde omnis is tus error sit voluptatem
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <div class="feature-header">
                                    <img class="feature-icon-bg"
                                        src="{{ asset('frontend/assets/img/features/feature-1-1.png') }}"
                                        alt="feature icon">
                                    <div class="feature-icon">
                                        <img src="{{ asset('frontend/assets/img/icons/feature-1-3.png') }}"
                                            alt="feature icon 3">
                                    </div>
                                </div>
                                <h3 class="feature-title">
                                    <a href="about.html">
                                        Broad Spectrum Extract
                                    </a>
                                </h3>
                                <p class="feature-text">
                                    Sed ut perspiciatis is tus error sit voluptatem
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <div class="feature-header">
                                    <img class="feature-icon-bg"
                                        src="{{ asset('frontend/assets/img/features/feature-1-1.png') }}"
                                        alt="feature icon">
                                    <div class="feature-icon">
                                        <img src="{{ asset('frontend/assets/img/icons/feature-1-4.png') }}"
                                            alt="feature icon 4">
                                    </div>
                                </div>
                                <h3 class="feature-title">
                                    <a href="about.html">
                                        3rd Party Testing
                                    </a>
                                </h3>
                                <p class="feature-text">
                                    Sed ut perspiciatis omnis is tus error sit voluptatem
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mx-auto">
                    <div class="img-box2">
                        <div class="img-circle"
                            data-bg-src="{{ asset('frontend/assets/img/features/feature-1-2.png') }}"></div>
                        <img src="{{ asset('frontend/assets/img/features/feature-1-3.png') }}" alt="feature image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Area End -->
    <!-- Banner Area -->
    <div class="space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-style">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">
                                <div class="banner-content">
                                    <h3 class="banner-title">
                                        <a href="#">Skincare & Topicals</a>
                                    </h3>
                                    <p class="banner-text">Sed ut perspiciatis unde
                                        is tus error sit voluptatem</p>
                                    <a class="banner-link" href="#">
                                        View More
                                        <img src="{{ asset('frontend/assets/img/icons/arrow-icon-1-1.png') }}"
                                            alt="arrow icon">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="banner-img">
                            <img src="{{ asset('frontend/assets/img/banner/banner-1-1.png') }}" alt="banner-img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-style style2">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">
                                <div class="banner-content">
                                    <h3 class="banner-title">
                                        <a href="about.html">Edibles & Drinks</a>
                                    </h3>
                                    <p class="banner-text">Sed ut perspiciatis unde omnis
                                        is tus sit voluptatem</p>
                                    <a class="banner-link" href="#">
                                        View More
                                        <img src="{{ asset('frontend/assets/img/icons/arrow-icon-1-1.png') }}"
                                            alt="arrow icon">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="banner-img">
                            <img src="{{ asset('frontend/assets/img/banner/banner-1-2.png') }}" alt="banner-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner Area End -->
    <!-- Brand Area -->
    <div class="brand-layout1" data-bg-src="{{ asset('frontend/assets/img/bg/b-1-2.png') }}">
        <div class="container">
            <div class="row">
                <div class="col mx-auto text-center">
                    <div class="mb-30">
                        <h2 class="sec-title h4">Featured Popular Brands</h2>
                    </div>
                </div>
            </div>
            <div class="row vs-carousel text-center" data-slide-show="6" data-md-slide-show="3">
                <div class="col-auto">
                    <div class="brand-style">
                        <a href="#">
                            <img src="{{ asset('frontend/assets/img/brand/brand-1-1.png') }}" alt="brand">
                        </a>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="brand-style">
                        <a href="#">
                            <img src="{{ asset('frontend/assets/img/brand/brand-1-2.png') }}" alt="brand">
                        </a>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="brand-style">
                        <a href="#">
                            <img src="{{ asset('frontend/assets/img/brand/brand-1-3.png') }}" alt="brand">
                        </a>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="brand-style">
                        <a href="#">
                            <img src="{{ asset('frontend/assets/img/brand/brand-1-4.png') }}" alt="brand">
                        </a>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="brand-style">
                        <a href="#">
                            <img src="{{ asset('frontend/assets/img/brand/brand-1-5.png') }}" alt="brand">
                        </a>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="brand-style">
                        <a href="#">
                            <img src="{{ asset('frontend/assets/img/brand/brand-1-6.png') }}" alt="brand">
                        </a>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="brand-style">
                        <a href="#">
                            <img src="{{ asset('frontend/assets/img/brand/brand-1-1.png') }}" alt="brand">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Brand Area End -->
    <!-- Top Selling Product -->
    <section class="product-layout2 z-index-common" data-bg-src="{{ asset('frontend/assets/img/bg/b-1-3.jpg') }}">
        <img class="ele1" src="{{ asset('frontend/assets/img/products/product-leaf-1-1.png') }}" alt="product">
        <img class="ele2" src="{{ asset('frontend/assets/img/products/product-leaf-1-2.png') }}" alt="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="title-area text-center">
                        <span class="sec-subtitle">Trending Products</span>
                        <h2 class="sec-title text-white">Top Selling Products</h2>
                    </div>
                </div>
            </div>
            <div class="product-carousel vs-carousel row" data-slide-show="1" data-dots="true" data-xl-dots="true"
                data-ml-dots="true" data-lg-dots="true" data-md-dots="true">
                <div class="col">
                    <div class="vs-product product-style2">
                        <div class="row gx-60 align-items-center">
                            <div class="col-lg-4 mb-30">
                                <p class="product-text">100% cannabis products</p>
                                <h3 class="product-title">CBD Gummies (300mg)</h3>
                                <div class="star-rating" role="img" aria-label="Rated 5 out of 5">
                                    <span style="width:100%">Rated <strong class="rating">5</strong> out of 5</span>
                                </div>
                                <span class="product-price"><del>$30.00</del>$66.00</span>
                                <span class="product-tax">Tax included.</span>
                                <span class="counter-title">Limited Time Offer:</span>
                                <div class="counter-style">
                                    <ul class="offer-counter" data-offer-date="12/12/2024">
                                        <li>
                                            <div class="day count-number">00</div><span class="count-name">Days</span>
                                        </li>
                                        <li>
                                            <div class="hour count-number">00</div><span class="count-name">Hours</span>
                                        </li>
                                        <li>
                                            <div class="minute count-number">00</div><span
                                                class="count-name">Minutes</span>
                                        </li>
                                        <li>
                                            <div class="seconds count-number">00</div><span
                                                class="count-name">Seconds</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-30">
                                <div class="product-image">
                                    <img src="{{ asset('frontend/assets/img/products/p-l-2-1-1.png') }}"
                                        alt="product layout 2">
                                </div>
                            </div>
                            <div class="col-lg-4 mb-30">
                                <div class="buying-options">
                                    <h4 class="buying-title">Buying Options</h4>
                                    <div class="form-check">
                                        <input class="form-check-input" id="flexRadioDefault1" type="radio"
                                            name="flexRadioDefault">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Single Purchase
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="flexRadioDefault2" type="radio"
                                            name="flexRadioDefault">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Every Week
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="flexRadioDefault3" type="radio"
                                            name="flexRadioDefault">
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            Every Two Weeks
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="flexRadioDefault4" type="radio"
                                            name="flexRadioDefault">
                                        <label class="form-check-label" for="flexRadioDefault4">
                                            Every Four Weeks
                                        </label>
                                    </div>
                                    <a class="vs-btn style3" href="products-grid.html" tabindex="0">
                                        Add to Cart<i class="fas fa-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="vs-product product-style2">
                        <div class="row gx-60 align-items-center">
                            <div class="col-lg-4 mb-30">
                                <p class="product-text">100% cannabis products</p>
                                <h3 class="product-title">Full Spectrum CBD Oil 1000 mg (10%)</h3>
                                <div class="star-rating" role="img" aria-label="Rated 5 out of 5">
                                    <span style="width:100%">Rated <strong class="rating">5</strong> out of 5</span>
                                </div>
                                <span class="product-price"><del>$99.00</del>$100.00</span>
                                <span class="product-tax">Tax included.</span>
                                <span class="counter-title">Limited Time Offer:</span>
                                <div class="counter-style">
                                    <ul class="offer-counter" data-offer-date="10/12/2025">
                                        <li>
                                            <div class="day count-number">00</div><span class="count-name">Days</span>
                                        </li>
                                        <li>
                                            <div class="hour count-number">00</div><span class="count-name">Hours</span>
                                        </li>
                                        <li>
                                            <div class="minute count-number">00</div><span
                                                class="count-name">Minutes</span>
                                        </li>
                                        <li>
                                            <div class="seconds count-number">00</div><span
                                                class="count-name">Seconds</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-30">
                                <div class="product-image">
                                    <img src="{{ asset('frontend/assets/img/products/p-l-2-1-1.png') }}"
                                        alt="product layout 2">
                                </div>
                            </div>
                            <div class="col-lg-4 mb-30">
                                <div class="buying-options">
                                    <h4 class="buying-title">Buying Options</h4>
                                    <div class="form-check">
                                        <input class="form-check-input" id="flexRadioDefault_fe807714" type="radio"
                                            name="flexRadioDefault">
                                        <label class="form-check-label" for="flexRadioDefault_fe807714">
                                            Single Purchase
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="flexRadioDefault_449dfee6" type="radio"
                                            name="flexRadioDefault">
                                        <label class="form-check-label" for="flexRadioDefault_449dfee6">
                                            Every Week
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="flexRadioDefault_3eafcc5d" type="radio"
                                            name="flexRadioDefault">
                                        <label class="form-check-label" for="flexRadioDefault_3eafcc5d">
                                            Every Two Weeks
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="flexRadioDefault_5f3aa960" type="radio"
                                            name="flexRadioDefault">
                                        <label class="form-check-label" for="flexRadioDefault_5f3aa960">
                                            Every Four Weeks
                                        </label>
                                    </div>
                                    <a class="vs-btn style3" href="products-grid.html" tabindex="0">
                                        Add to Cart<i class="fas fa-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-features">
                <div class="row justify-content-between">
                    <div class="col-lg-auto col-md-6 mb-30">
                        <div class="item-style">
                            <div class="item-icon">
                                <img src="{{ asset('frontend/assets/img/icons/product-feature-1-1.png') }}"
                                    alt="product feature 1 1">
                            </div>
                            <h3 class="item-title">
                                Free Next Day
                                Delivery Over $50
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-auto col-md-6 mb-30">
                        <div class="item-style">
                            <div class="item-icon">
                                <img src="{{ asset('frontend/assets/img/icons/product-feature-1-2.png') }}"
                                    alt="product feature 1 1">
                            </div>
                            <h3 class="item-title">
                                24/7 Customer Support
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-auto col-md-6 mb-30">
                        <div class="item-style">
                            <div class="item-icon">
                                <img src="{{ asset('frontend/assets/img/icons/product-feature-1-3.png') }}"
                                    alt="product feature 1 1">
                            </div>
                            <h3 class="item-title">
                                100% Secured Checkout
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-auto col-md-6 mb-30">
                        <div class="item-style">
                            <div class="item-icon">
                                <img src="{{ asset('frontend/assets/img/icons/product-feature-1-4.png') }}"
                                    alt="product feature 1 1">
                            </div>
                            <h3 class="item-title">
                                30 Days Free Returns
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Selling Product End -->
    <!-- Testimonials Area Start -->
    <section class="testimonials space-top space-bottom">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7">
                    <div class="title-area">
                        <span class="sec-subtitle">TESTIMONIALS</span>
                        <h2 class="sec-title">What Our Customer Say</h2>
                    </div>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <div class="sec-btns">
                        <button class="vs-btn style4" data-slick-prev="#testislide1"><i
                                class="far fa-arrow-left"></i></button>
                        <button class="vs-btn style4" data-slick-next="#testislide1"><i
                                class="far fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="row vs-carousel" id="testislide1" data-slide-show="2">
                <div class="col-auto">
                    <div class="testi-style1">
                        <div class="star-rating" role="img" aria-label="Rated 5 out of 5">
                            <span style="width:100%">Rated <strong class="rating">5</strong> out of 5</span>
                        </div>
                        <span class="testi-author">By <a href="#">Shrayash Dotel</a></span>
                        <h3 class="testi-title">Best Protein i have Ever</h3>
                        <div class="testi-content">
                            <div class="testi-image">
                                <img class="img1" src="{{ asset('frontend/assets/img/testimonials/testi-1-1.png') }}"
                                    alt="testimonials">
                                <i class="testi-icon">
                                    <img src="{{ asset('frontend/assets/img/icons/testimonials-quote-icon-1.png') }}"
                                        alt="testimonials icon">
                                </i>
                            </div>
                            <p class="testi-text">I've been taking now for 2 years.
                                Searched lots of sites and was absolutely
                                blown away by the reviews of Cannaray oil.
                                The information and range of high-quality
                                products were amazing.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="testi-style1">
                        <div class="star-rating" role="img" aria-label="Rated 5 out of 5">
                            <span style="width:100%">Rated <strong class="rating">5</strong> out of 5</span>
                        </div>
                        <span class="testi-author">By <a href="#">Shrayash Dotel</a></span>
                        <h3 class="testi-title">Best-Tasting Food Ever</h3>
                        <div class="testi-content">
                            <div class="testi-image">
                                <img class="img1" src="{{ asset('frontend/assets/img/testimonials/testi-1-2.png') }}"
                                    alt="testimonials">
                                <i class="testi-icon">
                                    <img src="{{ asset('frontend/assets/img/icons/testimonials-quote-icon-1.png') }}"
                                        alt="testimonials icon">
                                </i>
                            </div>
                            <p class="testi-text">I've been taking oil now for 2 years.
                                Searched lots of sites and was absolutely
                                blown away by the reviews of Cannaray oil.
                                The information and range of high-quality
                                products were amazing.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="testi-style1">
                        <div class="star-rating" role="img" aria-label="Rated 5 out of 5">
                            <span style="width:100%">Rated <strong class="rating">5</strong> out of 5</span>
                        </div>
                        <span class="testi-author">By <a href="#">Shrayash Dotel</a></span>
                        <h3 class="testi-title">Best Protein i have Ever</h3>
                        <div class="testi-content">
                            <div class="testi-image">
                                <img class="img1" src="{{ asset('frontend/assets/img/testimonials/testi-1-3.png') }}"
                                    alt="testimonials">
                                <i class="testi-icon">
                                    <img src="{{ asset('frontend/assets/img/icons/testimonials-quote-icon-1.png') }}"
                                        alt="testimonials icon">
                                </i>
                            </div>
                            <p class="testi-text">I've been taking oil now for 2 years.
                                Searched lots of sites and was absolutely
                                blown away by the reviews of Cannaray oil.
                                The information and range of high-quality
                                products were amazing.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Area End -->

    <!-- Blog Area Start -->
    <section class="blog space-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="title-area text-center">
                        <div class="sec-icon">
                            <img src="{{ asset('frontend/assets/img/icons/s-1-1.png') }}" alt="icon">
                        </div>
                        <span class="sec-subtitle">News & Updates</span>
                        <h2 class="sec-title">Recent Articles</h2>
                    </div>
                </div>
            </div>
            <div class="row vs-carousel" data-slide-show="3" data-lg-slide-show="3" data-md-slide-show="2"
                data-sm-slide-show="1">
                <div class="col-lg-4">
                    <div class="vs-blog blog-style1">
                        <div class="blog-img">
                            <img class="img w-100" src="{{ asset('frontend/assets/img/blog/blog-1-1.jpg') }}"
                                alt="Blog Image">
                        </div>
                        <span class="blog-date">24 <span>Feb, 2022</span></span>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html" tabindex="0">Posted <span>By ABC</span></a>
                                <a class="blog-meta-icon" href="blog.html" tabindex="0"><i
                                        class="fas fa-comments"></i> 14 Comments</a>
                            </div>
                            <h3 class="blog-title h5">
                                <a href="#" tabindex="0">
                                    Options For a Cannabis Education in All Countries
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="vs-blog blog-style1">
                        <div class="blog-img">
                            <img class="img w-100" src="{{ asset('frontend/assets/img/blog/blog-1-2.jpg') }}"
                                alt="Blog Image">
                        </div>
                        <span class="blog-date">24 <span>Feb, 2022</span></span>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html" tabindex="0">Posted <span>By ABC</span></a>
                                <a class="blog-meta-icon" href="blog.html" tabindex="0"><i
                                        class="fas fa-comments"></i> 14 Comments</a>
                            </div>
                            <h3 class="blog-title h5">
                                <a href="#" tabindex="0">
                                    How Does A Lotion Containing CBD Help Your Skin?
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="vs-blog blog-style1">
                        <div class="blog-img">
                            <img class="img w-100" src="{{ asset('frontend/assets/img/blog/blog-1-3.jpg') }}"
                                alt="Blog Image">
                        </div>
                        <span class="blog-date">24 <span>Feb, 2022</span></span>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html" tabindex="0">Posted <span>By ABC</span></a>
                                <a class="blog-meta-icon" href="#" tabindex="0"><i class="fas fa-comments"></i>
                                    14 Comments</a>
                            </div>
                            <h3 class="blog-title h5">
                                <a href="blog-details.html" tabindex="0">
                                    Why CBD Product’s Ingredients List Must Be Examined?
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <div class="d-inline-flex pt-30">
                        <a class="vs-btn style2" href="#">View All Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End -->

    <!-- Instagram Area -->
    <div class="insta-layout1">
        <div class="container">
            <h2 class="sec-title2"><i class="fab fa-instagram"></i>Follow <a
                    href="https://www.instagram.com/">@Cannabo</a></h2>
            <div class="vs-carousel" data-slide-show="6" data-md-slide-show="4" data-sm-slide-show="3">
                <div class="instagram-feed">
                    <img src="{{ asset('frontend/assets/img/instagram/insta-1-1.jpg') }}" alt="instagram">
                    <a class="instagram-icon" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="instagram-feed">
                    <img src="{{ asset('frontend/assets/img/instagram/insta-1-2.jpg') }}" alt="instagram">
                    <a class="instagram-icon" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="instagram-feed">
                    <img src="{{ asset('frontend/assets/img/instagram/insta-1-3.jpg') }}" alt="instagram">
                    <a class="instagram-icon" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="instagram-feed">
                    <img src="{{ asset('frontend/assets/img/instagram/insta-1-4.jpg') }}" alt="instagram">
                    <a class="instagram-icon" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="instagram-feed">
                    <img src="{{ asset('frontend/assets/img/instagram/insta-1-5.jpg') }}" alt="instagram">
                    <a class="instagram-icon" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="instagram-feed">
                    <img src="{{ asset('frontend/assets/img/instagram/insta-1-6.jpg') }}" alt="instagram">
                    <a class="instagram-icon" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
