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
    loadCartFromLocalStorage();  // Sayfa yüklendiğinde localStorage'dan sepeti yükle

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
        var subtotal = price;
        $(this).closest('.minicart-product').remove();
        updateSubtotalAmount(-subtotal);
        saveCartToLocalStorage();
    });

    function addItemToCart(id, name, price, image) {
        var existingItem = $('.minicart-product[data-id="' + id + '"]');
        if (existingItem.length > 0) {
            alert('Bu ürün zaten sepete eklenmiş.');
        } else {
            var itemHtml = createCartItemHtml(id, name, price, image);
            $('#minicart-list').append(itemHtml);
            saveCartToLocalStorage();
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
                    <span class="product-item_price">₺${price.toFixed(2)}</span>
                    <input type="hidden" name="products[]" value="${id}">
                </div>
            </li>
        `;
    }

    function updateSubtotalAmount(price) {
        var currentTotal = parseFloat($('#subtotal').text().replace('₺', '').replace(',', ''));
        if (isNaN(currentTotal)) {
            currentTotal = 0;
        }
        var newTotal = currentTotal + price;
        $('#subtotal').html('₺' + newTotal.toFixed(2));
        saveCartToLocalStorage();
    }

    function saveCartToLocalStorage() {
        var cartItems = [];
        $('#minicart-list .minicart-product').each(function() {
            var id = $(this).data('id');
            var name = $(this).find('.product-item_title').text();
            var price = parseFloat($(this).find('.product-item_price').text().replace('₺', '').replace(',', ''));
            var image = $(this).find('.product-item_img img').attr('src').split('/').pop();
            cartItems.push({ id: id, name: name, price: price, image: image });
        });
        var subtotal = $('#subtotal').text().replace('₺', '').replace(',', '');
        localStorage.setItem('cart', JSON.stringify({ items: cartItems, subtotal: subtotal }));
    }

    function loadCartFromLocalStorage() {
        var cart = localStorage.getItem('cart');
        if (cart) {
            var cartData = JSON.parse(cart);
            $('#minicart-list').empty();
            cartData.items.forEach(function(item) {
                var itemHtml = createCartItemHtml(item.id, item.name, item.price, item.image);
                $('#minicart-list').append(itemHtml);
            });
            $('#subtotal').html('₺' + parseFloat(cartData.subtotal).toFixed(2));
        }
    }
});
</script>
