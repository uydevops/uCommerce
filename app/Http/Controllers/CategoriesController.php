<?php

namespace App\Http\Controllers;

use App\Models\Categories as Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function categories()
    {
        return view('categories');
    }


    

    private function uploadImage($image)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('images');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $image->move($destinationPath, $imageName);

        return $imageName;
    }

    public function addCategory(Request $request)
    {
        $data = $this->getCategoryData($request);

        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImage($request->file('image'));
            $data['image'] = $imagePath;
        }

        Category::create($data);

        return redirect()->back()->with('success', 'Kategori Eklendi');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Kategori başarıyla silindi');
    }

    private function getCategoryData($request)
    {
        return [
            'name' => $request->input('name'),
            'code' => Str::slug($request->input('name')) . '-' . rand(1000, 9999),
            'description' => $request->input('description'),
            'visible' => $request->input('visible'),
            'slug' => Str::slug($request->input('name')),
        ];
    }


    public function updateCategory(Request $request)
    {

        $category = Category::findOrFail($request->input('id'));
        $data = $this->getCategoryData($request);

        if ($request->hasFile('image')) {
            $this->deleteCategoryImage($category->image);
            $imagePath = $this->uploadImage($request->file('image'));
            $data['image'] = $imagePath;
        }
        $category->update($data);
        return redirect()->back()->with('success', 'Kategori başarıyla güncellendi');
    }
}
