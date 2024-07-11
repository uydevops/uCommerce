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
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\CustomerGroups;
use Illuminate\Support\Facades\Cache;

class DashboardController extends BaseController
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $userId = auth()->user()->id;

        $tasks = auth()->user()->tasks;
        $completedTasksCount = $tasks->where('completed', 1)->count();

        $productsCount = Products::count();
        $activeCompaniesCount = Companies::count();

        $companiesRegInfo = Companies::where('onay', 1)
            ->select('name', 'company', 'bonus_kotasi')
            ->get();

        $pendingCompanies = Companies::where('onay', 0)->get();

        return view('dashboard.index', compact('tasks', 'completedTasksCount', 'productCount', 'activeCompaniesCount', 'companiesRegInfo', 'pendingCompanies'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function addTask(Request $request)
    {
        try {
            $task = new Tasks();
            $task->description = $request->input('description');
            $task->user_id = auth()->user()->id;
            $task->save();

            return response()->json(['message' => 'Görev başarıyla eklendi'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Görev eklenirken bir hata oluştu'], 500);
        }
    }

    public function deleteTask(Request $request)
    {
        try {
            $task = Tasks::findOrFail($request->input('task_id'));
            $task->delete();

            return response()->json(['message' => 'Görev başarıyla silindi'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Görev silinirken bir hata oluştu'], 500);
        }
    }

    public function checkTask(Request $request)
    {
        try {
            $task = Tasks::findOrFail($request->input('task_id'));
            $task->completed = !$task->completed;
            $task->save();

            return response()->json(['message' => 'Görev başarıyla güncellendi'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Görev güncellenirken bir hata oluştu'], 500);
        }
    }

    public function completedTasks()
    {
        $completedTasks = auth()->user()->tasks()->where('completed', 1)->get();
        return response()->json($completedTasks);
    }

    public function approvedCompanies($id)
    {
        try {
            $company = Companies::findOrFail($id);
            $company->onay = 1;
            $company->save();

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Şirket onaylanırken bir hata oluştu']);
        }
    }

    public function rejectedCompany($id)
    {
        try {
            $company = Companies::findOrFail($id);
            $company->delete();

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Şirket silinirken bir hata oluştu']);
        }
    }

    public function users()
    {
        $users = User::all();
        return view('dashboard.users', compact('users'));
    }

    public function companies()
    {
        $companies = Companies::where('onay', 1)->get();
        $groups = CustomerGroups::all();

        return view('dashboard.companies', compact('companies', 'groups'));
    }

    public function products()
    {
        $products = Cache::remember('products.all', 60, function () {
            return Products::join('sma_product_types', 'sma_products.id', '=', 'sma_product_types.product_id')
                ->leftJoin('sma_categories', 'sma_products.category_id', '=', 'sma_categories.id')
                ->select('sma_products.*', 'sma_product_types.s', 'sma_product_types.m', 'sma_product_types.l', 'sma_product_types.xl', 'sma_product_types.xxl', 'sma_categories.name as category_name')
                ->get();
        });

        $product_types = Cache::remember('product_types.all', 60, function () {
            return ProductTypes::all();
        });

        $products_unit = Cache::remember('units.all', 60, function () {
            return ProductsUnit::all();
        });

        $categories = Cache::remember('categories.all', 60, function () {
            return Categories::all();
        });

        return view('dashboard.products', compact('products', 'product_types', 'products_unit', 'categories'));
    }

    public function clearProductsCache()
    {
        Cache::forget('products.all');
        Cache::forget('product_types.all');
        return redirect()->route('dashboard.products')->with('status', 'Ürünler önbellekten temizlendi');
    }

    public function categories()
    {
        $categories = Categories::all();
        return view('dashboard.categories', compact('categories'));
    }

    public function settings()
    {
        $settings = DB::table('general_settings')->first();
        return view('dashboard.settings', compact('settings'));
    }

    public function ads()
    {
        $ads = DB::table('ad_settings')->get();
        return view('dashboard.ad_settings', compact('ads'));
    }
}

