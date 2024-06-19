@include('layouts.header')
<!-- Başlangıç: Hiraola'nın Ekmek Kırıntısı Alanı -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Tek Ürün Türü</h2>
            <ul>
                <li><a href="index.html">Ana Sayfa</a></li>
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
                            <img class="zoompro" src="{{asset('images/' . $product->image)}}" data-zoom-image="{{asset('images/' . $product->image)}}" alt="Hiraola Ürün Resmi" />
                        </div>
                        <div id="gallery" class="sp-img_slider">
                            @foreach($product_gallery as $productGallery)
                            <a data-image="{{asset('images/' . $productGallery->image)}}" data-zoom-image="{{asset('images/' . $productGallery->image)}}">
                                <img src="{{asset('images/' . $productGallery->image)}}" alt="Hiraola Ürün Resmi">
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
                                <li>Vergi Hariç: <a href="javascript:void(0)"><span>₺453.35</span></a></li>
                                <li>Markalar <a href="javascript:void(0)">Buxton</a></li>
                                <li>Ürün Kodu: <a href="javascript:void(0)">Ürün 16</a></li>
                                <li>Ödül Puanları: <a href="javascript:void(0)">600</a></li>
                                <li>Stok Durumu: <a href="javascript:void(0)">Stokta Var</a></li>
                            </ul>
                        </div>
                        <div class="product-size_box">
                            <span>Beden</span>
                            <select class="myniceselect nice-select">
                                @foreach($sizes as $product_size)
                                @if($product_size->s == 1)
                                <option value="s">S</option>
                                @endif
                                @if($product_size->m == 1)
                                <option value="m">M</option>
                                @endif
                                @if($product_size->l == 1)
                                <option value="l">L</option>
                                @endif
                                @if($product_size->xl == 1)
                                <option value="xl">XL</option>
                                @endif
                                @if($product_size->xxl == 1)
                                <option value="xxl">XXL</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="quantity">
                            <label>Adet</label>
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" value="1" type="text">
                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                            </div>
                        </div>
                        <div class="qty-btn_area">
                            <ul>
                                <li><a class="qty-cart_btn" href="cart.html">Sepete Ekle</a></li>
                                <li><a class="qty-wishlist_btn" href="wishlist.html" data-bs-toggle="tooltip" title="İstek Listesine Ekle"><i class="ion-android-favorite-outline"></i></a></li>
                                <li><a class="qty-compare_btn" href="compare.html" data-bs-toggle="tooltip" title="Bu Ürünü Karşılaştır"><i class="ion-ios-shuffle-strong"></i></a></li>
                            </ul>
                        </div>
                        <div class="hiraola-tag-line">
                            <h6>Etiketler:</h6>
                            <a href="javascript:void(0)">Yüzük</a>,
                            <a href="javascript:void(0)">Kolye</a>,
                            <a href="javascript:void(0)">Örgü</a>
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
                                <li class="youtube">
                                    <a href="https://www.youtube.com" data-bs-toggle="tooltip" target="_blank" title="Youtube">
                                        <i class="fab fa-youtube"></i>
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
            </div>
        </div>
    </div>
</div>
<!-- Bitiş: Hiraola'nın Tek Ürün Alanı -->

<!-- Başlangıç: Hiraola'nın Tek Ürün Sekme Alanı -->
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
                                <ul>
                                    <li>
                                        <strong>Karat Altın</strong>
                                        <span>24K altın, saf altın veya ince altın olarak adlandırılır. (%99.99 saf) İnce altının rengi, biraz turuncu ile parlak sarıdır. Takı uygulamaları için çok yumuşak olduğu söylenir, ancak yüksek karat altın bazı bölgelerde yaygın olarak kullanılır ve tasarımcı takılarında popülerliği artmaktadır. Çoğu, nişan yüzükleri için gerekli sertlik nedeniyle karat altınları tercih eder, çünkü bir mücevheri tutmak için gereken sertliğe sahiptir.</span>
                                    </li>
                                    <li>
                                        <strong>Altın Renkleri</strong>
                                        <span>En popüler renk, gümüş ve biraz bakır eklenerek yapılan sarıdır. Metaller, istenilen renk ve karatta bir alaşım oluşturmak için birlikte eritilir. Bütün bileşenlerin saf olması ve her birinin miktarlarının çok hassas bir şekilde tartılması, alaşımı zayıflatan gözenekliliği önlemek için çok önemlidir.</span>
                                    </li>
                                    <li>
                                        <strong>Beyaz Alaşımlar</strong>
                                        <span>İki tür Beyaz Altın vardır: Nikel bazlı ve Paladyum bazlı. Bazı insanlar Nikellere alerjiktir, bu yüzden Paladyum beyaz altın iyi bir alternatiftir. Paladyum beyaz altın, Avrupa'da tek yasal alaşımdır. Ayrıca kendi kendine parlatır ve cilasını korur.</span>
                                    </li>
                                    <li>
                                        <strong>En Pahalı Elmas Rengi</strong>
                                        <span>D renkli elmaslar, D-Z skalasındaki en nadir ve en pahalı elmaslardır. Belirli fantezi renkli elmaslar genel olarak en yüksek fiyatları talep eder ve bunlar ayrı bir öğreticide tartışılacaktır. Birçok insan, ihtiyaçlarını karşılamak için boyut, berraklık ve fiyat dengesini buldukları için G-J aralığındaki neredeyse renksiz elmaslardan hoşlanır.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="specification" class="tab-pane" role="tabpanel">
                            <table class="table table-bordered specification-inner_stuff">
                                <tbody>
                                    <tr>
                                        <td colspan="2"><strong>Hafıza</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Test 1</td>
                                        <td>8GB</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>İşlemci</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Çekirdek Sayısı</td>
                                        <td>1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
