<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\category;
use App\Models\ProductsDetail;
use App\Models\Products;
use App\Models\customer;
use App\Models\Ram;
use App\Models\Rom;
use App\Models\Cpu;
use App\Models\GPU;
use App\Models\Ward;
use App\Models\Province;
use App\Models\District;
use App\Models\Paymentmethod;
use App\Models\orders;
use App\Models\orderDetail;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // <<Admin>>
    public function home(Request $request) {
        $year = $request->input('year', date('Y'));
        $month = $request->input('month', date('n'));
        // Lấy dữ liệu thống kê
        $totalOrders = Orders::whereYear('created_at', $year)->where('status', '=', '3')->count();
        $totalRevenue = Orders::whereYear('created_at', $year)->where('status', '=', '3')->sum('TotalAmount');
    
        // Doanh thu theo tháng trong năm hiện tại
        $monthlyRevenue = Orders::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(TotalAmount) as total')
        )
        ->whereYear('created_at', $year)
        ->groupBy('month')
        ->where('status', '=', '3')
        ->pluck('total', 'month');
    
        // Doanh số theo tháng trong năm hiện tại
        $monthlySales = Orders::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
        ->where('status', '=', '3')
        ->whereYear('created_at', $year)
        ->groupBy('month')
        ->pluck('total', 'month');
    
        // Doanh số chi tiết theo ngày trong tháng được chọn
        $dailySales = Orders::select(
            DB::raw('DAY(created_at) as day'),
            DB::raw('COUNT(*) as total')
        )
        ->whereYear('created_at', $year)
        ->whereMonth('created_at', $month)
        ->groupBy('day')
        ->pluck('total', 'day');
    
        // Chuẩn hóa dữ liệu doanh thu và doanh số theo tháng để đảm bảo tất cả các tháng đều có dữ liệu
        $monthlyRevenue = collect(range(1, 12))->mapWithKeys(function ($month) use ($monthlyRevenue) {
            return [$month => $monthlyRevenue->get($month, 0)];
        });
    
        $monthlySales = collect(range(1, 12))->mapWithKeys(function ($month) use ($monthlySales) {
            return [$month => $monthlySales->get($month, 0)];
        });
    
        // Chuẩn hóa dữ liệu doanh số chi tiết theo ngày để đảm bảo tất cả các ngày trong tháng đều có dữ liệu
        $dailySales = collect(range(1, 31))->mapWithKeys(function ($day) use ($dailySales) {
            return [$day => $dailySales->get($day, 0)];
        });
        // dd($monthlyRevenue);
        return view('home', [
            'totalOrders' => $totalOrders,
            'totalRevenue' => $totalRevenue,
            'monthlyRevenue' => $monthlyRevenue,
            'monthlySales' => $monthlySales,
            'dailySales' => $dailySales,
            'year' => $year,
            'month' => $month
        ]);
    }

    
    
    // <<Customer>>
    public function index(){
        $categories = Category::all(); 
        $products = Products::all();
        $productsdetails = ProductsDetail::all();
        $cpus = (new Cpu())->index();
        $gpus = (new Gpu())->index();
        $rams = (new Ram())->index();
        $roms = (new Rom())->index();
        return view('index', compact('categories', 'products', 'productsdetails', 'cpus', 'gpus', 'rams', 'roms'));
    }
    // app/Http/Controllers/ProductController.php
    public function detail($id)
    {
        // Lấy sản phẩm dựa trên ID
        $product = Products::find($id);
        if (!$product) {
            abort(404, 'Product not found');
        }

        // Lấy chi tiết sản phẩm
        $productDetail = ProductsDetail::where('PrdId', $id)->first();

        // Lấy thông tin liên quan từ bảng RAM, ROM, CPU, GPU
        $ram = Ram::find($productDetail->RamId);
        $rom = Rom::find($productDetail->RomId);
        $cpu = Cpu::find($productDetail->CpuId);
        $gpu = Gpu::find($productDetail->GpuId);
        $categories = Category::all(); 
        return view('detail', compact('categories', 'product', 'productDetail', 'ram', 'rom', 'cpu', 'gpu'));
    }
    public function cart(Request $request)
    {
        
        $cart = session()->get('cart', []);
        $categories = Category::all(); 
        return view('cart', compact('cart', 'categories'));
    }

    public function add(Request $request)
    {
        $productDetail = ProductsDetail::where('PrdId', $request->id)->first();
        if (!$productDetail) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        if ($productDetail->quantity <= 0) {
            return redirect()->back()->with('error', 'This product is out of stock!');
        }

        $cart = session()->get('cart', []);

        $maxQty = $productDetail->quantity;
        $product = [
            'id' => $productDetail->id,
            'name' => $request->name,
            'price' => $productDetail->price,
            'quantity' => 1,
            'image' => $request->image
        ];

        if (isset($cart[$productDetail->id])) {
            $newQty = $cart[$productDetail->id]['quantity'] + 1;
            $cart[$productDetail->id]['quantity'] = min($newQty, $maxQty);
        } else {
            $product['quantity'] = min(1, $maxQty);
            $cart[$productDetail->id] = $product;
        }

        session()->put('cart', $cart);
        return redirect()->route('cart');
    }
    
    public function updatecart(Request $request)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$request->id])) {
            return response()->json(['success' => false, 'message' => 'Product not found in cart']);
        }

        $productDetail = ProductsDetail::find($request->id);
        if (!$productDetail) {
            return response()->json(['success' => false, 'message' => 'Product not found!']);
        }
        if ($productDetail->quantity <= 0) {
            return response()->json(['success' => false, 'message' => 'Product is out of stock!']);
        }

        $newQty = min(max((int)$request->quantity, 1), $productDetail->quantity);

        $cart[$request->id]['quantity'] = $newQty;
    
        session()->put('cart', $cart);
    
        return response()->json(['success' => true, 'message' => 'Cart updated']);
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart');

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
            return redirect()->route('cart');
        }
        
    }

    public function checkout(Request $request){
        $cart = session()->get('cart', []);
        $categories = Category::all(); 
        $products = Products::all();
        $productsdetails = ProductsDetail::all();
        $ward1 = (new Ward())->fbid(session('customer')->WardId);
        $wards = (new Ward())->index();
        $dis = (new District())->index();
        $pro = (new Province())->index();
        $paymentmethods  = (new Paymentmethod())->index();
        return view('checkout', compact('cart','categories', 'products', 'productsdetails','pro', 'wards', 'dis','paymentmethods', 'ward1'));
    }

    public function getDistricts(Request $request)
    {
        $provinceId = $request->provinceId;
        $districts = District::where('ProId', $provinceId)->get();
        return response()->json($districts);
    }

    public function getWards(Request $request)
    {
        $districtId = $request->districtId;
        $wards = Ward::where('DisId', $districtId)->get();
        return response()->json($wards);
    }

    public function addorder(Request $request)
    {
            // Validate the incoming request
            $validatedData = $request->validate([
                'ProId' => 'required|exists:provinces,id',
                'DisId' => 'required|exists:districts,id',
                'WardId' => 'required|exists:wards,id',
                'payment' => 'required|exists:paymentmethods,id',
            ]);
        
            try {
                // Start transaction
                DB::beginTransaction();
                $transactionRef = null;
                $paymentMethod = Paymentmethod::find($validatedData['payment']);
                if ($paymentMethod && $paymentMethod->name == 'BankTransfer') {
                    $transactionRef = 'REF' . mt_rand(100000, 999999);
                }
                // Create the order
                $order = Orders::create([
                    'Date' => now()->toDateString(),
                    'UserName' => session('customer')->name,
                    'UserEmail' => session('customer')->email,
                    'UserPhone' => session('customer')->phone,
                    'UserId' => session('customer')->id,
                    'PayId' => $validatedData['payment'],
                    'ShipId' => 1, // Replace with your logic for shipping units
                    'ProId' => $validatedData['ProId'],
                    'DisId' => $validatedData['DisId'],
                    'WardId' => $validatedData['WardId'],
                    'Status' => 0,
                    'TrackingNumber' => 'EB125966888VN',
                    'TotalAmount' => array_sum(array_map(function($item) {
                        return $item['price'] * $item['quantity'];
                    }, session('cart', []))), // Calculate total amount
                    'TransactionReference' => $transactionRef,
                ]);
        
                // Create order details
                foreach (session('cart', []) as $item) {
                    $productDetail = ProductsDetail::find($item['id']);
                    if (!$productDetail || $productDetail->quantity < $item['quantity']) {
                        throw new \Exception('Insufficient stock for product: ' . ($item['name'] ?? 'Unknown'));
                    }

                    OrderDetail::create([
                        'OrderID' => $order->id,
                        'PrddID' => $item['id'],
                        'PrdQuantity' => $item['quantity'],
                        'PrdPrice' => $item['price']
                    ]);

                    $productDetail->decrement('quantity', $item['quantity']);
                }
            
                // Commit transaction
                DB::commit();   
                session()->forget('cart');
                return response()->json(['success' => true]);
            } catch (\Exception $e) {
                // Rollback transaction on error
                DB::rollBack();
                Log::error('Order creation failed: ' . $e->getMessage());
                return response()->json(['success' => false, 'message' => $e->getMessage()]);
            }
        }
        public function Shop(Request $request) {
            session(['search' => 1]);
            $categories = Category::all();
            $productsQuery = Products::query();

            if ($request->has('category')) {
                $categoryIds = $request->input('category');
                if (!in_array('all', (array)$categoryIds)) {
                    $productsQuery->whereIn('CatId', (array)$categoryIds);
                }
            }
            if($request->has('search') && $request->input('search') != ''){
                $searchTerm = $request->input('search');
        
                // Thêm điều kiện tìm kiếm vào truy vấn
                 $productsQuery->where('name', 'like', '%' . $searchTerm . '%');
            }

            $products = $productsQuery->paginate(8);
            $productsdetails = ProductsDetail::where('quantity', '>', 0)->get();
            // $productsdetails = DB::table('products')
            // ->join('productsdetails', 'products.id', '=', 'productsdetails.PrdId')
            // ->select('products.*', 'productsdetails.price', 'productsdetails.quantity');
            if ($request->has('price')) {
                $priceRanges = (array)$request->input('price');
                $productsdetails = $productsdetails->filter(function ($item) use ($priceRanges) {
                    foreach ($priceRanges as $range) {
                        switch ($range) {
                            case '0-1000':
                                if ($item->price >= 0 && $item->price <= 1000) return true;
                                break;
                            case '1000-2000':
                                if ($item->price >= 1000 && $item->price <= 2000) return true;
                                break;
                            case '2000-3000':
                                if ($item->price >= 2000 && $item->price <= 3000) return true;
                                break;
                            case '3000-4000':
                                if ($item->price >= 3000 && $item->price <= 4000) return true;
                                break;
                            case '4000-5000':
                                if ($item->price >= 4000 && $item->price <= 5000) return true;
                                break;
                            case '5000-6000':
                                if ($item->price >= 5000 && $item->price <= 6000) return true;
                                break;
                        }
                    }
                    return false;
                });
            }
            
            $wards = (new Ward())->index();
            $dis = (new District())->index();
            $pro = (new Province())->index();
            $paymentmethods = (new Paymentmethod())->index();
        
            return view('shop', compact('categories', 'products', 'productsdetails', 'pro', 'wards', 'dis', 'paymentmethods'));
        }
        
        public function signup(Request $request) {
            $pro = (new Province())->index();
            return view('signup', compact('pro'));
        }
        
        public function signupcus(Request $request) {
            $validator = \Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'address' => 'required',
                'WardId' => 'required|exists:wards,id',
                'password' => 'required|min:6',
            ], [
                'WardId.required' => 'Vui lòng chọn địa chỉ (tỉnh/huyện/xã) từ gợi ý.',
                'WardId.exists' => 'Địa chỉ không hợp lệ, vui lòng chọn lại.',
            ]);

            // Luôn quay về trang đăng ký khi lỗi (không back về trang login)
            if ($validator->fails()) {
                return redirect()->route('signup')->withErrors($validator)->withInput();
            }

            $existingCustomer = DB::table('user')->where('email', $request->input('email'))->first();
            $existingCustomerByPhone = DB::table('user')->where('phone', $request->input('phone'))->first();
    
            if ($existingCustomer) {
                
                return redirect()->route('signup')->with(['error' => 'Email already exists.']);
            }
            if ($existingCustomerByPhone) {
                return redirect()->route('signup')->with(['error' => 'Phone number already exists.']);
            }
    
            // Nếu email chưa tồn tại, thực hiện đăng ký
            $customer = new Customer();
            $customer->signupcus($request->all());
    
            // Chuyển hướng đến trang đăng nhập với thông báo thành công
            return redirect()->route('logincus')->with('success', 'Customer added successfully!');
        }

        public function contact(){
            $categories = Category::all();
            $customerId = session('customer') ? session('customer')->id : null;
            $orders = $customerId ? Orders::where('UserId', $customerId)->get() : collect();
            $orderdetail = orderDetail::all();
            return view('contact',compact('categories', 'orders', 'orderdetail'));
        }

        public function getOrderDetails(Request $request)
        {
            $orderId = $request->id;   
    
            // Tìm đơn hàng kèm theo chi tiết sản phẩm
            $order = (new orders)->fileall($orderId);
            // Trả về dữ liệu dưới dạng JSON
            return response()->json($order);
        }

        public function getAddressSuggestions(Request $request){
            $key = $request->term;
            $resurt = (new Ward())->file($key);
            
            return response()->json($resurt);
        }

        
    }
    