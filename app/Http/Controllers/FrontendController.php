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
use App\Models\GeneralSettings;
use App\Models\adSettings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\CustomerGroups;
use Illuminate\Support\Facades\Cache;

class FrontendController extends BaseController
{
    use AuthorizesRequests;

    protected $data;

    public function __construct()
    {
        $this->data = [];
        $this->data['settings'] = GeneralSettings::find(1);
        $this->data['ad_settings'] = adSettings::find(1);
        $this->data['products'] = Products::all();
        $this->data['categories'] = Categories::where('parent_id', 0)->orWhere('parent_id', null)->get();
    }

    public function index()
    {
        $this->data['products'] = Products::where('active', 1)->orderBy('id', 'desc')->get();
        return view('index', $this->data);
    }

    public function categories($slug_kategoriadi)
    {
        $category = Categories::where('slug', $slug_kategoriadi)->firstOrFail();

        return view('categories', $this->data);
    }

    public function sepet(Request $request)
    {
        $requestData = $request->all();

        $quantities = array_fill(0, count($requestData['products']), 1);

        $requestData['quantities'] = $quantities;

        dd($requestData);
    }

    public function about()
    {
        return view('about', $this->data);
    }

    public function contact()
    {
        return view('contacts', $this->data);
    }

    public function products($categories = null)
    {
        $this->data['products'] = !empty($categories)
            ? Products::whereHas('category', function ($query) use ($categories) {
                $query->where('slug', $categories);
            })->get()
            : Products::all();

        return view('products', $this->data);
    }

    public function productDetail($slug_urunadi)
    {
        $product = Products::where('slug', $slug_urunadi)->firstOrFail();

        $this->data['product'] = $product;

        $this->data['product_gallery'] = DB::table('sma_products_gallery')->where('product_id', $product->id)->get();
        $sizes = DB::table('sma_product_types')
            ->select('id', 'product_id', 's', 'm', 'l', 'xl', 'xxl')
            ->where('product_id', $product->id)
            ->where(function ($query) {
                $query->where('s', '!=', 0)
                    ->orWhere('m', '!=', 0)
                    ->orWhere('l', '!=', 0)
                    ->orWhere('xl', '!=', 0)
                    ->orWhere('xxl', '!=', 0);
            })
            ->get();

        $this->data['sizes'] = $sizes->map(function ($item) {
            return collect($item)->filter(function ($value, $key) {
                return $value !== 0 || in_array($key, ['id', 'product_id']);
            });
        });

        $this->data['category'] = Categories::where('id', $product->category_id)->first();


        return view('products_details', $this->data);
    }

    public function basket(Request $request)
    {
        $productIds = $request->input('products', []);
        $products = Products::whereIn('id', $productIds)->get();
        $this->data['productInformation'] = $products;
        $sizes = DB::table('sma_product_types')
            ->select('id', 'product_id', 's', 'm', 'l', 'xl', 'xxl')
            ->whereIn('product_id', $productIds)
            ->where(function ($query) {
                $query->where('s', '!=', 0)
                    ->orWhere('m', '!=', 0)
                    ->orWhere('l', '!=', 0)
                    ->orWhere('xl', '!=', 0)
                    ->orWhere('xxl', '!=', 0);
            })
            ->get();

        $this->data['sizes'] = $sizes->map(function ($item) {
            return collect($item)->filter(function ($value, $key) {
                return $value !== 0 || in_array($key, ['id', 'product_id']);
            });
        });

        return view('basket', $this->data);
    }
    public function payment(Request $request)
    {
        dd($request->all());
    }
}
