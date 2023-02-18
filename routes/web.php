<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::redirect('/', '/login');
Auth::routes();
Route::group(['middleware' => 'auth'], function() {
	Route::resource('/products', App\Http\Controllers\ProductController::class);
	Route::resource('/compras', App\Http\Controllers\ComprasController::class);
	Route::resource('/facturas', App\Http\Controllers\FacturasController::class);
});

