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
                                @foreach ($productInformation as $product)
                                    <tr>
                                        <td class="hiraola-product-remove">
                                            <a href="javascript:void(0)" class="remove-product" data-product-id="{{ $product->id }}">
                                                <i class="fa fa-trash" title="Kaldır"></i>
                                            </a>
                                        </td>
                                        <td class="hiraola-product-thumbnail">
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"  style="width: 100px; height: 100px;">
                                            </a>
                                        </td>
                                        <td class="hiraola-product-name">
                                            <a href="javascript:void(0)">{{ $product->name }}</a>
                                        </td>
                                        <td class="hiraola-product-price">
                                            <span class="amount">{{ number_format($product->price, 2, ',', '.') }} TL</span>
                                        </td>
                                        <td class="quantity">
                                            <label>Adet</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
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
                                    <li>Ara Toplam <span>0,00 TL</span></li>
                                    <li>Toplam <span>0,00 TL</span></li>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Event listener for removing products
        const removeButtons = document.querySelectorAll('.remove-product');
        removeButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const productId = button.getAttribute('data-product-id');
                const row = button.closest('tr');
                row.remove();
                updateCartTotal();
                // You can add additional logic here to update server-side or local storage
            });
        });

        // Event listener for increasing quantity
        const incButtons = document.querySelectorAll('.inc');
        incButtons.forEach(button => {
            button.addEventListener('click', function() {
                const quantityInput = button.parentElement.querySelector('.cart-plus-minus-box');
                let quantity = parseInt(quantityInput.value);
                quantity++;
                quantityInput.value = quantity;
                updateSubtotal(button.closest('tr'));
                updateCartTotal();
            });
        });

        // Event listener for decreasing quantity
        const decButtons = document.querySelectorAll('.dec');
        decButtons.forEach(button => {
            button.addEventListener('click', function() {
                const quantityInput = button.parentElement.querySelector('.cart-plus-minus-box');
                let quantity = parseInt(quantityInput.value);
                quantity = quantity > 1 ? quantity - 1 : 1;
                quantityInput.value = quantity;
                updateSubtotal(button.closest('tr'));
                updateCartTotal();
            });
        });

        // Update subtotal for a row
        function updateSubtotal(row) {
            const price = parseFloat(row.querySelector('.hiraola-product-price .amount').textContent.replace(' TL', '').replace(',', '.'));
            const quantity = parseInt(row.querySelector('.cart-plus-minus-box').value);
            const subtotal = row.querySelector('.product-subtotal .amount');
            subtotal.textContent = (price * quantity).toFixed(2).replace('.', ',') + ' TL';
        }

        // Update total cart amount
        function updateCartTotal() {
            const cartRows = document.querySelectorAll('tbody tr');
            let total = 0;
            cartRows.forEach(row => {
                const subtotal = parseFloat(row.querySelector('.product-subtotal .amount').textContent.replace(' TL', '').replace(',', '.'));
                total += subtotal;
            });

            document.querySelector('.cart-page-total li:first-child span').textContent = total.toFixed(2).replace('.', ',') + ' TL';
            document.querySelector('.cart-page-total li:last-child span').textContent = total.toFixed(2).replace('.', ',') + ' TL';
        }

        // Initial update of total cart amount on page load
        updateCartTotal();
    });
</script>
