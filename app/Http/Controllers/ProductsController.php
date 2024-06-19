<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products as Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function updateProduct(Request $request)
    {
        $product = Product::findOrFail($request->input('id'));
        $this->handleProductImage($request, $product);
        $product->fill($this->getProductData($request));
        $product->save();
        $this->updateProductTypes($product->id, $request->input('size'));
        return redirect()->back()->with('success', 'Ürün Güncellendi');
    }

    public function addProduct(Request $request)
    {
        $data = $this->getProductData($request);
        $product = Product::create($data);
        $this->updateProductTypes($product->id, $request->input('size'));
        $this->handleMultipleImages($request, $product);
        return redirect()->back()->with('success', 'Ürün Eklendi');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $this->deleteProductImage($product->image);
        $product->delete();
        return redirect()->back()->with('success', 'Ürün başarıyla silindi');
    }

    private function handleProductImage(Request $request, $product)
    {
        if ($request->hasFile('image')) {
            $this->deleteProductImage($product->image);
            $product->image = $this->uploadImage($request->file('image'));
        }
    }

    private function updateProductTypes($productId, $sizes)
    {
        DB::table('sma_product_types')->where('product_id', $productId)->delete();
        if (is_array($sizes)) {
            foreach ($sizes as $size) {
                DB::table('sma_product_types')->insert([
                    'product_id' => $productId,
                    strtolower($size) => 1,
                ]);
            }
        }
    }

    private function handleMultipleImages(Request $request, $product)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $this->uploadImage($image);
                DB::table('sma_products_gallery')->insert([
                    'product_id' => $product->id,
                    'image' => $imageName,
                ]);
            }
        }
    }

    private function uploadImage($image)
    {
        // Public dizinindeki images klasörüne kaydet
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        return $imageName;
    }

    private function deleteProductImage($imageName)
    {
        Storage::delete('public/images/' . $imageName);
    }

    private function getProductData(Request $request)
    {
        return [
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'price' => $request->input('price'),
            'product_details' => $request->input('product_description'),
            'type_id' => $request->input('type_id'),
            'active' => $request->filled('active'),
            'aciklama' => $request->input('aciklama'),
            'unit' => $request->input('unit'),
            'category_id' => $request->input('category_id') ?? 0,
            'code' => $request->input('code') ?? 0,
        ];
    }
}
