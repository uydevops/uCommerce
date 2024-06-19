@include('layouts.header')
<div class="hiraola-content_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-toolbar">
                    <div class="product-view-mode">
                        <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="fa fa-th"></i></a>
                    </div>
                    <div class="product-item-selection_area">
                        <div class="product-short">
                            <label class="select-label">Sırala:</label>
                            <select class="nice-select" id="product-sort">
                                <option value="1">Alaka</option>
                                <option value="2">İsim, A'dan Z'ye</option>
                                <option value="3">İsim, Z'den A'ya</option>
                                <option value="4">Fiyat, düşükten yükseğe</option>
                                <option value="5">Fiyat, yüksekten düşüğe</option>
                                <option value="6">Puan (En Yüksek)</option>
                                <option value="7">Puan (En Düşük)</option>
                                <option value="8">Model (A - Z)</option>
                                <option value="9">Model (Z - A)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="shop-product-wrap grid gridview-3 row" id="product-list">
                    @foreach($products as $product)
                    <div class="col-lg-4 product-item" data-name="{{ $product->name }}" data-price="{{ $product->price }}" data-rating="{{ $product->rating }}">
                        <div class="slide-item">
                            <div class="single_product">
                                <div class="product-img">
                                    <a href="">
                                        <img class="primary-img" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                                        <img class="secondary-img" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                                    </a>
                                </div>
                                <div class="hiraola-product_content">
                                    <div class="product-desc_info">
                                        <h6><a class="product-name" href="{{route('page.product.detail', $product->slug)}}">{{ $product->name }}</a></h6>
                                        <div class="price-box">
                                            <span class="new-price">₺{{ $product->price }}</span>
                                        </div>
                                        <div class="additional-add_action">
                                            <ul>
                                                <li><a class="add_basket-{{ $product->id }}" href="" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                @for ($i = 0; $i < 5; $i++) <li><i class="fa fa-star{{ $i < $product->rating ? '' : '-of-david silver-color' }}"></i>
                                                    </li>
                                                    @endfor
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')

<script>
    $('#product-sort').on('change', function() {
        var productList = $('#product-list');
        var products = productList.children('.product-item').get();
        var sortValue = $(this).val();

        products.sort(function(a, b) {
            var aVal, bVal;
            switch (sortValue) {
                case '2':
                    aVal = $(a).data('name').toLowerCase();
                    bVal = $(b).data('name').toLowerCase();
                    return aVal.localeCompare(bVal);
                case '3':
                    aVal = $(a).data('name').toLowerCase();
                    bVal = $(b).data('name').toLowerCase();
                    return bVal.localeCompare(aVal);
                case '4':
                    aVal = parseFloat($(a).data('price'));
                    bVal = parseFloat($(b).data('price'));
                    return aVal - bVal;
                case '5':
                    aVal = parseFloat($(a).data('price'));
                    bVal = parseFloat($(b).data('price'));
                    return bVal - aVal;
                case '6':
                    aVal = parseFloat($(a).data('rating'));
                    bVal = parseFloat($(b).data('rating'));
                    return bVal - aVal;
                case '7':
                    aVal = parseFloat($(a).data('rating'));
                    bVal = parseFloat($(b).data('rating'));
                    return aVal - bVal;
                case '8':
                    aVal = $(a).data('name').toLowerCase();
                    bVal = $(b).data('name').toLowerCase();
                    return aVal.localeCompare(bVal);
                case '9':
                    aVal = $(a).data('name').toLowerCase();
                    bVal = $(b).data('name').toLowerCase();
                    return bVal.localeCompare(aVal);
                default:
                    return 0;
            }
        });

        $.each(products, function(index, product) {
            productList.append(product);
        });
    });
</script>
