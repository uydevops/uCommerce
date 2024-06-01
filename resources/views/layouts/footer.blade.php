<div class="hiraola-footer_area">
    <div class="footer-top_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-widgets_info">
                        <div class="footer-widgets_logo">
                            <a href="#">
                                <img src="{{asset('front/assets/images/footer/logo/1.png')}}" alt="Hiraola'nın Footer Logosu">
                            </a>
                        </div>
                        <div class="widget-short_desc">
                            <p>
                                Kaliteli HTML Şablonu & Woocommerce, Shopify Teması oluşturan tasarımcı ve
                                geliştiricilerden oluşan bir ekibiz.
                            </p>
                        </div>
                        <div class="hiraola-social_link">
                            <ul>
                                <li class="facebook">
                                    <a href="https://www.facebook.com" data-bs-toggle="tooltip" target="_blank" title="Facebook">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="https://twitter.com" data-bs-toggle="tooltip" target="_blank" title="Twitter">
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                </li>
                                <li class="google-plus">
                                    <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip" target="_blank" title="Google Plus">
                                        <i class="fab fa-google-plus"></i>
                                    </a>
                                </li>
                                <li class="instagram">
                                    <a href="https://rss.com" data-bs-toggle="tooltip" target="_blank" title="Instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="footer-widgets_area">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="footer-widgets_title">
                                    <h6>Ürün</h6>
                                </div>
                                <div class="footer-widgets">
                                    <ul>
                                        <li><a href="#">Fiyatlar Düşüyor</a></li>
                                        <li><a href="#">Yeni Ürünler</a></li>
                                        <li><a href="#">En İyi Satışlar</a></li>
                                        <li><a href="#">Bize Ulaşın</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="footer-widgets_info">
                                    <div class="footer-widgets_title">
                                        <h6>Hakkımızda</h6>
                                    </div>
                                    <div class="widgets-essential_stuff">
                                        <ul>
                                            <li class="hiraola-address"><i class="ion-ios-location"></i><span>Adres:</span> The Barn,
                                                Ullenhall, Henley in Arden B578 5CC, İngiltere</li>
                                            <li class="hiraola-phone"><i class="ion-ios-telephone"></i><span>Bizi
                                                    Ara:</span> <a href="tel://+123123321345">+123 321 345</a></li>
                                            <li class="hiraola-email"><i class="ion-android-mail"></i><span>E-posta:</span> <a href="mailto://info@yourdomain.com">info@yourdomain.com</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="instagram-container footer-widgets_area">
                                    <div class="footer-widgets_title">
                                        <h6>Haber Bültenine Kaydol</h6>
                                    </div>
                                    <div class="widget-short_desc">
                                        <p>Haber bültenlerimize şimdi abone olun ve yeni koleksiyonlarla güncel kalın
                                        </p>
                                    </div>
                                    <div class="newsletter-form_wrap">
                                        <form class="subscribe-form" id="mc-form" action="#">
                                            <input class="newsletter-input" id="mc-email" type="email" autocomplete="off" name="E-posta Adresinizi Girin" value="E-posta Adresinizi Girin" onblur="if(this.value==''){this.value='E-posta Adresinizi Girin'}" onfocus="if(this.value=='E-posta Adresinizi Girin'){this.value=''}">
                                            <button class="newsletter-btn" id="mc-submit">
                                                <i class="ion-android-mail"></i>
                                            </button>
                                        </form>
                                        <!-- Mailchimp Uyarıları -->
                                        <div class="mailchimp-alerts mt-3">
                                            <div class="mailchimp-submitting"></div>
                                            <div class="mailchimp-success"></div>
                                            <div class="mailchimp-error"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom_area">
        <div class="container">
            <div class="footer-bottom_nav">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-links">
                            <ul>
                                <li><a href="#">Online Alışveriş</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="copyright">
                            <span>UDevops &copy; 2021. Tüm Hakları Saklıdır</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div> 



@include('layouts.basket')

<script src="{{ asset('front/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('front/assets/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
<!-- Modernizer JS -->
<script src="{{ asset('front/assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('front/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>

<!-- Plugins JS -->
<script src="{{ asset('front/assets/js/plugins/slick.min.js') }}"></script>
<script src="{{ asset('front/assets/js/plugins/countdown.min.js') }}"></script>
<script src="{{ asset('front/assets/js/plugins/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('front/assets/js/plugins/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('front/assets/js/plugins/waypoints.min.js') }}"></script>
<script src="{{ asset('front/assets/js/plugins/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('front/assets/js/plugins/jquery.sticky-sidebar.js') }}"></script>
<script src="{{ asset('front/assets/js/plugins/jquery-ui.min.js') }}"></script>
<script src="{{ asset('front/assets/js/plugins/scroll-top.min.js') }}"></script>
<script src="{{ asset('front/assets/js/plugins/theia-sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('front/assets/js/plugins/jquery.elevateZoom-3.0.8.min.js') }}"></script>
<script src="{{ asset('front/assets/js/plugins/timecircles.min.js') }}"></script>
<script src="{{ asset('front/assets/js/plugins/mailchimp-ajax.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('front/assets/js/main.js') }}"></script>

<!-- <script src="assets/js/main.min.js"></script> -->

</body>
</html>
