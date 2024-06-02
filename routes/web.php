<?php

use App\Models\Cart;
use App\Models\Menu;
use App\Models\DashboardCashier;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardCashierController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardKollabController;
use App\Http\Controllers\KolaborasiController;
use App\Http\Controllers\ListKolaboratorController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PelamarController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/menuapi', function () {
    return view('menuapi');
});
Route::get('/menu', [MenuController::class, 'menu'])->name('allmenu');
Route::get('/menu/search', [MenuController::class, 'searchMenu'])->name('searchMenu');
Route::get('/menu/{kategori}/search', [MenuController::class, 'searchMenuByCategory'])->name('searchMenuByCategory');
Route::get('/menu/sort/{option}', [MenuController::class, 'sortmenu'])->name('sortmenu');
Route::get('/menu/{kategori}/', [MenuController::class, 'showMenuByCategory'])->name('showmenubycategory');
Route::get('/menu/{kategori}/{option}', [MenuController::class, 'sortShowMenuByCategory'])->name('sortshowmenubycategory');


Route::get('/', function () {
    return view('beranda', [
        "title" => "Beranda",
    ]);
})->name('index');

Route::post('/menu/{menu}/favorite', [FavoriteController::class, 'store'])->name('storeMenu')->middleware('auth');
Route::delete('/favorite/delete/{favorite}', [FavoriteController::class, 'destroy'])->name('destroyMenu')->middleware('auth');


// Route::post('/favorites/{menuId}', [FavoriteController::class, 'toggleFavorite'])->name('favorites');
// Route::get('/favorites', [FavoriteController::class, 'getFavorites']);

Route::get('/', [BerandaController::class, 'beranda'])->middleware('auth');

Route::get('/reservasi', function () {
    return view('reservasi', [
        "title" => "Reservasi",
        "active" => "Reservasi",
    ]);
});

Route::get('/kolaborasi', function () {
    return view('kolaborasi', [
        "title" => "Kolaborasi"
    ]);
});

Route::get('/artikel', function () {
    return view('artikel', [
        "title" => "Artikel"
    ]);
});

Route::get('/location', function () {
    return view('location', [
        "title" => "Location"
    ]);
});

Route::get('/apply', function () {
    return view('apply', [
        "title" => "Apply"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About"
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('log.in');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [LoginController::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot-password-act', [LoginController::class, 'forgot_password_act'])->name('forgot-password-act');

Route::get('/validate-forgot-password/{token}', [LoginController::class, 'validate_forgot_password'])->name('validate-forgot-password');
Route::post('/validate-forgot-password-act', [LoginController::class, 'validate_forgot_password_act'])->name('validate-forgot-password-act');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/dashboard', function(){
    return view('dashboard.index',[
        'title' => 'Dashboard',
        'active' => 'Dashboard'
    ]);
})->middleware('auth');

// Route::get('/cartMenu', [MenuController::class, 'indexs']);  
// Route::get('/shopping-cart', [MenuController::class, 'menuCart'])->name('shopping.cart');
// Route::get('/menus/{id}', [MenuController::class, 'addmenutoCart'])->name('addmenu.to.cart');
// Route::patch('/update-shopping-cart', [MenuController::class, 'updateCart'])->name('update.sopping.cart');
// Route::delete('/delete-cart-product', [MenuController::class, 'deleteProduct'])->name('delete.cart.product');

Route::GET('/cart', [CartController::class, 'index'])->middleware('auth')->name('cart');
Route::post('/menu/{menu}/cart', [CartController::class, 'store'])->middleware('auth')->name('cart.store');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy')->middleware('auth');
Route::post('/cart/increase-quantity',  [CartController::class, 'increaseQuantity'])->name('cart.increaseQuantity');
Route::post('/cart/reduce-quantity',  [CartController::class, 'reduceQuantity'])->name('cart.reduceQuantity');
Route::post('/cart/order', [CartController::class, 'storeOrder'])->middleware('auth')->name('cart.storeOrder');

Route::get('/cart/checkout', [CartController::class, 'checkout'])->middleware('auth')->name('checkout');
Route::get('/invoice/{id}', [CartController::class, 'invoice'])->middleware('auth');


Route::get('/dashboardCashier', [DashboardCashierController::class, 'index'])->name('dashboard.cashier')->middleware('auth');

Route::get('/discounts/create', [DiscountController::class, 'create'])->name('discounts.create');
Route::post('/discounts', [DiscountController::class, 'store'])->name('discounts.store');

// Route untuk mengaplikasikan kode diskon
Route::post('/cart/apply-discount', [CartController::class, 'applyDiscount'])->name('cart.applyDiscount');



Route::get('/dashboard/kolaborator/new', function () {
    return view("dashboard.kollaborator.new");
})->middleware('auth');

Route::get('/dashboard/kolaborator/{id}', [DashboardKollabController::class, 'show'])->name('kollab')->middleware('auth');
Route::resource('/dashboard/kolaborator', DashboardKollabController::class)->middleware('auth');

Route::get('/dashboard/kolaborasi', [ListKolaboratorController::class, 'index'])->name('kolaborasi')->middleware('auth');
Route::get('/dashboard/kolaborasi/{id}', [ListKolaboratorController::class, 'show'])->name('showKolaborasi')->middleware('auth');
Route::get('/dashboard/kolaborasi/{id}/download', [ListKolaboratorController::class, 'download'])->name('download.file')->middleware('auth');

Route::get('kolaborasi', [KolaborasiController::class, 'index'])->name('kolaborasi.index');
Route::get('kolaborasi/ajukan', [KolaborasiController::class, 'create'])->name('kolaborasi.create');
Route::post('kolaborasi/ajukan', [KolaborasiController::class, 'proses'])->name('kolaborasi.proses');
Route::get('kolaborasi/{id}', [KolaborasiController::class, 'show'])->name('kolaborasi.show');

Route::get('apply', [LowonganController::class, 'index'])->name('lowongan.index');
Route::get('apply/{id}', [LowonganController::class, 'show'])->name('lowongan.show');
Route::get('apply/{id}/apply', [LowonganController::class, 'apply'])->name('lowongan.apply');
Route::post('apply/{id}/apply', [LowonganController::class, 'proses'])->name('lowongan.proses');

Route::get('/dashboard/pelamar', [PelamarController::class, 'index'])->name('pelamar.index');
Route::post('/dashboard/pelamar/{id}', [PelamarController::class, 'updatestatus']);
Route::get('/dashboard/pelamar/{id}', [PelamarController::class, 'show'])->name('pelamar.show');
Route::get('/dashboard/pelamar/{id}/downloadFoto', [PelamarController::class, 'downloadFoto'])->name('download.foto')->middleware('auth');
Route::get('/dashboard/pelamar/{id}/downloadCV', [PelamarController::class, 'downloadCV'])->name('download.cv')->middleware('auth');

