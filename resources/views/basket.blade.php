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
                <form action="{{ route('payment') }}" method="POST">
                    @csrf
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
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="hiraola-product-remove">
                                            <a href="#" class="remove-product" data-product-id="{{ $product->id }}">
                                                <i class="fa fa-trash" title="Kaldır"></i>
                                            </a>
                                        </td>
                                        <td class="hiraola-product-thumbnail">
                                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100px; height: 100px;">
                                        </td>
                                        <td class="hiraola-product-name">
                                            {{ $product->name }}
                                            <input type="hidden" name="products[{{ $loop->index }}][id]" value="{{ $product->id }}">
                                        </td>
                                        <td class="hiraola-product-price">
                                            {{ number_format($product->price, 2, ',', '.') }} TL
                                            <input type="hidden" name="products[{{ $loop->index }}][price]" value="{{ $product->price }}">
                                        </td>
                                        <td class="quantity">
                                            <div class="hiraola-product-price">
                                                <input value="1" type="text" name="products[{{ $loop->index }}][quantity]" class="form-control cart-plus-minus-box">
                                            </div>
                                        </td>
                                        <td class="hiraola-product-size">
                                            <select class="form-control product-size" name="products[{{ $loop->index }}][size]">
                                                @foreach($sizes->where('product_id', $product->id) as $size)
                                                    @foreach($size as $key => $value)
                                                        @if($key !== 'id' && $key !== 'product_id' && $value !== 0)
                                                            <option value="{{ $key }}">{{ strtoupper($key) }}</option>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="product-subtotal">
                                            {{ number_format($product->price, 2, ',', '.') }} TL
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
                                <button id="odemeBtn" type="submit" class="btn btn-primary">Ödeme Sayfasına Git</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        // Remove product from cart
        $('.remove-product').on('click', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
            updateCartTotal();
        });

        // Update subtotal and total
        $('.cart-plus-minus-box').on('input', function() {
            updateSubtotal($(this).closest('tr'));
            updateCartTotal();
        });

        // Initial total update
        function updateCartTotal() {
            let subtotal = 0;
            $('.product-subtotal').each(function() {
                subtotal += parseFloat($(this).text().replace(' TL', '').replace('.', '').replace(',', '.'));
            });
            $('.cart-subtotal').text(subtotal.toFixed(2).replace('.', ',') + ' TL');
            $('.cart-total').text(subtotal.toFixed(2).replace('.', ',') + ' TL');
        }

        // Update subtotal for a row
        function updateSubtotal(row) {
            const price = parseFloat(row.find('.hiraola-product-price').text().replace(' TL', '').replace('.', '').replace(',', '.'));
            const quantity = parseInt(row.find('.cart-plus-minus-box').val());
            const subtotal = price * quantity;
            row.find('.product-subtotal').text(subtotal.toFixed(2).replace('.', ',') + ' TL');
        }

        // Initial total update on page load
        updateCartTotal();
    });
</script>
<style>
    .dec.qtybutton, .inc.qtybutton {
        display: none !important;
    }

    #odemeBtn {
    background-color: #595959;
    border: 1px solid #e5e5e5;
    color: #fff;
    display: inline-block;
    margin-top: 30px;
    padding: 10px 20px;
    text-transform: capitalize;
}
</style>
