@include('layouts.header')

<!-- Hiraola'nın Başlık Ana Alanı Bitiş -->
<div class="slider-with-category_menu">
    <div class="container-fluid">
        <div class="row">
            <div class="col grid-half order-md-2 order-lg-1">
                <div class="category-menu">
                    <div class="category-heading">
                        <h2 class="categories-toggle"><span>Kategoriler</span></h2>
                    </div>
                    <div id="cate-toggle" class="category-menu-list">
                        @foreach ($categories as $category)
                        <ul>
                            <li><a href="{{ route('page.products', $category->slug) }}">{{ $category->name }}</a></li>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col grid-full order-md-1 order-lg-2">
                <div class="hiraola-slider_area">
                    <div class="main-slider">
                        <div class="single-slide animfation-style-01 bg-1">
                            <div class="container">
                                <div class="slider-progress"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .bg-1 {
        background-image: url('{{ asset('images/gizembanner.png') }}');
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        height: 520px;
    }

    .last-category {
        margin-bottom: 30px;
    }
</style>
<!-- Hiraola'nın Ürün Alanı Başlangıcı -->
<div class="hiraola-banner_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="banner-item img-hover_effect">
                    <a href="shop-left-sidebar.html">
                        <img class="img-full" src="{{ asset('front/assets/images/banner/1_3.jpg') }}" alt="Hiraola'nın Banner'ı">
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="banner-item img-hover_effect">
                    <a href="shop-left-sidebar.html">
                        <img class="img-full" src="{{ asset('front/assets/images/banner/1_3.jpg') }}" alt="Hiraola'nın Banner'ı">
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="banner-item img-hover_effect">
                    <a href="shop-left-sidebar.html">
                        <img class="img-full" src="{{ asset('front/assets/images/banner/1_3.jpg') }}" alt="Hiraola'nın Banner'ı">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hiraola-product_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hiraola-section_title">
                    <h4>Test Kategori 1</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="hiraola-product_slider">
                    @foreach ($products as $product)
                    <!-- Hiraola'nın Slide Ürün Alanı Başlangıcı -->
                    <div class="slide-item">
                        <div class="single_product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img class="primary-img" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                                    <img class="secondary-img" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                                </a>
                                <div class="add-actions">
                                  
                                </div>
                            </div>
                            <div class="hiraola-product_content">
                                <div class="product-desc_info">
                                    <h6><a class="product-name" href="{{ route('page.product.detail', $product->slug) }}">{{ $product->name }}</a></h6>
                                    <div class="price-box">
                                        <span class="new-price">₺{{ $product->price }}</span>
                                    </div>
                                    <div class="additional-add_action">
                                        <ul>
                                            <li><a class="add_basket-{{ $product->id }}" href="" data-bs-toggle="tooltip" data-placement="top" title="Sepete Ekle"><i class="ion-bag"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            @for ($i = 0; $i < 5; $i++) <li><i class="fa fa-star{{ $i < $product->rating ? '' : '-of-david silver-color' }}"></i></li>
                                                @endfor
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Hiraola'nın Slide Ürün Alanı Bitişi -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hiraola-product_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hiraola-section_title">
                    <h4>Alt Giyim</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="hiraola-product_slider">
                    @foreach ($products as $product)
                    <!-- Hiraola'nın Slide Ürün Alanı Başlangıcı -->
                    <div class="slide-item">
                        <div class="single_product">
                            <div class="product-img">
                                <a href="#">
                                    <img class="primary-img" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                                    <img class="secondary-img" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                                </a>
                                <div class="add-actions">
                                  
                                </div>
                            </div>
                            <div class="hiraola-product_content">
                                <div class="product-desc_info">
                                    <h6><a class="product-name" href="{{ route('page.product.detail', $product->slug) }}">{{ $product->name }}</a></h6>
                                    <div class="price-box">
                                        <span class="new-price">₺{{ $product->price }}</span>
                                    </div>
                                    <div class="additional-add_action">
                                        <ul>
                                            <li><a class="add_basket-{{ $product->id }}" href="" data-bs-toggle="tooltip" data-placement="top" title="Sepete Ekle"><i class="ion-bag"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            @for ($i = 0; $i < 5; $i++) <li><i class="fa fa-star{{ $i < $product->rating ? '' : '-of-david silver-color' }}"></i></li>
                                                @endfor
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Hiraola'nın Slide Ürün Alanı Bitişi -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hiraola-product_area">
    <div class="container last-category">
        <div class="row">
            <div class="col-lg-12">
                <div class="hiraola-section_title">
                    <h4>Üst Giyim</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="hiraola-product_slider">
                    @foreach ($products as $product)
                    <!-- Hiraola'nın Slide Ürün Alanı Başlangıcı -->
                    <div class="slide-item">
                        <div class="single_product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img class="primary-img" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                                    <img class="secondary-img" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                                </a>
                                <div class="add-actions">
                                  
                                </div>
                            </div>
                            <div class="hiraola-product_content">
                                <div class="product-desc_info">
                                    <h6><a class="product-name" href="{{ route('page.product.detail', $product->slug) }}">{{ $product->name }}</a></h6>
                                    <div class="price-box">
                                        <span class="new-price">₺{{ $product->price }}</span>
                                    </div>
                                    <div class="additional-add_action">
                                        <ul>
                                            <li><a class="add_basket-{{ $product->id }}" href="" data-bs-toggle="tooltip" data-placement="top" title="Sepete Ekle"><i class="ion-bag"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            @for ($i = 0; $i < 5; $i++) <li><i class="fa fa-star{{ $i < $product->rating ? '' : '-of-david silver-color' }}"></i></li>
                                                @endfor
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Hiraola'nın Slide Ürün Alanı Bitişi -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')

