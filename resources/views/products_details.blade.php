@include('layouts.header')
<!-- Başlangıç: Hiraola'nın Ekmek Kırıntısı Alanı -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Tek Ürün Türü</h2>
            <ul>
                <li><a href="{{ url('/') }}">Ana Sayfa</a></li>
                <li class="active">Tek Ürün</li>
            </ul>
        </div>
    </div>
</div>
<!-- Bitiş: Hiraola'nın Ekmek Kırıntısı Alanı -->

<!-- Başlangıç: Hiraola'nın Tek Ürün Alanı -->
<div class="sp-area">
    <div class="container">
        <div class="sp-nav">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="sp-img_area">
                        <div class="zoompro-border">
                            <img class="zoompro" src="{{ asset('images/' . $product->image) }}" data-zoom-image="{{ asset('images/' . $product->image) }}" alt="Hiraola Ürün Resmi" />
                        </div>
                        <div id="gallery" class="sp-img_slider">
                            @foreach($product_gallery as $productGallery)
                            <a data-image="{{ asset('images/' . $productGallery->image) }}" data-zoom-image="{{ asset('images/' . $productGallery->image) }}">
                                <img src="{{ asset('images/' . $productGallery->image) }}" alt="Hiraola Ürün Resmi">
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="sp-content">
                        <div class="sp-heading">
                            <h5><a href="#">{{ $product->name }}</a></h5>
                        </div>
                        <div class="rating-box">
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li class="silver-color"><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                        <div class="sp-essential_stuff">
                            <ul>
                                <li>Vergi Hariç: <a href="javascript:void(0)"><span>{{ $product->price }} TL</span></a></li>
                                <li>Kategori: <a href="javascript:void(0)">{{ $category->name }}</a></li>
                                <li>Stok Durumu: <a href="javascript:void(0)">
                                        {{ $product->quantity > 0 ? 'Stokta var' : 'Stokta yok' }}
                                    </a></li>
                            </ul>
                        </div>
                        <div class="product-size_box">
                            <span>Beden</span>
                            <select class="myniceselect nice-select" name="product_size">
                                @foreach($sizes as $size)
                                @foreach($size as $key => $value)
                                @if($key !== 'id' && $key !== 'product_id' && $value !== 0)
                                <option value="{{ $key }}">{{ strtoupper($key) }}</option>
                                @endif
                                @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="quantity">
                            <label>Adet</label>
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" value="1" type="number" min="1" name="quantity" />
                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                            </div>
                        </div>
                        <div class="qty-btn_area">
                            <ul>
                                <li><a id="basketBtn" class="add_basket-{{ $product->id }}" href="">Sepete Ekle</a></li>
                            </ul>
                        </div>
                        <div class="hiraola-social_link">
                            <ul>
                                <li class="facebook">
                                    <a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}&title={{ urlencode($product->name) }}&picture={{ asset('images/' . $product->image) }}" data-bs-toggle="tooltip" target="_blank" title="Facebook">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ urlencode($product->name) }}&via=TwitterHandle&hashtags=hashtag1,hashtag2&image={{ asset('images/' . $product->image) }}" data-bs-toggle="tooltip" target="_blank" title="Twitter">
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                </li>
                                <li class="youtube">
                                    <a href="https://www.youtube.com/share?u={{ url()->current() }}&title={{ urlencode($product->name) }}&image={{ asset('images/' . $product->image) }}" data-bs-toggle="tooltip" target="_blank" title="Youtube">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li class="instagram">
                                    <a href="https://www.instagram.com/?url={{ url()->current() }}&title={{ urlencode($product->name) }}&image={{ asset('images/' . $product->image) }}" data-bs-toggle="tooltip" target="_blank" title="Instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    #basketBtn {
        background-color: #000;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
    }
    
</style>

<div class="hiraola-product-tab_area-2 sp-product-tab_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="sp-product-tab_nav">
                    <div class="product-tab">
                        <ul class="nav product-menu">
                            <li><a class="active" data-bs-toggle="tab" href="#description"><span>Açıklama</span></a></li>
                            <li><a data-bs-toggle="tab" href="#specification"><span>Özellikler</span></a></li>
                        </ul>
                    </div>
                    <div class="tab-content hiraola-tab_content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                                <p>{{ $product->aciklama }}</p>
                            </div>
                        </div>
                        <div id="specification" class="tab-pane" role="tabpanel">
                            {!! $product->product_details !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
