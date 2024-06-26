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
        $this->updateProductTypes($product->id, $request->input('id'));
        return redirect()->back()->with('success', 'Ürün Güncellendi');
    }

    public function addProduct(Request $request)
    {
        $data = $this->getProductData($request);
        $product = Product::create($data);

        if ($request->hasFile('image')) {
            $this->handleProductImage($request, $product);
        }

        $this->updateProductTypes($product->id, $request->only('s', 'm', 'l', 'xl', 'xxl'));
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
    private function updateProductTypes($productId, $request)
    {
        $addDB = DB::table('sma_product_types')->insert([
            'product_id' => $productId,
            's' => $request['s'] ?? 0,
            'm' => $request['m'] ?? 0,
            'l' => $request['l'] ?? 0,
            'xl' => $request['xl'] ?? 0,
            'xxl' => $request['xxl'] ?? 0,
        ]);
    
        return $addDB;
    }
    


    private function handleProductImage(Request $request, $product)
    {
        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $destinationPath = public_path('images');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $request->file('image')->move($destinationPath, $imageName);

        $product->image = $imageName;
        $product->save();
    }

    private function handleMultipleImages(Request $request, $product)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('images');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $image->move($destinationPath, $imageName);

                DB::table('sma_products_gallery')->insert([
                    'product_id' => $product->id,
                    'image' => $imageName,
                ]);
            }
        }
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
            'active' => $request->input('visible'),
            'aciklama' => $request->input('aciklama'),
            'unit' => $request->input('unit'),
            'category_id' => $request->input('category_id') ?? 0,
            'code' => $request->input('code') ?? 0,
            'quantity' => $request->input('quantity') ?? 0,
        ];
    }
}
