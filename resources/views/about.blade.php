@include('layouts.header')

<!-- Hiraola'nın Ekmek Kırıntısı Alanı Başlangıcı -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Diğer</h2>
            <ul>
                <li><a href="index.html">Ana Sayfa</a></li>
                <li class="active">Hakkımızda</li>
            </ul>
        </div>
    </div>
</div>
<!-- Hiraola'nın Ekmek Kırıntısı Alanı Burada Biter -->
<!-- Hiraola'nın Hakkımızda Alanı Başlangıcı -->
<div class="about-us-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-7 d-flex align-items-center">
                <div class="overview-content">
                    <h2>{{$settings->site_name}} <span>Hoş Geldiniz!</span></h2>
                    <p class="short_desc">{{ $settings->about_text }}</p>
                    <div class="hiraola-about-us_btn-area">
                        <a class="{{route('index')}}" href="shop-left-sidebar.html">Şimdi Alışveriş Yap</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-5">
                <div class="overview-img text-center img-hover_effect">
                    <a href="#">
                        <img class="img-full" src="{{asset('assets' . '/' . $settings->about_image)}}" alt="Hakkımızda">
                    </a>
                </div>
            </div>
        </div>
    </div>


    <hr class="m-5">
    @include('layouts.footer')