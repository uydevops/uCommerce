@include('layouts.header')

<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Sepet</h2>
            <ul>
                <li><a href="index.html">Ana Sayfa</a></li>
                <li class="active">Sepet</li>
            </ul>
        </div>
    </div>
</div>

<div class="hiraola-cart-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="javascript:void(0)">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="hiraola-product-remove">Kaldır</th>
                                    <th class="hiraola-product-thumbnail">Resimler</th>
                                    <th class="cart-product-name">Ürün</th>
                                    <th class="hiraola-product-price">Birim Fiyat</th>
                                    <th class="hiraola-product-quantity">Adet</th>
                                    <th class="hiraola-product-subtotal">Toplam</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="hiraola-product-remove"><a href="javascript:void(0)"><i class="fa fa-trash" title="Kaldır"></i></a></td>
                                    <td class="hiraola-product-thumbnail"><a href="javascript:void(0)"><img src="{{ asset('assets/images/product/small-size/2-1.jpg') }}" alt="Hiraola'nın Sepet Küçük Resmi"></a></td>
                                    <td class="hiraola-product-name"><a href="javascript:void(0)">Juma rema pola</a></td>
                                    <td class="hiraola-product-price"><span class="amount">$46.80</span></td>
                                    <td class="quantity">
                                        <label>Adet</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="1" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">$46.80</span></td>
                                </tr>
                                <tr>
                                    <td class="hiraola-product-remove"><a href="javascript:void(0)"><i class="fa fa-trash" title="Kaldır"></i></a></td>
                                    <td class="hiraola-product-thumbnail"><a href="javascript:void(0)"><img src="{{ asset('assets/images/product/small-size/2-2.jpg') }}" alt="Hiraola'nın Sepet Küçük Resmi"></a></td>
                                    <td class="hiraola-product-name"><a href="javascript:void(0)">Bag Goodscol model</a></td>
                                    <td class="hiraola-product-price"><span class="amount">$71.80</span></td>
                                    <td class="quantity">
                                        <label>Adet</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="1" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">$71.80</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Sepet Toplamları</h2>
                                <ul>
                                    <li>Ara Toplam <span>$118.60</span></li>
                                    <li>Toplam <span>$118.60</span></li>
                                </ul>
                                <a href="javascript:void(0)">Ödeme Sayfasına Git</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
