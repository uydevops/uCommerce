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
    }

    public function index()
    {
        $this->data['categories'] = Categories::where('parent_id', 0)->get();
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
        return view('contact', $this->data);
    }

}


