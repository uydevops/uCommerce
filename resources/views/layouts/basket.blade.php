<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>

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
                <button type="button" id="emptyCartBtn" class="hiraola-btn hiraola-btn_dark hiraola-btn_fullwidth"><i class="ion-trash-b"></i> Sepeti Boşalt</button>
                <hr class="mb-3 mt-3">
                <button type="button" id="checkoutBtn" class="hiraola-btn hiraola-btn_dark hiraola-btn_fullwidth"><i class="ion-forward"></i> Ödeme Yap</button>
            </div>
        </div>
    </form>
</div>

<script>
$(document).ready(function () {
    loadCartFromLocalStorage();

    @foreach($products as $product)
    $('.add_basket-{{ $product->id }}').click(function (e) {
        e.preventDefault();
        addItemToCart('{{ $product->id }}', '{{ $product->name }}', {{ $product->price }}, '{{ $product->image }}');
    });
    @endforeach

    $('#checkoutBtn').click(function (e) {
        e.preventDefault();
        $('#cartForm').submit();
    });

    $('#emptyCartBtn').click(function (e) {
        e.preventDefault();
        emptyCart();
    });

    $('#minicart-list').on('click', '.product-item_remove', function(e) {
        e.preventDefault();
        removeItemFromCart($(this).closest('.minicart-product'));
    });

    function addItemToCart(id, name, price, image) {
        if ($('.minicart-product[data-id="' + id + '"]').length > 0) {
            alert('Bu ürün zaten sepete eklenmiş.');
            return;
        }
        $('#minicart-list').append(createCartItemHtml(id, name, price, image));
        updateSubtotalAmount(price);
        saveCartToLocalStorage();
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
                    <span class="product-item_price">₺${price.toFixed(2)}</span>
                    <input type="hidden" name="products[]" value="${id}">
                </div>
            </li>
        `;
    }

    function updateSubtotalAmount(price) {
        var currentTotal = parseFloat($('#subtotal').text().replace('₺', '').replace(',', ''));
        $('#subtotal').html('₺' + (currentTotal + price).toFixed(2));
    }

    function saveCartToLocalStorage() {
        var cartItems = [];
        $('#minicart-list .minicart-product').each(function() {
            cartItems.push({
                id: $(this).data('id'),
                name: $(this).find('.product-item_title').text(),
                price: parseFloat($(this).find('.product-item_price').text().replace('₺', '').replace(',', '')),
                image: $(this).find('.product-item_img img').attr('src').split('/').pop()
            });
        });
        localStorage.setItem('cart', JSON.stringify({
            items: cartItems,
            subtotal: $('#subtotal').text().replace('₺', '').replace(',', '')
        }));
    }

    function loadCartFromLocalStorage() {
        var cart = JSON.parse(localStorage.getItem('cart') || '{"items":[],"subtotal":"0.00"}');
        cart.items.forEach(function(item) {
            $('#minicart-list').append(createCartItemHtml(item.id, item.name, item.price, item.image));
        });
        $('#subtotal').html('₺' + parseFloat(cart.subtotal).toFixed(2));
    }

    function removeItemFromCart(item) {
        var price = parseFloat(item.find('.product-item_price').text().replace('₺', '').replace(',', ''));
        item.remove();
        updateSubtotalAmount(-price);
        saveCartToLocalStorage();
    }

    function emptyCart() {
        $('#minicart-list').empty();
        $('#subtotal').html('₺0.00');
        saveCartToLocalStorage();
    }
});
</script>
