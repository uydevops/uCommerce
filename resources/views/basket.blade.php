@include('layouts.header')

<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Sepet</h2>
            <ul>
                <li><a href="{{ url('/') }}">Ana Sayfa</a></li>
                <li class="active">Sepet</li>
            </ul>
        </div>
    </div>
</div>

<div class="hiraola-cart-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form id="cart-form" action="javascript:void(0)">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="hiraola-product-remove">Kaldır</th>
                                    <th class="hiraola-product-thumbnail">Resimler</th>
                                    <th class="cart-product-name">Ürün</th>
                                    <th class="hiraola-product-price">Birim Fiyat</th>
                                    <th class="hiraola-product-quantity">Adet</th>
                                    <th class="hiraola-product-size">Beden</th>
                                    <th class="hiraola-product-subtotal">Toplam</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productInformation as $product)
                                    <tr data-product-id="{{ $product->id }}">
                                        <td class="hiraola-product-remove">
                                            <button type="button" class="remove-product btn btn-link text-danger" aria-label="Remove" title="Kaldır">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                        <td class="hiraola-product-thumbnail">
                                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100px; height: 100px;">
                                        </td>
                                        <td class="hiraola-product-name">
                                            {{ $product->name }}
                                        </td>
                                        <td class="hiraola-product-price">
                                            <span class="amount">{{ number_format($product->price, 2, ',', '.') }} TL</span>
                                        </td>
                                        <td class="quantity">
                                            <div class="cart-plus-minus">
                                                <button type="button" class="dec qtybutton btn btn-link"><i class="fa fa-angle-down"></i></button>
                                                <input class="cart-plus-minus-box form-control" value="1" type="text">
                                                <button type="button" class="inc qtybutton btn btn-link"><i class="fa fa-angle-up"></i></button>
                                            </div>
                                        </td>
                                        <td class="hiraola-product-size">
                                            <select class="form-control product-size">
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                            </select>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">{{ number_format($product->price, 2, ',', '.') }} TL</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Sepet Toplamları</h2>
                                <ul>
                                    <li>Ara Toplam <span class="cart-subtotal">0,00 TL</span></li>
                                    <li>Toplam <span class="cart-total">0,00 TL</span></li>
                                </ul>
                                <a href="javascript:void(0)" class="btn btn-primary btn-block">Ödeme Sayfasına Git</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cartForm = document.getElementById('cart-form');
        const cartSubtotal = document.querySelector('.cart-subtotal');
        const cartTotal = document.querySelector('.cart-total');

        cartForm.addEventListener('click', function(event) {
            const target = event.target;

            if (target.classList.contains('remove-product')) {
                const productId = target.closest('tr').getAttribute('data-product-id');
                target.closest('tr').remove();
                updateCartTotals();
            }

            if (target.classList.contains('qtybutton')) {
                const tr = target.closest('tr');
                const quantityInput = tr.querySelector('.cart-plus-minus-box');
                let quantity = parseInt(quantityInput.value);

                if (target.classList.contains('inc')) {
                    quantity++;
                } else if (target.classList.contains('dec')) {
                    quantity = quantity > 1 ? quantity - 1 : 1;
                }

                quantityInput.value = quantity;
                updateSubtotal(tr);
                updateCartTotals();
            }
        });

        function updateSubtotal(row) {
            const price = parseFloat(row.querySelector('.hiraola-product-price .amount').textContent.replace(' TL', '').replace(',', '.'));
            const quantity = parseInt(row.querySelector('.cart-plus-minus-box').value);
            const subtotal = row.querySelector('.product-subtotal .amount');
            subtotal.textContent = (price * quantity).toFixed(2).replace('.', ',') + ' TL';
        }

        function updateCartTotals() {
            const cartRows = document.querySelectorAll('tbody tr');
            let subtotal = 0;

            cartRows.forEach(row => {
                const price = parseFloat(row.querySelector('.hiraola-product-price .amount').textContent.replace(' TL', '').replace(',', '.'));
                const quantity = parseInt(row.querySelector('.cart-plus-minus-box').value);
                subtotal += price * quantity;
            });

            cartSubtotal.textContent = subtotal.toFixed(2).replace('.', ',') + ' TL';
            cartTotal.textContent = subtotal.toFixed(2).replace('.', ',') + ' TL';
        }
    });
</script>
