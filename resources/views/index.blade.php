@include('layouts.header')
        <!-- Hiraola's Header Main Area End Here -->
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
           .last-category{
                margin-bottom: 30px;
           }
        </style>

     
        <!-- Begin Hiraola's Product Area -->
    
        <!-- Begin Hiraola's Product Tab Area Three -->
        <div class="hiraola-product_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hiraola-section_title">
                            <h4>New Arrival</h4>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="hiraola-product_slider">
                            @foreach ($products as $product)
                            <!-- Begin Hiraola's Slide Item Area -->
                            <div class="slide-item">
                                <div class="single_product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                                            <img class="secondary-img" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                                        </a>
                                        <div class="add-actions">
                                            <ul>
                                                <li><a class="hiraola-add_cart" href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="hiraola-product_content">
                                        <div class="product-desc_info">
                                            <h6><a class="product-name" href="">{{ $product->name }}</a>
                                            </h6>
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
                                                    @for ($i = 0; $i < 5; $i++) <li><i class="fa fa-star{{ $i < $product->rating ? '' : '-of-david silver-color' }}"></i>
                                                        </li>
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
            </div>
        </div>
        <!-- Hiraola's Product Area End Here -->

       
        <!-- Begin Hiraola's Product Tab Area -->

        <!-- Begin Hiraola's Product Tab Area Three -->
        <div class="hiraola-product_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hiraola-section_title">
                            <h4>New Arrival</h4>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="hiraola-product_slider">
                            @foreach ($products as $product)
                            <!-- Begin Hiraola's Slide Item Area -->
                            <div class="slide-item">
                                <div class="single_product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                                            <img class="secondary-img" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                                        </a>
                                        <div class="add-actions">
                                            <ul>
                                                <li><a class="hiraola-add_cart" href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="hiraola-product_content">
                                        <div class="product-desc_info">
                                            <h6><a class="product-name" href="">{{ $product->name }}</a>
                                            </h6>
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
                                                    @for ($i = 0; $i < 5; $i++) <li><i class="fa fa-star{{ $i < $product->rating ? '' : '-of-david silver-color' }}"></i>
                                                        </li>
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
            </div>
        </div>
        <!-- Hiraola's Product Tab Area End Here -->

        

        <!-- Begin Hiraola's Product Tab Area Two -->
        <div class="hiraola-product_area" >
            <div class="container last-category">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hiraola-section_title">
                            <h4>New Arrival</h4>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="hiraola-product_slider">
                            @foreach ($products as $product)
                            <!-- Begin Hiraola's Slide Item Area -->
                            <div class="slide-item">
                                <div class="single_product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                                            <img class="secondary-img" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                                        </a>
                                        <div class="add-actions">
                                            <ul>
                                                <li><a class="hiraola-add_cart" href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="hiraola-product_content">
                                        <div class="product-desc_info">
                                            <h6><a class="product-name" href="">{{ $product->name }}</a>
                                            </h6>
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
                                                    @for ($i = 0; $i < 5; $i++) <li><i class="fa fa-star{{ $i < $product->rating ? '' : '-of-david silver-color' }}"></i>
                                                        </li>
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
            </div>
        </div>
        
        <div class="hiraola-shipping_area">
            <div class="container">
                <div class="shipping-nav">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <img src="assets/images/shipping-icon/1.png" alt="Hiraola's Shipping Icon">
                                </div>
                                <div class="shipping-content">
                                    <h6>Free Uk Standard Delivery</h6>
                                    <p>Designated day delivery</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <img src="assets/images/shipping-icon/2.png" alt="Hiraola's Shipping Icon">
                                </div>
                                <div class="shipping-content">
                                    <h6>Freshyly Prepared Ingredients</h6>
                                    <p>Made for your delivery date</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <img src="assets/images/shipping-icon/3.png" alt="Hiraola's Shipping Icon">
                                </div>
                                <div class="shipping-content">
                                    <h6>98% Of Anta Clients</h6>
                                    <p>Reach their personal goals set</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <img src="assets/images/shipping-icon/4.png" alt="Hiraola's Shipping Icon">
                                </div>
                                <div class="shipping-content">
                                    <h6>Winner Of 15 Awards</h6>
                                    <p>Healthy food and drink 2022</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     


        @include('layouts.footer')