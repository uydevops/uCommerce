@include('layouts.header')

<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Ödeme</h2>
            <ul>
                <li><a href="{{ url('/') }}">Ana Sayfa</a></li>
                <li class="active">Ödeme Yap</li>
            </ul>
        </div>
    </div>
</div>

<div class="checkout-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <form action="javascript:void(0)">
                    <div class="checkbox-form">
                        <h3>Fatura Detayları</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Adınız <span class="required">*</span></label>
                                    <input name="first_name" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Soyadınız <span class="required">*</span></label>
                                    <input name="last_name" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Şirket Adı</label>
                                    <input name="company_name" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Adres <span class="required">*</span></label>
                                    <input name="address" placeholder="Cadde adresi" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <input name="address_optional" placeholder="Daire, kat, birim vb. (isteğe bağlı)" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Şehir <span class="required">*</span></label>
                                    <input name="city" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>İlçe / Eyalet <span class="required">*</span></label>
                                    <input name="state" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Posta Kodu <span class="required">*</span></label>
                                    <input name="postal_code" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>E-posta Adresi <span class="required">*</span></label>
                                    <input name="email" placeholder="" type="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Telefon <span class="required">*</span></label>
                                    <input name="phone" type="text">
                                </div>
                            </div>
                        
                        </div>
                        <div class="order-notes">
                            <div class="checkout-form-list">
                                <label>Sipariş notları</label>
                                <textarea id="checkout-mess" name="order_notes" cols="30" rows="10" placeholder="Sipariş notları..."></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>Sipariş Detayları</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name">Ürün</th>
                                    <th class="cart-product-total">Toplam</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cart_item">
                                    <td class="cart-product-name">Ürün adı</td>
                                    <td class="cart-product-total"><span class="amount">₺30.00</span></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name">Ürün adı 2</td>
                                    <td class="cart-product-total"><span class="amount">₺20.00</span></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Ara Toplam</th>
                                    <td><span class="amount">₺50.00</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Toplam</th>
                                    <td><strong><span class="amount">₺50.00</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div class="order-button-payment">
                                <input value="Şimdi Öde" type="submit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@include('layouts.footer')
