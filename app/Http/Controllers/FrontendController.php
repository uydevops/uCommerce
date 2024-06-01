<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use App\Models\UrunTakip;
use App\Models\Companies;
use App\Models\ProductTypes;
use App\Models\Tasks;
use App\Models\ProductsUnit;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; //Bunu ekleme sebebimiz, logout işlemi yapabilmek için
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; //Bunu ekleme sebebimiz, controller içerisinde authorize işlemleri yapabilmek için
use Illuminate\Routing\Controller as BaseController;
use App\Models\CustomerGroups;
use Illuminate\Support\Facades\Cache;
class FrontendController extends Controller
{




    public function index()
    {
        $this->data['categories'] = Categories::where('parent_id', 0)->get();
        $this->data['products'] = Products::where('active', 1)->orderBy('id', 'desc')->get();
        return view('index', $this->data);
    }

    public function categories($slug_kategoriadi)
    {
        $category = Categories::where('slug', $slug_kategoriadi)->first() ?? abort(403, 'Böyle bir kategori bulunamadı');
        $this->data['category'] = $category;
        $this->data['products'] = Products::where('category_id', $category->id)->get();
        return view('categories', $this->data);
    }

    public function sepet(Request $request)
    {
        dd($request->all());
    }

}
