<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoriesController;
use App\Models\Customer;
use App\Models\Subcategories;
use Spatie\FlareClient\Api;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware(['auth:api'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});



Route::post('/login',[PassportAuthController::class,'login']);
Route::post('/register',[PassportAuthController::class,'register']);
Route::get('/brand_index',[BrandController::class,'index']);
Route::post('/brand_store',[BrandController::class,'store']);//->middleware('auth:api')
Route::post('/brand_show',[BrandController::class, 'show']);
Route::post('/brand_update/{id}',[BrandController::class, 'update']);
Route::post('/brand_destroy/{id}',[BrandController::class,'destroy']);
Route::get('/Category_index',[CategoryController::class,'index']);
Route::post('/Category_store',[CategoryController::class,'store']);
Route::post('/Category_show',[CategoryController::class, 'show']);
Route::post('/Category_update/{id}',[CategoryController::class, 'update']);
Route::post('/Category_destroy/{id}', [CategoryController::class, 'destroy']);
Route::post('/Customer_store', [CustomerController::class, 'store']);
Route::post('/Customer_show', [CustomerController::class, 'show']);
Route::post('/Customer_update', [CustomerController::class, 'update']);
Route::post('/Customer_destroy', [CustomerController::class, 'destroy']);
Route::get('/Product_index', [ProductController::class, 'index'])->middleware('auth:api');
Route::post('/Product_store', [ProductController::class, 'store']);
Route::post('/Product_show', [ProductController::class, 'show']);
Route::post('/Product_update/{id}', [ProductController::class, 'update']);
Route::post('/Product_destroy/{id}', [ProductController::class, 'destroy']);
Route::get('/Subcategories_index', [SubcategoriesController::class, 'index']);
Route::post('/Subcategories_store', [SubcategoriesController::class, 'store']);
Route::post('/Subcategories_show', [SubcategoriesController::class, 'show']);
Route::post('/Subcategories_update/{id}', [SubcategoriesController::class, 'update']);
Route::post('/Subcategories_destroy/{id}', [SubcategoriesController::class, 'destroy']);
Route::get('/Supplier_index', [SupplierController::class, 'index']);
Route::post('/Supplier_store', [SupplierController::class, 'store']);
Route::post('/Supplier_show', [SupplierController::class, 'show']);
Route::post('/Supplier_update/{id}', [SupplierController::class, 'update']);
Route::post('/Supplier_destroy/{id}', [SupplierController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
