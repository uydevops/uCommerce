@include('layouts.header')

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
                                <li><a href="{{ route('categories', $category->slug) }}">{{ $category->name }}</a></li>
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
        background-image: url('images/gizembanner.png');
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        height: 520px;
    }
</style>


<div class="hiraola-product-tab_area-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-tab">
                    <ul class="nav product-menu">
                        @foreach($categories as $category)
                            <li><a class="{{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab" href="#category-{{ $category->id }}"><span>{{ $category->name }}</span></a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-content hiraola-tab_content">
                    @foreach($categories as $category)
                        <div id="category-{{ $category->id }}" class="tab-pane {{ $loop->first ? 'active show' : '' }}" role="tabpanel">
                            <div class="hiraola-product-tab_slider-3">
                                @foreach($products->where('category_id', $category->id) as $product)
                                    <!-- Begin Hiraola's Slide Item Area -->
                                    <div class="slide-item">
                                        <div class="single_product">
                                            <div class="product-img">
                                                <a href="">
                                                    <img class="primary-img" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                                                    <img class="secondary-img" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                                                </a>
                                            </div>
                                            <div class="hiraola-product_content">
                                                <div class="product-desc_info">
                                                    <h6><a class="product-name" href="">{{ $product->name }}</a></h6>
                                                    <div class="price-box">
                                                        <span class="new-price">₺{{ $product->price }}</span>
                                                    </div>
                                                    <div class="additional-add_action">
                                                        <ul>
                                                            <!----add basket---->
                                                            <li><a class="add_basket-{{ $product->id }}" href="" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="rating-box">
                                                        <ul>
                                                            @for ($i = 0; $i < 5; $i++)
                                                                <li><i class="fa fa-star{{ $i < $product->rating ? '' : '-of-david silver-color' }}"></i></li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Hiraola's Slide Item Area -->
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hiraola's Product Area End Here -->

<div class="static-banner_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="static-banner-image">
                    <div class="static-banner-content">
                        <p><span>-25% Off</span>This Week</p>
                        <h2>Featured Product</h2>
                        <h3>Meito Accessories 2022</h3>
                        <p class="schedule">
                            Starting at
                            <span> ₺1209.00</span>
                        </p>
                        <div class="hiraola-btn-ps_left">
                            <a href="shop-left-sidebar.html" class="hiraola-btn">Shopping Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="hiraola-banner_area-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner-item img-hover_effect">
                    <a href="shop-left-sidebar.html">
                        <img class="img-full" src="{{ asset('front/assets/images/banner/1_5.jpg') }}"
                            alt="Hiraola's Banner">
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-item img-hover_effect">
                    <a href="shop-left-sidebar.html">
                        <img class="img-full" src="{{ asset('front/assets/images/banner/1_6.jpg') }}"
                            alt="Hiraola's Banner">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Begin Hiraola's Product Tab Area Two -->
<div class="hiraola-product-tab_area-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-tab">
                    <ul class="nav product-menu">
                        @foreach($categories as $category)
                            <li><a class="{{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab" href="#category-{{ $category->id }}"><span>{{ $category->name }}</span></a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-content hiraola-tab_content">
                    @foreach($categories as $category)
                        <div id="category-{{ $category->id }}" class="tab-pane {{ $loop->first ? 'active show' : '' }}" role="tabpanel">
                            <div class="hiraola-product-tab_slider-3">
                                @foreach($products->where('category_id', $category->id) as $product)
                                    <!-- Begin Hiraola's Slide Item Area -->
                                    <div class="slide-item">
                                        <div class="single_product">
                                            <div class="product-img">
                                                <a href="">
                                                    <img class="primary-img" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                                                    <img class="secondary-img" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                                                </a>
                                                <div class="add-actions">
                                                    <ul>
                                                        <li><a class="hiraola-add_cart" href="" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="hiraola-product_content">
                                                <div class="product-desc_info">
                                                    <h6><a class="product-name" href="">{{ $product->name }}</a></h6>
                                                    <div class="price-box">
                                                        <span class="new-price">₺{{ $product->price }}</span>
                                                    </div>
                                                    <div class="additional-add_action">
                                                        <ul>
                                                            <li><a class="hiraola-add_compare" href="" data-bs-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="rating-box">
                                                        <ul>
                                                            @for ($i = 0; $i < 5; $i++)
                                                                <li><i class="fa fa-star{{ $i < $product->rating ? '' : '-of-david silver-color' }}"></i></li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Hiraola's Slide Item Area -->
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hiraola's Product Tab Area TwoEnd Here -->

<div class="hiraola-banner_area-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="banner-item img-hover_effect">
                    <a href="shop-left-sidebar.html">
                        <img class="img-full" src="{{ asset('front/assets/images/banner/1_5.jpg') }}"
                            alt="Hiraola's Banner">
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="banner-item img-hover_effect">
                    <a href="shop-left-sidebar.html">
                        <img class="img-full" src="{{ asset('front/assets/images/banner/1_6.jpg') }}"
                            alt="Hiraola's Banner">
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="banner-item img-hover_effect">
                    <a href="shop-left-sidebar.html">
                        <img class="img-full" src="{{ asset('front/assets/images/banner/1_5.jpg') }}"
                            alt="Hiraola's Banner">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        @foreach($products as $product)
            $('.add_basket-{{ $product->id }}').click(function (e) {
                e.preventDefault();
                addToCart('{{ $product->id }}', '{{ $product->name }}', {{ $product->price }});
            });
        @endforeach
    });

    function addToCart(id, name, price) {
        // Sepete eklenen ürünleri listeye ekle
        var itemHtml = `
            <li class="minicart-product">
                <a class="product-item_remove" href="#" onclick="removeFromCart(this, ${price})"><i class="ion-android-close"></i></a>
                <div class="product-item_img">
                    <img src="https://via.placeholder.com/100x100" alt="Product Image">
                </div>
                <div class="product-item_content">
                    <a class="product-item_title" href="#">${name}</a>
                    <span class="product-item_quantity">1 × <span>$${price.toFixed(2)}</span></span>
                </div>
            </li>
        `;
        $('#minicart-list').append(itemHtml);

        // Alt toplamı güncelle
        updateSubtotal(price);
    }

    function updateSubtotal(price) {
        var currentTotal = parseFloat($('#subtotal').text().replace('$', ''));
        var newTotal = currentTotal + price;
        $('#subtotal').text('$' + newTotal.toFixed(2));
    }

    function removeFromCart(element, price) {
        // Ürünü listeden kaldır
        $(element).closest('.minicart-product').remove();

        // Alt toplamı güncelle
        updateSubtotal(-price);
    }
</script>


@include('layouts.footer')
