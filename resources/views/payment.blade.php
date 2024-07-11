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
                <!-- Extra content can go here -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <form action="{{ route('paytr.callback') }}" method="POST">
                    @csrf
                    <div class="checkbox-form">
                        <h3>Fatura Detayları</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Adınız <span class="required">*</span></label>
                                    <input name="first_name" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Soyadınız <span class="required">*</span></label>
                                    <input name="last_name" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Şirket Adı</label>
                                    <input name="company_name" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Adres <span class="required">*</span></label>
                                    <input name="address" placeholder="Cadde adresi" type="text" required>
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
                                    <input name="city" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>İlçe / Eyalet <span class="required">*</span></label>
                                    <input name="state" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Posta Kodu <span class="required">*</span></label>
                                    <input name="postal_code" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>E-posta Adresi <span class="required">*</span></label>
                                    <input name="email" type="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Telefon <span class="required">*</span></label>
                                    <input name="phone" type="text" required>
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

            </div>
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>Sipariş Detayları</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name">Ürün</th>
                                    <th class="cart-product-name">Beden</th>
                                    <th class="cart-product-total">Fiyat</th>
                                    <th class="cart-product-total">Toplam</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productsPayment as $productsPayments)
                                <tr class="cart_item">
                                    <td class="cart-product-name">{{ $productsPayments['product_name'] }}</td>
                                    <td class="cart-product-name">{{ $productsPayments['size'] }}</td>
                                    <td class="cart-product-total"><span class="amount">₺{{ number_format($productsPayments['product_price'], 2, ',', '.') }}</span></td>
                                    <td class="cart-product-total"><span class="amount">₺{{ number_format($productsPayments['product_price'], 2, ',', '.') }}</span></td>
                                </tr>

                                <input type="hidden" name="products" value="{{ $productsPayments['product_name'] }}">
                                <input type="hidden" name="amount" value="{{ $allAmount += $productsPayments['product_price'] }}">
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Ara Toplam</th>
                                    <td colspan="3"><span class="amount">₺0,00</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Toplam</th>
                                    <td colspan="3"><strong><span class="amount">₺0,00</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div class="order-button-payment">
                                <button type="submit">Şimdi Öde</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

@include('layouts.footer')

<!-- Optional JavaScript validation -->
<script>
    document.getElementById('billing-form').addEventListener('submit', function(event) {
        event.preventDefault();
        // Add custom validation or AJAX request here
        alert('Form submitted!');
    });

    // Ara toplam ve toplam hesaplama
    document.addEventListener('DOMContentLoaded', function() {
        var total = 0;
        var amounts = document.querySelectorAll('.cart-product-total .amount');
        amounts.forEach(function(amount) {
            var price = parseFloat(amount.innerText.replace('₺', '').replace('.', '').replace(',', '.'));
            total += price;
        });

        var formattedTotal = '₺' + total.toFixed(2).replace('.', ',');

        document.querySelector('.cart-subtotal .amount').innerText = formattedTotal;
        document.querySelector('.order-total .amount').innerText = formattedTotal;
    });
</script>

<style>
    .checkout-area {
        padding: 60px 0;
    }

    .checkout-form-list {
        margin-bottom: 30px;
    }

    .checkout-form-list label {
        font-weight: 700;
        margin-bottom: 10px;
        display: block;
    }

    .checkout-form-list input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ebebeb;
        border-radius: 5px;
    }

    .checkout-form-list textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ebebeb;
        border-radius: 5px;
    }

    .order-notes {
        margin-top: 30px;
    }

    .your-order {
        padding: 30px;
        background-color: #f9f9f9;
        border: 1px solid #ebebeb;
    }

    .your-order h3 {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .your-order-table table {
        width: 100%;
    }

    .your-order-table th {
        font-weight: 700;
        text-align: left;
    }

    .your-order-table td {
        padding: 10px 0;
    }

    .your-order-table .cart-product-name {
        width: 40%;
    }

    .your-order-table .cart-product-total {
        width: 20%;
    }

    .payment-method {
        margin-top: 30px;
    }

    .payment-accordion {
        border: 1px solid #ebebeb;
        border-radius: 5px;
        padding: 20px;
    }

    .order-button-payment button {
        background-color: #000;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .order-button-payment button:hover {
        background-color: #333;
    }
</style>