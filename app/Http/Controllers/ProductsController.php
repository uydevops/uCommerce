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
        $product = Product::find($request->id);

        if (!$product) {
            return redirect()->back()->with('error', 'Ürün bulunamadı');
        }

        DB::transaction(function () use ($request, $product) {
            $this->handleProductImage($request, $product);
            $product->fill($this->getProductData($request));
            $product->save();
            $this->updateProductTypes($product->id, $request->only('s', 'm', 'l', 'xl', 'xxl'));
        });

        return redirect()->back()->with('success', 'Ürün Güncellendi');
    }

    public function addProduct(Request $request)
    {
        DB::transaction(function () use ($request) {
            $data = $this->getProductData($request);
            $product = Product::create($data);

            if ($request->hasFile('image')) {
                $this->handleProductImage($request, $product);
            }

            $this->updateProductTypes($product->id, $request->only('s', 'm', 'l', 'xl', 'xxl'));
            $this->handleMultipleImages($request, $product);
        });

        return redirect()->back()->with('success', 'Ürün Eklendi');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        DB::transaction(function () use ($product) {
            $this->deleteProductImage($product->image);
            $product->delete();
        });

        return redirect()->back()->with('success', 'Ürün başarıyla silindi');
    }

    private function updateProductTypes($productId, $data)
    {
        DB::table('sma_product_types')->updateOrInsert(
            ['product_id' => $productId],
            [
                's' => $data['s'] ?? 0,
                'm' => $data['m'] ?? 0,
                'l' => $data['l'] ?? 0,
                'xl' => $data['xl'] ?? 0,
                'xxl' => $data['xxl'] ?? 0,
            ]
        );
    }

    private function handleProductImage(Request $request, $product)
    {
        if ($request->hasFile('image')) {
            $this->deleteProductImage($product->image);
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $image->move($destinationPath, $imageName);
            $product->image = $imageName;
        }
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
        if ($imageName) {
            Storage::delete('public/images/' . $imageName);
        }
    }

    private function getProductData(Request $request)
    {
        return [
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'price' => $request->input('price'),
            'product_details' => $request->input('product_description'),
            'type_id' => $request->input('type_id'),
            'active' => $request->input('visible') ?? 1,
            'aciklama' => $request->input('aciklama'),
            'unit' => $request->input('unit'),
            'category_id' => $request->input('category_id') ?? 0,
            'code' => $request->input('code') ?? 0,
            'quantity' => $request->input('quantity') ?? 0,
        ];
    }
}
