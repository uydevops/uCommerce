<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="offcanvas-minicart_wrapper" id="miniCart">
    <form id="cartForm" action="{{route('sepet')}}" method="POST">
        @csrf
        <div class="offcanvas-menu-inner">
            <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
            <div class="minicart-content">
                <div class="minicart-heading">
                    <h4>Sepetiniz</h4>
                </div>
                <ul class="minicart-list" id="minicart-list">
                    <!-- Ürünler burada listelenecek -->
                </ul>
            </div>
            <div class="minicart-item_total">
                <span>Alt Toplam</span>
                <span class="ammount" id="subtotal">₺0.00</span>
            </div>
            <div class="minicart-btn_area">
                <button type="button" id="checkoutBtn" class="hiraola-btn hiraola-btn_dark hiraola-btn_fullwidth">Ödeme</button>
            </div>
        </div>
    </form>
</div>

<script>
$(document).ready(function () {
    @foreach($products as $product)
    $('.add_basket-{{ $product->id }}').click(function (e) {
        e.preventDefault();
        var id = '{{ $product->id }}';
        var name = '{{ $product->name }}';
        var price = {{ $product->price }};
        var image = '{{ $product->image }}';
        addItemToCart(id, name, price, image);
    });
    @endforeach

    $('#checkoutBtn').click(function (e) {
        e.preventDefault();
        $('#cartForm').submit();
    });

    $('#minicart-list').on('click', '.product-item_remove', function(e) {
        e.preventDefault();
        var price = parseFloat($(this).closest('.minicart-product').find('.product-item_price').text().replace('₺', '').replace(',', ''));
        var quantity = parseInt($(this).closest('.minicart-product').find('.quantity-value').text());
        var subtotal = price * quantity;
        $(this).closest('.minicart-product').remove();
        updateSubtotalAmount(-subtotal);
    });

    $('#minicart-list').on('click', '.quantity-decrease', function() {
        var quantityElement = $(this).siblings('.quantity-value');
        var currentQuantity = parseInt(quantityElement.text());
        if (currentQuantity > 1) {
            quantityElement.text(currentQuantity - 1);
            updateCartItemQuantity($(this).closest('.minicart-product'), currentQuantity - 1);
        }
    });

    $('#minicart-list').on('click', '.quantity-increase', function() {
        var quantityElement = $(this).siblings('.quantity-value');
        var currentQuantity = parseInt(quantityElement.text());
        quantityElement.text(currentQuantity + 1);
        updateCartItemQuantity($(this).closest('.minicart-product'), currentQuantity + 1);
    });

    function addItemToCart(id, name, price, image) {
        var existingItem = $('.minicart-product[data-id="' + id + '"]');
        if (existingItem.length > 0) {
            var quantityElement = existingItem.find('.quantity-value');
            var currentQuantity = parseInt(quantityElement.text());
            quantityElement.text(currentQuantity + 1);
            updateCartItemQuantity(existingItem, currentQuantity + 1);
        } else {
            var itemHtml = createCartItemHtml(id, name, price, image);
            $('#minicart-list').append(itemHtml);
            updateCartItemQuantity($('.minicart-product[data-id="' + id + '"]'), 1);
        }
        updateSubtotalAmount(price);
    }

    function createCartItemHtml(id, name, price, image) {
        return `
            <li class="minicart-product" data-id="${id}">
                <a class="product-item_remove" href="#"><i class="ion-android-close"></i></a>
                <div class="product-item_img">
                    <img src="{{ asset('images/') }}/${image}" alt="${name}">
                </div>
                <div class="product-item_content">
                    <a class="product-item_title" href="#">${name}</a>
                    <div class="product-item_quantity">
                        <button class="quantity-decrease">Adet(</button>
                        <span class="quantity-value">1</span>
                        <button class="quantity-increase">)</button>
                    </div>
                    <span class="product-item_price">₺${price.toFixed(2)}</span>
                    <input type="hidden" name="products[]" value="${id}">
                    <input type="hidden" name="quantities[]" value="1">
                </div>
            </li>
        `;
    }

    function updateCartItemQuantity(item, quantity) {
        item.find('input[name="quantities[]"]').val(quantity);
    }

    function updateSubtotalAmount(price) {
        var currentTotal = parseFloat($('#subtotal').text().replace('₺', '').replace(',', ''));
        if (isNaN(currentTotal)) {
            currentTotal = 0;
        }
        var newTotal = currentTotal + price;
        $('#subtotal').html('₺' + newTotal.toFixed(2));
    }
});
</script>
