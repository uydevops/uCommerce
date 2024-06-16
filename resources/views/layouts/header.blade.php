<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home One || Hiraola - Jewellery eCommerce Bootstrap 5 Template</title>
    <meta name="robots" content="noindex, follow">
    <meta name="description" content="Hiraola - The best jewellery eCommerce template">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/assets/images/favicon.ico') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/fontawesome-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/timecircles.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.min.css') }}">
</head>

<body class="template-color-1">
    <div class="main-wrapper">
        <header class="header-main_area">
            <div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="ht-left_area">
                                <div class="header-shipping_area">
                                    <ul>
                                        <li>
                                            <span>Telefon:</span>
                                            <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="ht-right_area">
                                <div class="ht-menu">
                                    <ul>
                                        <li><a href="{{ $settings->facebook }}"><i class="ion-social-facebook"></i></a></li>
                                        <li><a href="{{ $settings->twitter }}"><i class="ion-social-twitter"></i></a></li>
                                        <li><a href="{{ $settings->google_plus }}"><i class="ion-social-googleplus"></i></a></li>
                                        <li><a href="{{ $settings->youtube }}"><i class="ion-social-youtube"></i></a></li>
                                        <li><a href="{{ $settings->instagram }}"><i class="ion-social-instagram"></i></a></li>
                                        <li>
                                            <a href="tel:{{ $settings->phone }}" class="ht-btn ht-btn_dark">
                                                <i class="ion-ios-telephone"></i> Hemen Ara
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle_area d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="header-logo">
                                <a href="{{route('index')}}">
                                    <img src="{{ asset('images/'.$settings->logo) }}" alt="{{ $settings->site_name }}" style="width: 200px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="hm-form_area">
                                <form action="#" class="hm-searchbox">
                                    <select class="nice-select select-search-category">
                                        <option value="0">All</option>
                                        <option value="10">Laptops</option>
                                        <!-- other options removed for brevity -->
                                    </select>
                                    <input type="text" placeholder="Enter your search key ...">
                                    <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom_area header-sticky stick">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 d-lg-none d-block">
                            <div class="header-logo">
                                <a href="index.html">
                                    <img src="{{ asset('images/'.$settings->logo) }}" alt="{{ $settings->site_name }}" style="width: 200px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 d-none d-lg-block position-static">
                            <div class="main-menu_area">
                                <nav>
                                    <ul>
                                        <li><a href="{{ route('index') }}">Anasayfa</a></li>
                                        <li><a href="{{ route('about') }}">Hakkımızda</a></li>
                                        <li><a href="{{ route('contact') }}">İletişim</a></li>
                                        <li><a href="{{ route('page.products') }}">Ürünler</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-8 col-sm-8">
                            <div class="header-right_area">
                                <ul>
                                    <li>
                                        <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white d-lg-none d-block">
                                            <i class="ion-navicon"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#miniCart" class="minicart-btn toolbar-btn">
                                            <i class="ion-bag"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu_wrapper" id="mobileMenu">
                <div class="offcanvas-menu-inner">
                    <div class="container">
                        <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                        <div class="offcanvas-inner_search">
                            <form action="#" class="hm-searchbox">
                                <input type="text" placeholder="Search for item...">
                                <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                        <nav class="offcanvas-navigation">
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children active"><a href="#"><span class="mm-text">Home</span></a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="index.html">
                                                <span class="mm-text">Home One</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- other menu items removed for brevity -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>