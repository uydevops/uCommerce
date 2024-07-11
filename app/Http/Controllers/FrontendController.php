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
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

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
        // Adım 1: HTTP isteğinden `products` verilerini almak
        $productsPayment = $request->input('products', []);

        // Adım 2: Her bir ürün için işlem yapmak
        $combinedData = collect($productsPayment)->map(function ($product) {
            // Adım 3: Ürün bilgilerini bulmak
            $productInfo = Products::findOrFail($product['id']);

            // Adım 4: Ürünün beden bilgilerini sorgulamak ve filtrelemek
            $sizes = DB::table('sma_product_types')
                ->select('s', 'm', 'l', 'xl', 'xxl')
                ->where('product_id', $product['id'])
                ->where(function ($query) {
                    // Sıfırdan farklı olan bedenleri sorgulamak
                    $query->where('s', '!=', 0)
                        ->orWhere('m', '!=', 0)
                        ->orWhere('l', '!=', 0)
                        ->orWhere('xl', '!=', 0)
                        ->orWhere('xxl', '!=', 0);
                })
                ->first();

            // Adım 5: Birleştirilmiş veriyi oluşturmak
            $combinedProductData = [
                'id' => $product['id'],
                'product_name' => $productInfo->name ?? '',
                'product_price' => $productInfo->price ?? '',
                'quantity' => $product['quantity'],
                'size' => $product['size'],
                'sizes' => $sizes ? collect(array_filter((array)$sizes))->keys()->toArray() : [],
            ];

            // Adım 6: Birleştirilmiş veriyi döndürmek
            return $combinedProductData;
        });

        // Adım 7: Konsolda birleştirilmiş veriyi görselleştirmek

        // Adım 8: Görüntüleme için veriyi hazırlamak
        $this->data['productsPayment'] = $combinedData;


        // Adım 9: `payment` görünümünü render etmek
        return view('payment', $this->data);
    }


    public function paytrCallback(Request $request)
    {
        // PayTR bilgileri
        $merchant_id = '471561';
        $merchant_key = 'QecQuDdJ251JLQH3';
        $merchant_salt = 'Xcc1LLUpKsB8J7ze';
        $paytr_api_url = 'https://www.paytr.com/odeme/api/get-token';

        // Kullanıcı bilgileri
        $email = $request->input('email');
        $amount = $request->input('amount');
        $merchant_oid = rand(100000, 999999);
        $user_name = "Test Test";
        $user_address = "ADANA / TÜRKİYE";
        $user_phone = "05078928490";

        // Diğer ayarlar
        $successUrl = "http://example.com/success";
        $errorUrl = "http://example.com/error";
        $user_basket = "Test";
        $currency = "TL";
        $test_mode = 0;
        $no_installment = 0;
        $max_installment = 0;
        $timeout_limit = 1000;
        $debug_on = 1;


        dd($request->all());


        // Kullanıcı IP adresi alınması
        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            $ip = $_SERVER["REMOTE_ADDR"];
        }
        $user_ip = $ip;

        // Hash oluşturma
        $payment_amount = $amount * 100; // PayTR API, kuruş cinsinden istiyor
        $hash_str = $merchant_id . $user_ip . $merchant_oid . $email . $payment_amount . $user_basket . $no_installment . $max_installment . $currency . $test_mode;
        $paytr_token = base64_encode(hash_hmac('sha256', $hash_str . $merchant_salt, $merchant_key, true));

        // POST verileri
        $post_vals = [
            'merchant_id' => $merchant_id,
            'user_ip' => $user_ip,
            'merchant_oid' => $merchant_oid,
            'email' => $email,
            'payment_amount' => $payment_amount,
            'paytr_token' => $paytr_token,
            'user_basket' => $user_basket,
            'debug_on' => $debug_on,
            'no_installment' => $no_installment,
            'max_installment' => $max_installment,
            'user_name' => $user_name,
            'user_address' => $user_address,
            'user_phone' => $user_phone,
            'merchant_ok_url' => $successUrl,
            'merchant_fail_url' => $errorUrl,
            'timeout_limit' => $timeout_limit,
            'currency' => $currency,
            'test_mode' => $test_mode,
        ];

        // CURL ile PayTR API'sine istek yapma
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $paytr_api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            die("PAYTR IFRAME bağlantı hatası. Hata:" . curl_error($ch));
        }

        curl_close($ch);

        // Sonucu JSON olarak alıp işleme
        $result = json_decode($result, true);

        if ($result['status'] == 'success') {
            $token = $result['token'];
            // Başarılı ise işlem yapabilirsiniz
        } else {
            die("PAYTR IFRAME başarısız. Sebep:" . $result['reason']);
        }
    }
}
