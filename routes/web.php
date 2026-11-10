<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', [\App\Http\Controllers\EmployeeController::class, 'login'])->name('login');
Route::get('/logout', [\App\Http\Controllers\EmployeeController::class, 'logout'])->name('logout');
Route::post('/login', [\App\Http\Controllers\EmployeeController::class, 'checkLogin'])->name("checkLogin");
Route::get('/forgotPass', [\App\Http\Controllers\EmployeeController::class, 'forgotPass'])->name("forgotPass");
Route::put('/newPass', [\App\Http\controllers\EmployeeController::class, 'newPass'])->name('newPass');
Route::get('/logincus', [\App\Http\Controllers\EmployeeController::class, 'logincus'])->name('logincus');
Route::get('/signupcus', [\App\Http\Controllers\Controller::class, 'signup'])->name('signup');
Route::post('/signup', [\App\Http\Controllers\Controller::class, 'signupcus'])->name('signupcus');

Route::get('/', [\App\Http\Controllers\Controller::class,'index'])->name("index");
Route::get('/{id}/detail', [\App\Http\Controllers\Controller::class,'detail'])->name("detail");
Route::get('/shop', [\App\Http\Controllers\Controller::class,'Shop'])->name("Shop");

Route::post('/get-districts', [\App\Http\Controllers\Controller::class, 'getDistricts'])->name('getDistricts');
Route::post('/get-wards', [\App\Http\Controllers\Controller::class, 'getWards'])->name('getWards');
Route::get('/get-address-suggestions', [\App\Http\Controllers\Controller::class, 'getAddressSuggestions'])->name('getAddressSuggestions');
Route::get('/orders/details', [\App\Http\Controllers\Controller::class, 'getOrderDetails'])->name('ordd');

Route::middleware('customer')->prefix('/')->group(function(){
    Route::get('/cart', [\App\Http\Controllers\Controller::class,'cart'])->name("cart");
    Route::post('/cart/add', [\App\Http\Controllers\Controller::class, 'add'])->name('cart.add');   
    Route::patch('/cart/update', [\App\Http\Controllers\Controller::class, 'updatecart'])->name('cart.update');
    Route::delete('/cart/remove', [\App\Http\Controllers\Controller::class, 'remove'])->name('cart.remove');
    Route::get('/checkout', [\App\Http\Controllers\Controller::class,'checkout'])->name("check");
    Route::post('/checkout/order', [\App\Http\Controllers\Controller::class,'addorder'])->name('order.add');
    Route::get('/contact', [\App\Http\Controllers\Controller::class,'contact'])->name("contact");
});

Route::middleware('AdminAndEmployee')->prefix('/')->group(function(){
    Route::post('/home', [\App\Http\Controllers\Controller::class,'home'])->name("home");
    Route::get('/home', [\App\Http\Controllers\Controller::class,'home'])->name("home1");
    Route::get('/products/index', [\App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');
    Route::get('/products/create', [\App\Http\Controllers\ProductsController::class, 'create'])->name('products.create');
    Route::post('/products', [\App\Http\Controllers\ProductsController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [\App\Http\Controllers\ProductsController::class, 'edit'])->name('editprd');
    Route::put('/products/update/{id}', [\App\Http\Controllers\ProductsController::class, 'update'])->name('products.update');
    Route::delete('/products/{products}', [\App\Http\Controllers\ProductsController::class, 'destroy'])->name('products.destroy');
    Route::middleware('Admin')->prefix('/')->group(function(){
        Route::get('/category/index',[\App\Http\Controllers\CategoryController::class,'index'])->name("cat");
        Route::get('/addcat', [\App\Http\Controllers\CategoryController::class, 'create'])->name("addcat");
        Route::post('/addcat', [\App\Http\Controllers\CategoryController::class, 'store'])->name("addcat.store");
        Route::get('/category/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('editcat');
        Route::put('/category/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('editcat.update');
        Route::delete('/category/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('catdel');

        
        


        Route::get('/employee/index', [\App\Http\Controllers\EmployeeController::class, 'index']) ->name("employee");
        Route::get('/addep', [\App\Http\Controllers\EmployeeController::class, 'create']) ->name("addep");
        Route::post('/storeep', [\App\Http\Controllers\EmployeeController::class,'store'])->name("addep.store");
        Route::get('/{id}/edit', [\App\Http\Controllers\EmployeeController::class, 'edit'])->name("editep");
        Route::put('/{employee}/editcr',[\App\Http\Controllers\EmployeeController::class,'update'])->name("editep.update");

        Route::get('/customer/index', [\App\Http\Controllers\CustomerController::class, 'index']) ->name("customer");
        Route::get('/addcus', [\App\Http\Controllers\CustomerController::class, 'create']) ->name("addcus");
        Route::post('/storecus', [\App\Http\Controllers\CustomerController::class,'store'])->name("addcus.store");
        Route::get('/customer/{id}/edit', [\App\Http\Controllers\CustomerController::class, 'edit'])->name("editcus");
        Route::put('/{customer}/editcus',[\App\Http\Controllers\CustomerController::class,'update'])->name("editcus.update");
    });

    Route::get('/Orders/index', [\App\Http\controllers\OrdersController::class, 'index'])->name('invoice');
    Route::post('/storeNewIV', [\App\Http\Controllers\OrdersController::class,'store'])->name("storeNewIV");
    Route::get('/{id}/editIV', [\App\Http\Controllers\OrdersController::class, 'edit'])->name("editIV");
    Route::put('/{order}/editIV/update',[\App\Http\Controllers\OrdersController::class,'update'])->name("order.update");

});
