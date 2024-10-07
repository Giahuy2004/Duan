<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\HomeProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;


// Route::get('/checkout', function () {
//     $user = Auth::user();
//     $cart = $user->cart;

//     return view('checkout.index', ['carts' => $cart]);
// })->middleware('auth')->name('checkout.form');

// Route::post('/checkout', [OrderController::class, 'checkout'])->middleware('auth')->name('checkout.store');

// Route::get('/order', function () {
//     return view('checkout.show');
// })->name('order.success');
Route::get('/checkout', [CartController::class, 'checkout'])->middleware('auth')->name('checkout.form');
Route::post('/process-checkout', [CartController::class, 'processCheckout'])->name('checkout.process');




Route::resource('home',HomeController::class);
Route::get('/', [HomeProductController::class, 'index'])->name('index');
Route::get('/product/{id}', [HomeProductController::class, 'show'])->name('product.show');
Route::resource('category', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('cart', CartController::class);
Route::resource('brands', BrandController::class);
Route::resource('use',UserController::class);
Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
});
// Route::get('/checkout', function () {
//     return view('checkout.index');
// })->name('checkout');
Route::get('/profile', function () {
    return view('profile');
})->name('profile');
Route::get('/dashboard/oders',[AdminOrderController::class, 'index'])->name('oders');
Route::post('update-status/{id}', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.update_status');
Route::get('/dashboard/product', function () {
    return view('admin.products.store');
})->name('products');
Route::get('/auth', function () {
    return view('auth.login');
})->name('auth');
Route::get('/shop', function () {
    return view('product.shop');
})->name('shop');



Auth::routes();

Route::get('/homes', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
