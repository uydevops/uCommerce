    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ürün Oluştur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('products.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="container">

                            <div class="mb-3">
                                <label for="productCategory" class="form-label">Ürün Kategorisi</label>
                                <select class="form-select" name="category_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="productName" class="form-label">Ürün Adı</label>
                                <input type="text" class="form-control" name="name" value="" required>
                            </div>
                            <div class="mb-3">
                                <label for="productDescription" class="form-label">Ürün Özelliği</label>
                                <textarea class="form-control" name="product_description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="productDescription" class="form-label">Ürün Açıklaması</label>
                                <textarea class="form-control" name="aciklama" rows="3" required></textarea>
                            </div>


                            <div class="mb-3">
                                <label for="productStock" class="form-label ">Stok Miktarı</label>
                                <input type="number" class="form-control" name="quantitiy" value="" required>
                            </div>


                            <div class="mb-3">
                                <label for="productPrice" class="form-label">Fiyat</label>
                                <input type="number" class="form-control"  id="priceFormat" name="price" value="" required>
                            </div>


                            <div class="mb-3">
                                <label for="productCategory" class="form-label">Beden Ölçüleri</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="size[]" value="s" id="sizeS">
                                    <label class="form-check-label" for="sizeS">S</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="size[]" value="m" id="sizeM">
                                    <label class="form-check-label" for="sizeM">M</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="size[]" value="l" id="sizeL">
                                    <label class="form-check-label" for="sizeL">L</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="size[]" value="xl" id="sizeXL">
                                    <label class="form-check-label" for="sizeXL">XL</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="size[]" value="xxl" id="sizeXXL">
                                    <label class="form-check-label" for="sizeXXL">XXL</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="productImage" class="form-label">Ürün Fotoğrafı(Kapak)</label>
                                <input class="form-control" type="file" name="image">
                            </div>

                            <div class="mb-3">
                                <label for="productImage" class="form-label">Toplu Ürün Fotoğrafları</label>
                                <input class="form-control" type="file" name="images[]" multiple>
                            </div>


                            <div class="mb-3">
                                <label for="productVisibility" class="form-label">Ürün Görünürlük Durumu</label>
                                <select class="form-select" name="visible" required>
                                    <option value="1">Görünür</option>
                                    <option value="0">Gizli</option>
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Değişiklikleri Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

